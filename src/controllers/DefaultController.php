<?php

require_once 'AppController.php';
class DefaultController extends AppController {
    public function index(){
        $this->render('login');
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