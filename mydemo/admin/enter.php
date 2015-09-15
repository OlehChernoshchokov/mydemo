<?php
session_start();

$admin = 'admin';
$pass = '75be447abe50a3b6df73b67c11ed6c96';

if($_POST){
    if($admin == $_POST['user'] && $pass == md5($_POST['pass'])){
        $_SESSION['admin'] = $admin;
        header("Location: admin.php");
        exit;
    }else {
        echo '<p>Логин и/или пароль неверны</p>';
    }
}
?>
<form method="post">
    Username: <input type="text" name="user"/><br>
    Password: <input type="password" name="pass"/><br>
    <input type="submit" name="submit" value="Войти">
</form>