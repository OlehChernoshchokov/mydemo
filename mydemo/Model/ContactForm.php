<?php

class ContactForm{
    private $name;
    private $email;
    private $message;

    public function __construct(Array $post_array){
        $this->name = isset($post_array['name']) ? $post_array['name'] : '';
        $this->email = isset($post_array['email']) ? $post_array['email'] : '';
        $this->message = isset($post_array['message']) ? $post_array['message'] : '';
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getMessage(){
        return $this->message;
    }

    public function validate(){
        $res = !empty($this->email) && !empty($this->message);

        return $res;
    }

}