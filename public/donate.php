<?php session_start(); include"includes/db_connect.php"; include "includes/functions.php"; logincheck(); 
$var1=$_POST['var1'];
?>
<?
if (isset($_POST['var1'])){
mysql_query("UPDATE users SET forum_free='1' WHERE username='$var1'");
}
?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php echo "$style"; ?>
<link href="includes/in.css" rel="stylesheet" type="text/css">
</head>

<body>
<p>&nbsp;</p>
<table width="72%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td background="includes/grad.jpg"> <center>
        Donations to The Mafia 
    </center></td>
  </tr><tr> 
    <td><p>&gt;<strong>Why donate?</strong><br>
        It costs money for hosting the game and as it grows larger the costs rise so donating helps game going</p>
      <p>&gt;<strong>How much do i donate?<br>
        </strong>It costs £1 to donate thats it, what else can you buy for £1 really.</p>
      <p>&gt;<strong>Sounds good let me donate!<br>
        </strong>To donate you will need a paypal account. To donate click the button!!</p>
      <p><strong><br>
        </strong></p>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHJwYJKoZIhvcNAQcEoIIHGDCCBxQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYCStJsQpNQGPyM3w/iTVHUTau0SMiH/vFNj8b1SSMSAdvWQu1GVLkvEZzeZIqaNjrmQgktLj5LwiQl/A/qGVXYJe4RVRes9dgLFo8e4xL+IU92vL2Tkl3Xd/bXuKpW1j9nlAhP7d7LAecG1XGPS/ZfvyUvj3V3BB7uWhD24vAbyvTELMAkGBSsOAwIaBQAwgaQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIWWsMgOCCOAuAgYASJqM6VGlPb0AmzHSOs1QtHorPLkxwlFod+Gm8v/JgzuSVX7U6OkD0pBVv0cFiMH5sOMDzW9sHOpNqy9xc1uHEilUExDx3UfznIjMR8bW2mooKgNnW5JSZVGcNu5QdIbATQuT/j8D8jGiSySxxXhqMHINdxkd98E8P+RaJ6yjElaCCA4cwggODMIIC7KADAgECAgEAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTAeFw0wNDAyMTMxMDEzMTVaFw0zNTAyMTMxMDEzMTVaMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAwUdO3fxEzEtcnI7ZKZL412XvZPugoni7i7D7prCe0AtaHTc97CYgm7NsAtJyxNLixmhLV8pyIEaiHXWAh8fPKW+R017+EmXrr9EaquPmsVvTywAAE1PMNOKqo2kl4Gxiz9zZqIajOm1fZGWcGS0f5JQ2kBqNbvbg2/Za+GJ/qwUCAwEAAaOB7jCB6zAdBgNVHQ4EFgQUlp98u8ZvF71ZP1LXChvsENZklGswgbsGA1UdIwSBszCBsIAUlp98u8ZvF71ZP1LXChvsENZklGuhgZSkgZEwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tggEAMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADgYEAgV86VpqAWuXvX6Oro4qJ1tYVIT5DgWpE692Ag422H7yRIr/9j/iKG4Thia/Oflx4TdL+IFJBAyPK9v6zZNZtBgPBynXb048hsP16l2vi0k5Q2JKiPDsEfBhGI+HnxLXEaUWAcVfCsQFvd2A1sxRr67ip5y2wwBelUecP3AjJ+YcxggGaMIIBlgIBATCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwCQYFKw4DAhoFAKBdMBgGCSqGSIb3DQEJAzELBgkqhkiG9w0BBwEwHAYJKoZIhvcNAQkFMQ8XDTA1MDgxMTE0NDk1MlowIwYJKoZIhvcNAQkEMRYEFK1oA/hit1luLYSLXvI/8HtOKxBJMA0GCSqGSIb3DQEBAQUABIGAQeF1b9J+BV+ChkOyW01QVAyegGpqSF592u2lcquRkcH7uLuqvlEURw3Ebcr+X1odSairqVDsmG1aytpsHA+FmB4LLjw14Jsi3ANroZVgizR8ddGbzy2xcxoSGxyhcRspC/UWc72Almz5gygvAubElAgUJBujV1dDqjSnFCTCRAk=-----END PKCS7-----
">
</form>
