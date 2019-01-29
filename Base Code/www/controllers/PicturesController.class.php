<?php

Class PicturesController{

    public function addPictureAction(){
        $addPicture = new Pictures();
        $form = $addPicture->getAddPictureForm();
        $v = new View("addPicture", "admin");
        $v->assign("addPicture", $form);

    }

    public function showPicturesAction(){
        $v = new View("showPictures", "admin");
    }

}