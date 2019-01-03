<?php

class AdminController{

    public function yourWebSiteAction(){
        $v = new  View("yourWebSite", "back");
    }

    public function statisticsAction(){
        $v = new  View("statistics", "back");
    }

    public function customizerAction(){
        $v = new  View("customizer", "back");
    }

    public function addPageAction(){
        $v = new  View("addPage", "back");
    }

    public function addImageAction(){
        $v = new  View("addImage", "back");
    }

    public function addOptionsAction(){
        $v = new  View("addOptions", "back");
    }

    public function adjustementAction(){
        $v = new  View("adjustement", "back");
    }

}