<?php

require_once 'AppController.php';
class DefaultController extends AppController {
    public function login(){
        $this->render('login');
    }
    public function dashboard(){
        $this->render('dashboard');
    }
    public function statistics(){
        $this->render('statistics');
    }
    public function limits(){
        $this->render('limits');
    }
    public function newtransaction(){
        $this->render('newtransaction');
    }
    public function registration(){
        $this->render('registration');
    }
}