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
                $allUsers = $user->getAll(["email"=>$data["email"]],false);
                if(count($allUsers) > 0 && password_verify($data["pwd"],$allUsers[0]["pwd"])){
                    $token = self::generateToken();
                    $user->setId($allUsers[0]["id"]);
                    $user->setToken($token);
                    $user->save();
                    echo "connection done";
                }

                else
                    echo "email ou mot de passe incorrect";
            }
        }

        $v = new View("loginUser", "commercial");
        $v->assign("form", $form);

    }

    public static function generateToken(){
        $token = sha1(uniqid(rand(),true)).date('YmdHis');
        return $token;
    }
}