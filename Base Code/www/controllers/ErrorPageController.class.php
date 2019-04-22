<?php

declare(strict_types=1);

Class ErrorPageController{

    public function updateErrorPageAction(){
        $updateErrorPage = new ErrorPage();

        $selecttest = $updateErrorPage->selectArray([]);


        $selectErrorPageForm = $updateErrorPage->getUpdateErrorPageForm($selecttest[0]["content"],$selecttest[0]["background_color"],$selecttest[0]["text_color"]);


        $method = strtoupper($selectErrorPageForm["config"]["method"]);
        $data = $GLOBALS["_".$method];

        if( $_SERVER['REQUEST_METHOD']==$method && !empty($data) ) {

            $validator = new Validator($selectErrorPageForm, $data);
            $form["errors"] = $validator->errors;

            if (empty($form["errors"])) {
                $updateErrorPage->setIdBis(1);
                $updateErrorPage->setContent($data["content"]);
                $updateErrorPage->setBackgroundColor($data["background_color"]);
                $updateErrorPage->setTextColor($data["text_color"]);
                $updateErrorPage->save();
                header('Location: '.Routing::getSlug("ErrorPage","updateErrorPage").'');
                exit;
            }
        }

        $v = new View("updatePageError", "admin");
        $v->assign("ErrorPage", $selectErrorPageForm);
        exit;
    }

    public function showErrorPageAction(){
        $showErrorPage = new ErrorPage();
        $errorPage = $showErrorPage ->selectObject(["id"=>1]);
        $v = new View("errorPage", "errorPage");
        $v->assign("ErrorPage", $errorPage);
        exit;
    }
}