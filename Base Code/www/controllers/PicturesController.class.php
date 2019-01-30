<?php

Class PicturesController{

    public function addPictureAction(){
        $addPicture = new Pictures();
        $form = $addPicture->getAddPictureForm();

        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        $file = $GLOBALS["_FILES"];


        $test = compact( $file , $data);
        var_dump($test);

        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) && !empty($file) ){



        }


        $v = new View("addPicture", "admin");
        $v->assign("addPicture", $form);

    }

    public function showPicturesAction(){
        $v = new View("showPictures", "admin");
    }

}