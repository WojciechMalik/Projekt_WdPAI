<?php

require_once 'AppController.php';
class DefaultController extends AppController {
    public function index(){
        $this->render('login');
    }

    public function statistics(){
        if($_COOKIE['id_user'] === null) header("Location: /login");
        $this->render('statistics');
    }

    public function newtransaction(){
        if($_COOKIE['id_user'] === null) header("Location: /login");
        $this->render('newtransaction');
    }

    public function registration(){
        $this->render('registration');
    }
}