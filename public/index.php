<?phpinclude_once './includes/functions.php';//Log them outif(isset($_GET['logout']) == "yes"){    session_destroy();    header('Location: ' . GameConfig::$site_url . 'index.php');}if(isset($_POST['login']) || isset($_GET['auth'])){            if($user->login() === true)        header('Location: powder.php');    else        $error_message = $user->login_error;    }//If user is already logged inif($user->isLoggedIn()){    header('Location: powder.php');}?><!DOCTYPE html><html>    <head>        <title></title>        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    </head>    <body>        <?=isset($error_message) ? $error_message : ''?>        <form method="POST" action="">            <input type="text" name="email" placeholder="E-mail address" />            <input type="password" name="password" placeholder="Password" />            <input type="submit" name="login" value="Login" />        </form>        <a href="?auth=twitter">Twitter Auth</a><br />        <a href="?auth=facebook">Facebook</a>        <?php include_once 'includes/footer.php'; ?>