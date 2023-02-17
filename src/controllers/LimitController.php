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

    public function setLimits(){
        if(!$this->isPost()) die();
        if($_POST['Food'])
            $this->limitRepository->updateLimit(new Limit($_COOKIE['id_user'], 1, $_POST['Food']));

        if($_POST['Entertainment'])
            $this->limitRepository->updateLimit(new Limit($_COOKIE['id_user'], 2, $_POST['Entertainment']));

        if($_POST['Education'])
            $this->limitRepository->updateLimit(new Limit($_COOKIE['id_user'], 3, $_POST['Education']));

        if($_POST['Transport'])
            $this->limitRepository->updateLimit(new Limit($_COOKIE['id_user'], 4, $_POST['Transport']));

        header("Location: /limits");
    }



}