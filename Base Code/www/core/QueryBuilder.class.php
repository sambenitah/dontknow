<?php

class QueryBuilder {

    public function __construct()
    {
        $this->instance = SPDO::getPDO();
        if(!$this->instance instanceof \PDO)
            throw new \Exception('Aucune connection');
    }



    public function querySelectCountUser(){

    $queryConstructor = new QueryConstructor();
    $query = $queryConstructor->from('Users')->select("Count(id)");
    echo $query;
    $result = $this->selectArray($query);
    return $result;
    }

    public function querySelectCountArticle(){
        $queryConstructor = new QueryConstructor();
        $query = $queryConstructor->from('Articles')->select("Count(id)");
        $result = $this->selectArray($query);
        return $result;
    }

    public function selectArray(string $toto){
        $test = $this->instance->prepare($toto);
        $test->setFetchMode(Pdo::FETCH_ASSOC);
        $test->execute();
        return $test->fetchColumn();
    }




}