<?php
class PagesController{
	
	public function defaultAction(){


		$v = new View("homepage", "commercial");
		//$v->assign("pseudo","prof");
	}

	public function mainPageBackAction(){
        $v = new View("mainBack", "back");
    }
	

}