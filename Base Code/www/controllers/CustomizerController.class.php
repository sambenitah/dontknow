<?php

declare(strict_types=1);

namespace DontKnow\Controllers;
use DontKnow\Core\View;


Class CustomizerController{

    const nameClass = "Customizer";

    public function defaultAction(){
        $v = new View("customizer",self::nameClass, "admin");
    }

}