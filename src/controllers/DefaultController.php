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
    public function navigation(){
        $this->render('navigation');
    }
}