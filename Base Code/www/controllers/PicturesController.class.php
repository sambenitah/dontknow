<?php

Class PicturesController{

    public function addPictureAction(){
        $addPicture = new Pictures();
        $form = $addPicture->getAddPictureForm();

        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        $file = $GLOBALS["_FILES"];

        // amelioration possible creer une nouvelle cle dans les modeles qui contient juste les inputs type file ensuite modifier le form.mod.php

        $data = array_merge($data,$file);


        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) && !empty($file) ){

            $validator = new ValidatorFiles($form,$data,$file);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){
                $addPicture->setTitle($data["title"]);
                $addPicture->setName($data["name"]);
                header('Location: '.Routing::getSlug("Pictures","addPicture").'');
                exit;
            }


        }


        $v = new View("addPicture", "admin");
        $v->assign("addPicture", $form);

    }

    public function showPicturesAction(){
        $v = new View("showPictures", "admin");
    }

}