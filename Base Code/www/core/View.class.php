<?php

declare(strict_types=1);

class View{

    private $v;
    private $t;
    private $data = [];

    public function __construct($v, $t="back"){
        $this->setView($v);
        $this->setTemplate($t);
    }

    public function setView($v){
        $viewPath = "views/".$v.".view.php";
        if( file_exists($viewPath)){
            $this->v=$viewPath;
        }else{
            header('Location: '.Routing::getSlug("ErrorPage","showErrorPage").'');
        }
    }

    public function setTemplate($t){
        $templatePath = "views/templates/".$t.".tpl.php";
        if( file_exists($templatePath)){
            $this->t=$templatePath;
        }else{
            header('Location: '.Routing::getSlug("ErrorPage","showErrorPage").'');
        }

    }


    //$modal = form //"views/modals/form.mod.php"
    //$config = [ ..... ]
    public function addModal($modal, $config){
        //form.mod.php
        $modalPath = "views/modals/".$modal.".mod.php";
        if( file_exists($modalPath)){
            include $modalPath;
        }else{
            header('Location: '.Routing::getSlug("ErrorPage","showErrorPage").'');
        }
    }

    //$this->data =["pseudo"=>"prof", "age"=>30, "city"=>"Paris"]
    public function assign($key, $value){
        $this->data[$key]=$value;
    }


    public function __destruct(){
        extract($this->data);
        //$this->data =["pseudo"=>"prof", "age"=>30, "city"=>"Paris"]
        //$pseudo = "prof"
        //$age = 30
        //$city = "Paris"
        include $this->t;
    }
}


