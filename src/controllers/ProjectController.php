<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Transaction.php';
require_once __DIR__.'/../repository/TransactionRepository.php';

class ProjectController extends AppController
{

    private $messages=[];
    private $transactionRepository;
    public function __construct()
    {
        parent::__construct();
        $this->transactionRepository= new TransactionRepository();
    }

    public function addTransaction()
    {
        if($this->isPost()){

            $transaction = new Transaction($_POST['title'], $_POST['amount'], $_POST['category']);
            $this->transactionRepository->addTransaction($transaction);

            return $this->render('dashboard', ['messages'=>$this->messages, 'transaction'=>$transaction]);
        }
        $this->render('newtransaction', ['messages'=>$this->messages]);
    }
}