<?php

session_start();

include_once "includes/functions.php";

logincheck();

$username=$_SESSION['username'];















?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Untitled Document</title>

<style type="text/css">

<!--

.style3 {

	font-family: Verdana, Arial, Helvetica, sans-serif;

	color: ##FFFFFF;

	font-weight: bold;

}

.style4 {color: red}

.style7 {color: #00FF00}
.style9 {color: #0000FF}
.style10 {color: #FF0000}

-->

</style>

</head>



<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

<table width="548" height="181" bgcolor="black" border="1" align="center" cellpadding="0" cellspacing="0" rules="none">

<tr>

    <td width="493" height="21" background="includes/grad.jpg"><center>Murder Mafia</td>

  </tr>

<br>

    <tr>

    <td height="75" align="left" valign="top">

      <p align="center" class="storyline style3"><font face="Trebuchet MS">Welcome to Murder Mafia!. The game is currently in Beta stages so be aware that anything can change at any time. To view all the important news and information please view the news page which can be found on the navigation 

		bar to the left. If you are new to the game please read the FAQ before asking the helpdesk any questions. If you have a genaral game question please message the <span class="style10">Moderators</span> not the <span class="style9">Admins</span>, If you are recieving abuse from another player please contact a <span class="style10">Moderator</span>.</font></p>

      <p align="center" class="storyline style3"><font face="Trebuchet MS">If You Still Need Help <a href="faq.php" class="style4">Check The FAQ</a>. Hope you enjoy playing.</font></p>

    <p align="center" class="storyline style3 style7">Murder Mafia Staff</p>Rayer <?php echo $date, $update?>  

    </td>

  </tr>

</table>

</body>

</html>







<br><br>

<?php include_once"includes/footer.php"; ?>