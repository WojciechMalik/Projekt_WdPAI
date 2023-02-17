<?php

class Limit
{
    private $id_user;
    private $id_category;
    private $limit;
    public function __construct($id_user, $id_category, $limit)
    {
        $this->id_user = $id_user;
        $this->id_category = $id_category;
        $this->limit = $limit;
    }
    public function getIdUser()
    {
        return $this->id_user;
    }
    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }
    public function getIdCategory()
    {
        return $this->id_category;
    }
    public function setIdCategory($id_category): void
    {
        $this->id_category = $id_category;
    }
    public function getLimit(): float
    {
        return (float)$this->limit;
    }
    public function setLimit($limit): void
    {
        $this->limit = $limit;
    }




}