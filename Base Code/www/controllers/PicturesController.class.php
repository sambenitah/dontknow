<?php

declare(strict_types=1);

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
                $file->setNameId($array["title"]);
                $file->setName($array["title"]);
                $file->insertPicture($array);
                header('Location: '.Routing::getSlug("Pictures","addPicture").'');
                exit;
            }
        }
        $v = new View("addPicture", "admin");
        $v->assign("addPicture", $form);
    }


    public function showPicturesAction(){

        $showPicture = new Pictures();
        $pictures = $showPicture->selectAllPictureObject();
        $v = new View("showPictures", "admin");
        $v->assign("ListPicture", $pictures);
        exit;
    }

    public function showPictureInSelecteAction(){
        $showPicture = new Pictures();
        $pictures = $showPicture->selectAllPictureArray();
        echo json_encode($pictures);
        exit;
    }

    public  function deletePictureAction(){

        $data = $GLOBALS["_POST"];
        $id = $data["id"];
        $deletePicture = new Pictures();
        $deletePicture->deletePicture(["id"=>$id]);
        unlink(substr($data["url"],1));
        echo json_encode("Delete");
        exit;
    }


}