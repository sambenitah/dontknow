<?php

declare(strict_types=1);

Class CustomizerController{

    const nameClass = "Customizer";

    public function defaultAction(){
        $v = new View("customizer",self::nameClass, "admin");
    }

}