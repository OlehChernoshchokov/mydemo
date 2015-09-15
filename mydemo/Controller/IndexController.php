<?php

class IndexController extends Controller{

    public function indexAction(Array $params){

        $blogModel = new Blog;
        $blog = $blogModel->getList(); // get from DB

        $data = array(
            'blog' => $blog
        );
        $data = array(
            'content' => $blog
        );
        return $this->render('index', $data);
    }

    public function showAction (Array $params){
        $blogModel = new Blog();
        $blog = $blogModel->getById($params['id']);
        $data = array(
            'content' => $blog
        );

        return $this->render('show', $data);
    }

    public function aboutAction(Array $params){

        $content = 'Welcome AGAIN! This text will be taken from dataBase';


        $data = array(
            'content' => $content
        );
        return $this->render('about', $data);
    }

    public function contactAction(Array $params){
        //creating form entity
        $form = new ContactForm($_POST);

        //check if we have a flash message in get params
        $flash_msg = isset($params['flash_msg']) ? $params['flash_msg'] : '';

        //if form sent
        if ($_POST){
            if ($form->validate()){
                $flash_msg = 'Message sent';
                $email_body = "This is a message from {$form->getName()}, {$form->getEmail()} : {$form->getMessage()}";

                //C:\xampp\mailoutput
                mail('kap0sha@yandex.ru', 'Contact message', $email_body);
                if ($_FILES['attachment']){
                    $form->uploadAttachment();
                }
            }else {
                $flash_msg = 'Fill in the fields';
            }

            //redirectt
            header("Location: /index.php?controller=index&action=contact&flash_msg={$flash_msg}");
        }

        $data = array(
            'form' => $form,
            'message' => $flash_msg
        );

        return $this->render('contact', $data);
    }
        function addArticle($title, $full_text){
        global $mysqli;
        require '/connect.php';
        $success = $mysqli->query("INSERT INTO `blog` (`title`, `content`) VALUES ('$title', '$full_text')");
        return $success;
    }
}