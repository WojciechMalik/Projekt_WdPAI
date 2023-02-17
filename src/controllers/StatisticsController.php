<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/TransactionRepository.php';
require_once __DIR__.'/../repository/LimitRepository.php';
class StatisticsController extends AppController
{
    private $transactionRepository;
    private $limitsRepository;

    public function __construct()
    {
        $this->transactionRepository = new TransactionRepository();
        $this->limitsRepository = new LimitRepository();
    }

    public function statistics(){
        if($_COOKIE['id_user'] === null) header("Location: /login");
        $transactions = $this->transactionRepository->getTransactions();
        $food = 0;
        $entertainment = 0;
        $education = 0;
        $transport = 0;

        foreach ($transactions as $transaction) {
            $pom = $transaction->getCategory();
            switch ($pom){
                case "Food":
                    $food += ($transaction->getAmount()*-1);
                    break;
                case "Entertainment":
                    $entertainment += ($transaction->getAmount()*-1);
                    break;
                case "Education":
                    $education += ($transaction->getAmount()*-1);
                    break;
                case "Transport":
                    $transport += ($transaction->getAmount()*-1);
                    break;
            }
        }
        $limits = $this->limitsRepository->getLimits();
        usort($limits, fn($a, $b) => strcmp($a->getIdCategory(), $b->getIdCategory()));
        $lim_food = $limits[0]->getLimit();
        $lim_enter = $limits[1]->getLimit();
        $lim_edu = $limits[2]->getLimit();
        $lim_trans = $limits[3]->getLimit();

        $per_food = $food/$lim_food *100;
        $per_enter = $entertainment/$lim_enter *100;
        $per_edu = $education/$lim_edu *100;
        $per_trans = $transport/$lim_trans *100;

        $this->render('statistics', ['per_food'=>$per_food,
            'per_enter'=>$per_enter,
            'per_edu'=>$per_edu,
            'per_trans'=>$per_trans]);
    }
}