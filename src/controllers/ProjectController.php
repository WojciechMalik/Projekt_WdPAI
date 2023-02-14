<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Transaction.php';
class ProjectController extends AppController
{

    private $messages=[];
    public function addTransaction()
    {
        if($this->isPost()){

            $transaction = new Transaction($_POST['title'], $_POST['amount'], $_POST['category'], $_POST['choice']);

            return $this->render('dashboard', ['messages'=>$this->messages, 'transaction'=>$transaction]);
        }
        $this->render('newtransaction', ['messages'=>$this->messages]);
    }
}