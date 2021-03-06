<?php

declare(strict_types=1);

namespace DontKnow\Models;

class Users{

    public $id = null;
    /*Public $firstname;
    Public $lastname;
    Public $email;
    Public $token;
    Public $pwd;
    Public $role=1;
    Public $status=0;*/

    public function setIDBIS($id)
    {
        $this->id = $id;
    }

    public function setFirstname($firstname){
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }
    public function setLastname($lastname){
        $this->lastname = strtoupper(trim($lastname));
    }
    public function setEmail($email){
        $this->email = strtolower(trim($email));
    }
    public function setPwd($pwd){
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
    }
    public function setToken($token){
        $this->token = $token;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function setStatus($status){
        $this->status = $status;
    }

    public function addUser(){
        $addUser = new QueryConstructor();
        $arguments = get_object_vars($this);
        $query = $addUser->table("Users")->insert($arguments);
        $query = $addUser->instance->prepare((string)$query);
        $query->execute($arguments);
    }





    public function getRegisterForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Routing::getSlug("Users", "register"),
                "class"=>"",
                "id"=>"form",
                "submit"=>"S'inscrire",
                "classSubmit" =>"bouttonConfirmForm",
                "cancelButton"=>false,
                "enctype"=>false
            ],

            "data"=>[

                "firstname"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre Prénom",
                    "required"=>true,
                    "class"=>"inputAddLogUser",
                    "id"=>"i1--AddLogUser",
                    "minlength"=>2,
                    "maxlength"=>50,
                    "error"=>"Le prénom doit faire entre 2 et 50 caractères"
                ],

                "lastname"=>["type"=>"text","placeholder"=>"Votre nom", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i2--AddLogUser","minlength"=>2,"maxlength"=>100,
                    "error"=>"Le nom doit faire entre 2 et 100 caractères"],

                "email"=>["type"=>"email","placeholder"=>"Votre email", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i3--AddLogUser","maxlength"=>250,
                    "error"=>"L'email n'est pas valide ou il dépasse les 250 caractères"],

                "pwd"=>["type"=>"password","placeholder"=>"Votre mot de passe", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i4--AddLogUser","minlength"=>6,
                    "error"=>"Le mot de passe doit faire au minimum 6 caractères avec des minuscules, majuscules et chiffres"],

                "pwdConfirm"=>["type"=>"password","placeholder"=>"Confirmation", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i5--AddLogUser", "confirm"=>"pwd", "error"=>"Les mots de passe ne correspondent pas"]

            ]

        ];
    }

    public function getLoginForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "class"=>"",
                "id"=>"form",
                "submit"=>"Log in",
                "classSubmit" =>"bouttonConfirmForm",
                "cancelButton"=>false,
                "enctype"=>false
            ],


            "data"=>[

                "email"=>["type"=>"email","placeholder"=>"Votre email", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i1--AddLogUser",
                    "error"=>"L'email n'est pas valide"],

                "pwd"=>["type"=>"password","placeholder"=>"Votre mot de passe", "required"=>true, "class"=>"inputAddLogUser", "id"=>"pwd","pwdLogin"=>"pwd",
                    "error"=>"Mot de passe invalide"]


            ]
        ];
    }

    public function generateToken(){
        $token = sha1(uniqid((string)rand(),true)).date('YmdHis');
        return $token;
    }


    public function updateToken(){
        $user = new Users();
        $user->getOneBy(["email" => $_SESSION['auth']]);
        $user->setIDBIS($user->id);
        $token = $this->generateToken();
        $user->setToken($token);
        $user->updateUser();
        $_SESSION['token'] = $token;
        return $token;
    }

    public function getToken(){
        $user = new Users();
        $user->getOneBy(["email" => $_SESSION['auth']]);
        return $user->token;
    }

    public function loginVerify(Users $user, array $data)
    {

        $user->getOneBy(["email" => $data["email"]]);
        if ($user->id != null && password_verify($data["pwd"],$user->pwd)) {
            $token = $this->generateToken();
            $user->setIDBIS($user->id);
            $user->setToken($token);
            $user->updateUser();
            $_SESSION['auth'] = $data["email"];
            $_SESSION['token'] = $token;
            return true;
        }

        return false;
    }

    public function updateUser(){
        $updateUser = new QueryConstructor();
        $arguments = get_object_vars($this);
        $query = $updateUser->table('Users')->update($arguments);
        $query = $updateUser->instance->prepare((string)$query);
        $query->execute($arguments);
    }

    public  function logged(){
       return isset($_SESSION['auth']);
    }

    public function getRole(string $email){
        $user = new Users();
        $user->getOneBy(["email" => $email]);
        return $user->role;
    }
}
