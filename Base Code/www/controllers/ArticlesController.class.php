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
        $method = strtoupper($formArticle["config"]["method"]);
        $data = $GLOBALS["_".$method];

        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ){

            $validator = new Validator($formArticle,$data);
            $form["errors"] = $validator->errors;

            if(empty($form["errors"])){

                $id = 9;
                $detailArticle->setIDBIS($id);
                $detailArticle->setContent($data["content"]);

                var_dump($detailArticle);


                $detailArticle->save();
                //header('Location: '.Routing::getSlug("Articles","showArticles").'');
                exit;
            }


        }

        $detail = $detailArticle ->getAll(["route"=>$param],true);
        if (empty($detail)) {
            die("Page introuvable");
        }else {
            $v = new View("detailArticle", "admin");
            $v->assign("test", $formArticle);
            $v->assign("DetailArticle", $detail);
        }
    }


    public function singleArticleAction(){
        new View("singleArticle", "front");

    }

    public function yourWebsiteAction(){
        new View("listFrontPages", "front");
    }

}