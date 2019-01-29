<?php

class UsersController{

    public function defaultAction(){

        $v = new View("homepage", "commercial");

    }

    public function registerAction(){

        $user = new Users();
        $form = $user->getRegisterForm();

        //Est ce qu'il y a des données dans POST ou GET($form["config"]["method"])
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];


        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($form,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){
                $user->setFirstname($data["firstname"]);
                $user->setLastname($data["lastname"]);
                $user->setEmail($data["email"]);
                $user->setPwd($data["pwd"]);
                $user->save();
                header('Location: '.Routing::getSlug("Users","default").'');
                exit;
            }

        }

        $v = new View("addUser", "commercial");
        $v->assign("form", $form);

    }


    public function loginAction(){

        $user = new Users();
        $form = $user->getLoginForm();



        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($form,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"] )){

            }
        }

        $v = new View("loginUser", "commercial");
        $v->assign("form", $form);

    }
}