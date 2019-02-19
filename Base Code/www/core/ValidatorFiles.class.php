<?php

class ValidatorFiles extends Validator{


    public function __construct($form,$data,$file){


        parent::__construct($form , $data);

        if(count($file)  != count($form["dataFile"])){
            die("Tentative : faille XSS Validator Files");
        }


        foreach ($file as $image => $info) {


            if( !isset($file[$image] )){
                die("Tentative : faille XSS Validator Files 2");
            }else{
                $size = $_FILES['name']['size'];
                $extension = strrchr($_FILES['name']['name'], '.');
                $extensions = array('.png', '.jpg', '.jpeg');

            }
        }

        foreach ($form["dataFile"] as $Form){


            if ($size > 1200000)

                $this->errors[] = $Form['errorSize'];

            if (!in_array($extension, $extensions))

                $this->errors[] = $Form["errorExtension"];
        }
    }
}