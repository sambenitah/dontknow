<?php

declare(strict_types=1);

class Statistics extends BaseSQL{

    public function querySelectCountUser(){

        $queryConstructor = new QueryConstructor();
        $query = $queryConstructor->from('Users')->select("Count(id)");
        $result = $this->selectArray($query);
        return $result;
    }
}