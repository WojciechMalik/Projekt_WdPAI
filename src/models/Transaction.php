<?php

class Transaction
{
    private $title;
    private $amount;
    private $category;
    private $choice;

    public function __construct($title, $amount, $category, $choice)
    {
        $this->title = $title;
        $this->amount = $amount;
        $this->category = $category;
        $this->choice = $choice;
        if($this->choice='Expense'){
            $this->amount *= -1;
        }
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
    public function getChoice(){
        return $this->choice;
    }
    public function setChoice($choice){
        $this->choice = $choice;
    }

}