<?php

Class PicturesController{

    public function addPictureAction(){
        $addPicture = new Pictures();
        $form = $addPicture->getAddPictureForm();

        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        $file = $GLOBALS["_FILES"];

        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) && !empty($file) ){

            $validator = new ValidatorFiles($form,$data,$file);
            $picture = basename($_FILES['name']['name']);
            $pathFile = "public/imagesUpload/";
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){
                $addPicture->setTitle($data["title"]);
                $addPicture->setName($file["name"]["name"]);
                

                $addPicture->save();
                move_uploaded_file($_FILES['name']['tmp_name'], $pathFile . $picture);
                //header('Location: '.Routing::getSlug("Pictures","addPicture").'');
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