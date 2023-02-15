<?php

class Transaction
{
    private $title;
    private $amount;
    private $category;

    public function __construct($title, $amount, $category)
    {
        $this->title = $title;
        $this->amount = $amount;
        $this->category = $category;
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function setAmount($amount){
        $this->amount = $amount;
    }
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
    }
}