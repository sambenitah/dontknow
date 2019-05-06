<?php

declare(strict_types=1);

class StatisticsController{

    public function defaultAction(){
        $queryBuilder = new Statistics();
        $countUsers = $queryBuilder->querySelectCountUser();
        //$countArticles = $queryBuilder->querySelectCountArticle();
        echo $countUsers;

        /*
        $v = new View("statistics", "admin");
        $v->assign("CountUser", $countUsers);
        exit;*/
    }

}