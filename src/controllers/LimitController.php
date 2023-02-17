<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Limit.php';
require_once __DIR__.'/../repository/LimitRepository.php';
class LimitController extends AppController
{
    private $limitRepository;
    public function __construct()
    {
        parent::__construct();
        $this->limitRepository = new LimitRepository();
    }

    public function limits(){
        if($_COOKIE['id_user'] === null) header("Location: /login");
        $limits = $this->limitRepository->getLimits();
        usort($limits, fn($a, $b) => strcmp($a->getIdCategory(), $b->getIdCategory()));
        $this->render('limits', ['limits'=>$limits]);
    }




}