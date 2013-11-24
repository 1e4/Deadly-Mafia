<?php session_start();
?><center>Are you sure you want to logout?</center><br /><center><a href=logout.php?logmeout=ye>Yes</a> | <a href=javascript:history.back()>No</a>
<script language=javascript>
if (self != top) // anti-hijacking frame buster code
    top.location.replace(self.location);
</script>
<?php 

if ($_GET['logmeout']){
echo "Been logged out";
session_destroy();
}?>