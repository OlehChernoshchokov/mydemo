
<!DOCTYPE html>
<html>
<head>
    <title>Добавить новую статю</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="View/style.css"/>

</head>
<body>
<?php

    require_once "blocks/menu.php";

?>
<div class="wrapper_admin">
    <form name="newarticle" method="post" action="">

            Title: <input type="text" name="title"/>

        <div>Text:<br />
            <textarea name="content" cols="40" rows="10"></textarea>
        </div>
        <div>Image link (img/image.jpg):<br />

            <textarea name="image" cols="40" rows="3"></textarea>
        </div>
        <div>Publish (1 - yes; 0 - no;):<br />

            <textarea name="status" cols="1" rows="1"></textarea>
        </div>
        <br/>
        <input type="submit" class="button_admin" name="button_newarticle" value="Add article" />

    </form>
<?php
    if (isset($_POST["button_newarticle"])){
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];
        $image = $_POST['image'];
        $status = $_POST['status'];
        $bad = false;
        session_start();
        if ((strlen($title) < 3)){
           $bad = true;
        }
        if (!$bad){
            $mysqli = new mysqli("localhost", "root", "", "blog");
            $mysqli->query("INSERT INTO blog (`title`, `content`, `image`, `status`) VALUES ('$title', '$content', '$image', '$status')");
            $mysqli->close();

        }

    }
?>
</div>
</body>
</html>