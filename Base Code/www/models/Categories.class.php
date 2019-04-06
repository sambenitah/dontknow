<?php

declare(strict_types=1);

class Categories extends BaseSQL{

    public function setName($name)
    {
        $this->name = $name ;
    }

    public function getAddCategoryForm()
    {
        return [
            "config" => [
                "method" => "POST",
                "action" => Routing::getSlug("Articles", "detailArticles"),
                "class" => "",
                "id" => "form",
                "submit" => "Insert",
                "classSubmit" => "bouttonConfirmForm",
                "idSubmit" => "idBouttonConfirmForm",
                "cancelButton" => false,
                "enctype"=>true

            ],


            "data" => [
                "name" => [
                    "type" => "text",
                    "placeholder" => "Title of your category",
                    "required" => true,
                    "class" => "inputAddPage",
                    "id" => "i1--AddPage",
                    "minlength" => 2,
                    "maxlength" => 30,
                    "error" => "Your new category must be between two or thirtheen characters",
                ],
            ],
        ];
    }
}