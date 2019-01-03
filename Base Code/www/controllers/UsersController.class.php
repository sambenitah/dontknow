<?php
class UsersController{

	public function defaultAction(){
		echo "users default";
	}
	
	public function addAction(){

	    $user = new Users();
	    $user->setFirstname("Julien");
	    $user->setLastname("Julien");
        $user->setEmail("jlegoanvid@gmail.com");
        $user->setPwd("Julien78790");
        $user->save();

	}

	public function registerAction(){
        $user = new Users();
        $form = $user->getRegisterForm();


        $v = new  View("addUser", "commercial");
        $v->assign("form", $form);

    }


	public function loginAction(){
	
		$v = new View("loginUser", "commercial");
		
	}


	public function forgetPasswordAction(){
	
		$v = new View("forgetPasswordUser", "back");
		
	}
}