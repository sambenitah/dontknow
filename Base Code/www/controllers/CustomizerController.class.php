<?php

declare(strict_types=1);

Class CustomizerController{

    public function defaultAction(){
        $v = new View("customizer", "admin");
    }

}