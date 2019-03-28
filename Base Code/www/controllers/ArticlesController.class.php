<?php

class ArticlesController{

    public function defaultAction(){

        $v = new View("listFrontPages", "front");

    }

    public function addArticleAction(){
        $addPage = new Articles();
        $form = $addPage->getAddArticleForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];


        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($form,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){
                $addPage->setDescription($data["description"]);
                $addPage->setTitle($data["title"]);
                $addPage->setRoute($data["route"]);
                $addPage->save();
                header('Location: '.Routing::getSlug("Articles","showArticles").'');
                exit;
            }
        }
            $v = new View("addArticle", "admin");
            $v->assign("Form", $form);

    }

    public function showArticlesAction(){
        $addPage = new Articles();
        $selectPage = $addPage ->getAll([],true);
        $v = new View("showArticle", "admin");
        $v->assign("ListPage", $selectPage);
    }


    public function detailArticlesAction($param){
        $detailArticle = new Articles();
        $formArticle = $detailArticle->getDetailArticleForm();
        $detail = $detailArticle ->getAll(["route"=>$param],true);
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
            echo json_encode($form["errors"]);


            if(empty($form["errors"])){
                $updateArticle->setIDBIS($id);
                $updateArticle->setContent($data["content"]);
                $updateArticle->setMainPicture($data["main_picture"]);
                $updateArticle->save();
                echo json_encode("Update");
                exit;
            }
        };
    }

    public function deleteArticleAction(){
        $data = $GLOBALS["_POST"];
        $id = $data["id"];
        $deletePicture = new Articles();
        $deletePicture->setId($id, true);
        echo json_encode("Delete");
        exit;
    }


    public function singleArticleAction(){
        new View("singleArticle", "front");

    }

    public function yourWebsiteAction(){
        new View("listFrontPages", "front");
    }

}