<?php
require_once '../app/helpers/session_helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/style_login.css" type="text/css">
</head>
<style>
    .custom-layout {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
    }
</style>
<body>

<h1 class="header">Sign in</h1>

<?php flash('login') ?>

    <form method="post" action="<?php echo BASEURL; ?>/Home/login">
    <input type="hidden" name="type" value="login">
        <input type="text" name="name/email"  
        placeholder="Username...">
        <input type="password" name="password" 
        placeholder="Password...">
        <img src="<?php echo BASEURL; ?>../assets/captcha.php" alt="captcha" />
        <input name="captcha" placeholder="Captcha..." type="text" size="23"/>
        <div class="custom-layout">
            <button type="submit" name="submit">Sign in</button>
            <a href="<?php echo BASEURL; ?>">Back to homepage</a>
        </div>
    </form>
</body>

<script src="<?php echo BASEURL; ?>/assets/js/app.js"></script>