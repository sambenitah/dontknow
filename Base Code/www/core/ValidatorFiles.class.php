<?php

class ValidatorFiles extends Validator{


    public function __construct( $config,$data,$file ){


        parent::__construct($config , $data);

        if(count($data)  != count($config["data"])){
            die("Tentative : faille XSS Validator Files");
        }


        foreach ($file as $image => $info) {


            if( !isset($file[$image] )){
                die("Tentative : faille XSS Validator Files 2");
            }else{

                $extension = strrchr($_FILES['name']['name'], '.');
                $extensions = array('.png', '.jpg', '.jpeg');

                if(!in_array($extension, $extensions))
                {
                    $this->errors[]=$info["errorExtension"];
                }
            }
        }

        // Si j'apelle ma class parent a la fin je ne pourrais pas acceder ua tableau des erreurs lorsque je fais la verif ligne 29
    }

}