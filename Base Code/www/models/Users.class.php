<?php
class Users extends BaseSQL{

    public $id = null;
    public $firstname;
    public $lastname;
    public $email;
    public $pwd;
    public $role=1;
    public $status=0;

    public function __construct(){
        parent::__construct();
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
    public function setRole($role){
        $this->role = $role;
    }
    public function setStatus($status){
        $this->status = $status;
    }

    public function getRegisterForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>Routing::getSlug("Users", "register"),
                "class"=>"",
                "id"=>"form",
                "submit"=>"S'inscrire",
                "classSubmit" =>"bouttonConfirmFrom"],


            "data"=>[

                "firstname"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre Prénom",
                    "required"=>true,
                    "class"=>"inputAddLogUser",
                    "id"=>"i1--AddLogUser"],


                "lastname"=>["type"=>"text","placeholder"=>"Votre nom", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i2--AddLogUser"],
                "email"=>["type"=>"email","placeholder"=>"Votre email", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i3--AddLogUser"],
                "pwd"=>["type"=>"password","placeholder"=>"Votre mot de passe", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i4--AddLogUser"],
                "pwdConfirm"=>["type"=>"password","placeholder"=>"Confirmation", "required"=>true, "class"=>"inputAddLogUser", "id"=>"i5--AddLogUser"]

            ]

        ];
    }


}




