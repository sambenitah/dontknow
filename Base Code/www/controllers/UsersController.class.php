<?php

declare(strict_types=1);

namespace DontKnow\Controllers;
use DontKnow\Core\View;
use DontKnow\Models\Users;
use DontKnow\Core\Validator;
use DontKnow\Core\Routing;

class UsersController{

    const nameClass = "Users";

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function defaultAction(){
        $v = new View("homepage",self::nameClass, "commercial");

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
                $user->addUser();
                header('Location: '.Routing::getSlug("Articles","default").'');
                exit;
            }
        }
        $v = new View("addUser",self::nameClass, "basic");
        $v->assign("form", $form);

    }


    public function loginAction(){
        $user = $this->users;
        $form = $user->getLoginForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($form,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"] )){
                if($user->loginVerify($user,$data)) {
                    header('Location: '.Routing::getSlug("Articles","yourWebSite").'');
                }else{
                        echo"error";
                }
            }

        }
        $v = new View("loginUser",self::nameClass, "login");
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

        $v = new View("loginUser",self::nameClass, "basic");
        $v->assign("form", $form);

    }


}