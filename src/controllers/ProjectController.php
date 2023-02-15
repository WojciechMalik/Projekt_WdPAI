<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Transaction.php';
require_once __DIR__.'/../repository/TransactionRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProjectController extends AppController
{

    private $messages=[];
    private $transactionRepository;
    public function __construct()
    {
        parent::__construct();
        $this->transactionRepository= new TransactionRepository();
    }

    public function dashboard(){
        $transactions=$this->transactionRepository->getTransactions();
        $userRepository = new UserRepository();
        $user = $userRepository->getUsername($_COOKIE['id_user']);
        $balance = 0;
        $income = 0;
        $expenses = 0;

        foreach ($transactions as $transaction){
            $amount = $transaction->getAmount();
            if($amount>=0){
                $income+=$amount;
            }else{
                $expenses+=$amount;
            }
            $balance+=$amount;
        }
        $this->render('dashboard', ['name'=> $user,'transactions' =>$transactions, 'balance'=>$balance,
            'income'=>$income, 'expenses'=> $expenses]);
    }
    public function addTransaction()
    {

        if($this->isPost()) {
            $transaction = new Transaction($_POST['title'], $_POST['amount'], $_POST['category']);
            $this->transactionRepository->addTransaction($transaction);
            header('Location: dashboard');
        }

        $this->render('newtransaction', ['messages'=>$this->messages]);
    }
}