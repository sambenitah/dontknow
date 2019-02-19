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

    public function singleFrontPagesAction(){
        new View("singleFrontPages", "front");

    }

    public function yourWebsiteAction(){
        new View("listFrontPages", "front");
    }

}