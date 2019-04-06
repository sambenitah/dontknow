<?php

declare(strict_types=1);

class ArticlesController{


    public function addArticleAction(){
        $addArticle = new Articles();
        $form = $addArticle->getAddArticleForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];


        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($form,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){
                $addArticle->setDescription($data["description"]);
                $addArticle->setTitle($data["title"]);
                $addArticle->setRoute($data["route"]);
                $addArticle->save();
                header('Location: '.Routing::getSlug("Articles","showArticles").'');
                exit;
            }
        }
            $v = new View("addArticle", "admin");
            $v->assign("Form", $form);
    }

    public function showArticlesAction(){
        $showArticle = new Articles();
        $selectArticle = $showArticle->selectObject([]);
        $v = new View("showArticle", "admin");
        $v->assign("ListPage", $selectArticle);
    }


    public function detailArticlesAction($param){
        $detailArticle = new Articles();
        $formArticle = $detailArticle->getDetailArticleForm();
        $detail = $detailArticle ->selectObject(["route"=>$param],true);
        if (empty($detail)) {
            die("Page introuvable");
        }else {
            $v = new View("detailArticle", "admin");
            $v->assign("DetailArticle", $detail);
            $v->assign("formArticle", $formArticle);
            json_encode($detail);
        }
    }

    public function updateArticleAction(){

        $updateArticle = new Articles();
        $formArticle = $updateArticle->getDetailArticleForm();
        $method = strtoupper($formArticle["config"]["method"]);
        $data = $GLOBALS["_".$method];
        $id = array_shift($data);
        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($formArticle,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){
                $updateArticle->setIDBIS($id);
                $updateArticle->setContent($data["content"]);
                $updateArticle->setMainPicture($data["main_picture"]);
                $updateArticle->setCategory($data["category"]);
                $updateArticle->save();
                echo json_encode("Update");
                exit;
            }

            echo json_encode($form["errors"]);
        }
    }

    public function deleteArticleAction(){
        $data = $GLOBALS["_POST"];
        $id = $data["id"];
        $deletePicture = new Articles();
        $deletePicture->setId($id, true);
        echo json_encode("Delete");
        exit;
    }


    public function singleArticleAction($param){
        $showDetailArticle = new Articles();
        $selectDetailArticle = $showDetailArticle ->selectObject(["route"=>$param],true);
        if (empty($selectDetailArticle)) {
            die("Page introuvable");
        }else {
            $v = new View("singleArticle", "basic");
            $v->assign("ListPage", $selectDetailArticle);
        }
    }

    public function yourWebsiteAction(){
        $showArticle = new Articles();
        $selectArticle = $showArticle ->getAll([],true);
        $v = new View("listFrontPages", "front");
        $v->assign("ListPage", $selectArticle);
    }

}