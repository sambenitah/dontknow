<?php

Class PicturesController{

    public function addPictureAction(){
        $addPicture = new Pictures();
        $form = $addPicture->getAddPictureForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        $file = $GLOBALS["_FILES"];
        $pathFile = ["pathFile" => "public/imagesUpload/"];
        $array = array_merge($data, $file , $pathFile);


        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) && !empty($file) ){

            $validator = new ValidatorFiles($form,$data,$file);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){

                $file = new Pictures();
                $file->setName($array["title"]);
                $file->save($array);
                header('Location: '.Routing::getSlug("Pictures","addPicture").'');
                exit;
            }
        }
        $v = new View("addPicture", "admin");
        $v->assign("addPicture", $form);
    }

    public function showPicturesAction(){

        $showPicture = new Pictures();
        $pictures = $showPicture->getAll([], true);
        $v = new View("showPictures", "admin");
        $v->assign("ListPicture", $pictures);
        exit;

    }

    public  function deletePictureAction(){

        $data = $GLOBALS["_POST"];
        $id = $data["id"];
        $deletePicture = new Pictures();
        $deletePicture->setId($id, true);
        unlink(substr($data["url"],1));
        echo json_encode("Delete");
        exit;
    }


}