<?phpinclude_once './includes/functions.php';if(isset($_GET['logout']) === "yes" && $user->isLoggedIn()){    session_destroy();    header('Location: ' . GameConfig::$site_url . 'index.php');}$user->handleLoginCheck();if(isset($_POST['login'])){        $login = $user->login();        if($login === false)    {        $error_message = 'Email and/or Password is wrong';            }    }?><!DOCTYPE html><html>    <head>        <title></title>        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    </head>    <body>        <?php        if(isset($_POST['login']))        {            echo $error_message;        }        ?>        <form method="POST" action="">            <input type="text" name="email" placeholder="E-mail address" />            <input type="password" name="password" placeholder="Password" />            <input type="submit" name="login" value="Login" />        </form>        <?php include_once 'includes/footer.php'; ?>