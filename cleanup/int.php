<?

if ($_POST['go']){

$input=$_POST['input'];

echo "$input";


}
?>
<form action="" method=POST>

<input type="text" name=input>
<input type="submit" name="go">
</form>