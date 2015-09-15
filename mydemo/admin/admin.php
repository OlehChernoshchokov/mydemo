<?php
session_start();
if(!$_SESSION['admin']){
    header("Location: enter.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>admin-панель</title>
    <link rel="stylesheet" type="text/css" href="View/style.css"/>
    <!-- FLAVICON -->
    <link href="/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>

<body>
    <?php require_once "blocks/menu.php"; ?>
</body>
</html>