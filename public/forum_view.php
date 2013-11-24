<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php"; 


if($info->userlevel=='0'){

die("<center><h3>You are not Authorized to View This Page</h3></center>");

}



<body bgcolor=555555>


<center><table width=50% border=1 cellspacing=0 bordercolor=black>
  <tr> 

    <td height=22 background="includes/grad.jpg"><center class="TableHeading">

        <strong><font size=5>Forum MOD CP</strong> 

      </center></td>

  </tr>
}elseif (strip_tags($_GET['op']) == "forum"){

if (strip_tags($_POST['dall']) && strip_tags($_POST['dallbut'])){

$dall=strip_tags($_POST['dall']);

$check=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$dall'"));

if ($check =="0"){

echo "No such user!";

}elseif($check !="0"){

mysql_query("DELETE FROM topics WHERE username='$dall'");

echo "".mysql_affected_rows()." topics deleted";

mysql_query("DELETE FROM replys WHERE username='$dall'");



echo "".mysql_affected_rows()." replys deleted";



}}elseif (strip_tags($_POST['stick']) && strip_tags($_POST['sticky_but'])){

$stick=strip_tags($_POST['stick']);



$check1=mysql_query("SELECT * FROM topics WHERE id='$stick'");

$check=mysql_num_rows($check1);

$chech=mysql_fetch_object($check1);

$new_tit="<b>$chech->title</b>";



if ($check == "0"){

echo "Invalid ID";

}elseif($check != "0"){

mysql_query("UPDATE topics SET sticky='1', lastreply='999999999999999', title='$new_tit' WHERE id='$stick'");

echo "Sticky topic made";



}}elseif (strip_tags($_POST['lock']) && strip_tags($_POST['locky_but'])){

$lock=strip_tags($_POST['lock']);



$check=mysql_num_rows(mysql_query("SELECT * FROM topics WHERE id='$lock'"));

if ($check == "0"){

echo "Invalid ID";

}elseif($check != "0"){

mysql_query("UPDATE topics SET locked='1' WHERE id='$lock'");

echo "Topic locked";



}}





?><form action="?op=forum" method=POST>

<table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">

  <tr> 

    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">

        <strong>Forum options</strong> 

      </center></td>

  </tr>


  <tr> 

    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

        <tr> 

          <td>&nbsp;</td>

        </tr>


        <tr> 

          <td><a href="AdminCP?op=forum.php"><center><b><font color=white><font size=2>Forum options</a></td>

        </tr>