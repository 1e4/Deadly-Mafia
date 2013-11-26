<?php session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch->crew'"));

if ($fetch->crew == $crew->name  && strtolower($crew->rhm) == strtolower($username) ||  strtolower($crew->rec1) == strtolower($username)){
////////////////////////////////////////////////////////////////////
if (strip_tags($_POST['invite_button']) && strip_tags($_POST['invite'])){
$invite= strip_tags($_POST['invite']);

$check_query=mysql_query("SELECT * FROM users WHERE username='$invite'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){

if ($fetch_check->crew != "0"){
echo "That user is already in a crew";
}elseif ($fetch_check->crew == "0"){


$message = "<form name=form1 method=post action=>
  <div align=center>You have been invited to join $crew->name<br>
    <input type=radio name=invite_crew value=1>
    Accept 
    <input type=radio name=invite_crew value=2>
    Decline <br>
    <br>
    <input name=join_crew type=submit id=join_crew>
<input name=delete_it type=hidden id=match value=$get->id>
  </div>
</form>
";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$invite', '$invite', '$message', '$date', '0', '0', '$crew->id'
)");
mysql_query("UPDATE users SET crew_invite='$crew->id' WHERE username='$invite'");

echo "Invite sent";
}}}
////////////////////////////////////////////////////////////////////
//////////////////////////////////
if (strip_tags($_POST['kick_button']) && strip_tags($_POST['kick_username'])){
$kick_username= strip_tags($_POST['kick_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$kick_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

if (strtolower($kick_username) == strtolower($crew->owner) || strtolower($kick_username) == strtolower($crew->rhm)){
echo "You cannot kick the RHM or owner";
}elseif (strtolower($kick_username) != strtolower($crew->owner) && strtolower($kick_username) != strtolower($crew->rhm)){

mysql_query("UPDATE users SET crew='0' WHERE username='$kick_username'");
$message = strip_tags($_POST['kick_message']);
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$kick_username', '$kick_username', 'You have been kicked from $crew->name for the following reason: <br>$message', '$date', '0', '0', ''
)");
echo "User has been kicked";
}
}}}
//////////////////////////////////////
if (strip_tags($_POST['cm1_button']) && strip_tags($_POST['cm1_username'])){
$cm1_username= strip_tags($_POST['cm1_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm1_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm1='$cm1_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm1_username', '$cm1_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 1  assigned";
}}}

//////////////////////////////////
//////////////////////////////////////
if (strip_tags($_POST['cm2_button']) && strip_tags($_POST['cm2_username'])){
$cm1_username= strip_tags($_POST['cm2_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm2_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm2='$cm2_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm2_username', '$cm2_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 2  assigned";
}}}
//////////////////////////////////////
if (strip_tags($_POST['cm3_button']) && strip_tags($_POST['cm3_username'])){
$cm1_username= strip_tags($_POST['cm3_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm3_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm3='$cm3_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm3_username', '$cm3_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 3  assigned";
}}}

//////////////////////////////////
//////////////////////////////////////
if (strip_tags($_POST['cm4_button']) && strip_tags($_POST['cm4_username'])){
$cm1_username= strip_tags($_POST['cm4_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm4_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm4='$cm4_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm4_username', '$cm4_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 4  assigned";
}}}

//////////////////////////////////
//////////////////////////////////////
if (strip_tags($_POST['cm5_button']) && strip_tags($_POST['cm5_username'])){
$cm1_username= strip_tags($_POST['cm5_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm5_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm5='$cm5_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm5_username', '$cm5_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 5  assigned";
}}}

//////////////////////////////////
//////////////////////////////////////
if (strip_tags($_POST['cm6_button']) && strip_tags($_POST['cm6_username'])){
$cm1_username= strip_tags($_POST['cm6_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm6_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm6='$cm6_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm6_username', '$cm6_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 6  assigned";
}}}

//////////////////////////////////
//////////////////////////////////////
if (strip_tags($_POST['cm7_button']) && strip_tags($_POST['cm7_username'])){
$cm1_username= strip_tags($_POST['cm7_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm7_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm7='$cm7_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm7_username', '$cm7_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 7  assigned";
}}}

//////////////////////////////////
//////////////////////////////////////
if (strip_tags($_POST['cm8_button']) && strip_tags($_POST['cm8_username'])){
$cm1_username= strip_tags($_POST['cm8_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$cm8_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET cm8='$cm8_username' WHERE name='$crew->name'");
$message = "You have been elected as a Council Member for your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$cm8_username', '$cm8_username', '$message', '$date', '0', '0', ''
)");
echo "Council Member 8  assigned";
}}}

//////////////////////////////////
//////////////////////////////////
if (strip_tags($_POST['rhm_button']) && strip_tags($_POST['rhm_username'])){
$rhm_username= strip_tags($_POST['rhm_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$rhm_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != $crew->name){
echo "That user is not in your crew.";
}elseif ($fetch_check->crew == $crew->name){

mysql_query("UPDATE crews SET rhm='$rhm_username' WHERE name='$crew->name'");
$message = "You have been promoted to RHM in your crew!";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$rhm_username', '$rhm_username', '$message', '$date', '0', '0', ''
)");
echo "RHM assigned";
}}}



////////////////////////////////////////////////////////


if (strip_tags($_POST['hand_button']) && strip_tags($_POST['hand_username']) && strtolower($username) == strtolower($crew->owner)){
$hand_username= strip_tags($_POST['hand_username']);
$check_query=mysql_query("SELECT * FROM users WHERE username='$hand_username'");
$check_excist = mysql_num_rows($check_query);
$fetch_check = mysql_fetch_object($check_query);

if ($check_excist == "0"){
echo "There is no such user.";
}elseif ($check_excist != "0"){
if ($fetch_check->crew != "0"){
echo "That user is in a crew";
}elseif ($fetch_check->crew == "0"){

mysql_query("UPDATE users SET crew='0' WHERE username='$username'");
mysql_query("UPDATE crews SET owner='$hand_username' WHERE name='$crew->name'");
mysql_query("UPDATE users SET crew='$crew->name' WHERE username='$hand_username'");
$message = "You know are the owner and founder of $crew->name";

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$hand_username', '$hand_username', '$message', '$date', '0', '0', ''
)");
echo "That user is now the owner of your this crew.";
}}}
if (strip_tags($_POST['mass_button']) && strip_tags($_POST['mass_msg'])){
$mass_msg=strip_tags($_POST['mass_msg']);
$total=0;
$select_all=mysql_query("SELECT * FROM users WHERE crew='$crew->name'");
while($send_to=mysql_fetch_object($select_all)){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$send_to->username', '$send_to->username', '$mass_msg', '$date', '0', '0', ''
)");
$total++;
}
echo "$total messages sent";
}



?>
<form name="form1" method="post" action="">


  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td width="51%"><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>" >
          <tr> 
            <td class="header"><center>
                Invite </center></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr> 
                  <td width="50%"> <div align="left">Username: </div></td>
                  <td width="50%"><input name="invite" type="text" id="invite"></td>
                </tr>
                <tr> 
                  <td>Message:</td>
                  <td><input name="invite_msg" type="text" id="invite_msg"></td>
                </tr>
                <tr> 
                  <td colspan="2"><div align="right"> 
                      <input name="invite_button" type="submit" id="invite_button" value="Invite">
                    </div></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
      <td width="49%">&nbsp;</td>
    </tr>
    <tr>
      <td height="102" >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
  </table>
<?php
///////TO CHECK IF THERE IN THE CREW AND THERE RHM
}
/////// 
?>

</form>
