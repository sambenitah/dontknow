<?php

declare(strict_types=1);

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
                header('Location: '.Routing::getSlug("Articles","default").'');
                exit;
            }

        }

        $v = new View("addUser", "basic");
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
                if($user->loginVerify($user,$data))
                    header('Location: '.Routing::getSlug("Articles","yourWebSite").'');
                else
                    echo "toto";
            }

        }

        $v = new View("loginUser", "login");
        $v->assign("form", $form);

    }

    public function loginFrontAction(){

        $user = new Users();
        $form = $user->getLoginForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($form,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"] )){
                if($user->loginVerify($user,$data))
                    header('Location: '.Routing::getSlug("Articles","default").'');
                else
                    echo "toto";
            }

        }

        $v = new View("loginUser", "basic");
        $v->assign("form", $form);

    }


}