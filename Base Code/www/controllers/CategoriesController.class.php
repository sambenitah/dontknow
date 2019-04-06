<?php

declare(strict_types=1);

Class CategoriesController{


    public function addCategoryAction(){
        $addCategory = new Categories();
        $form = $addCategory->getAddCategoryForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];


        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($form,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){
                $addCategory->setName($data["name"]);
                $addCategory->save();
                header('Location: '.Routing::getSlug("Customizer","default").'');
                exit;
            }
        }
        $v = new View("addCategory", "admin");
        $v->assign("ListForm", $form);
    }

    public function showCategoryAction(){
        $showCategory = new Categories();
        $selectCategory = $showCategory ->selectObject([],true);
        echo json_encode($selectCategory);
        exit;
    }

    public function deleteCategoryAction(){
        $data = $GLOBALS["_POST"];
        $id = $data["id"];
        $deletePicture = new Categories();
        $deletePicture->setId($id, true);
        echo json_encode("Delete");
        exit;
    }


}