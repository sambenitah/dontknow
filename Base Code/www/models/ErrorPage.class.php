<?php

class ErrorPage extends BaseSQL{

    public function setIdBis($id)
    {
        $this->id = $id;
    }

    public function setContent($content)
    {
        $this->content = ucfirst(trim($content));
    }

    public function setBackgroundColor($backgroundColor)
    {
        $this->background_color = $backgroundColor;
    }

    public function setTextColor($textColor)
    {
        $this->text_color = $textColor;
    }



    public function getUpdateErrorPageForm($content, $background_color, $text_color){
        return [
            "config"=>[
                "method"=>"POST",
                "action" => Routing::getSlug("ErrorPage", "updateErrorPage"),
                "class"=>"",
                "id"=>"form",
                "submit"=>"Update",
                "idSubmit" => "bouttonAddArticle",
                "classSubmit" =>"bouttonConfirmForm",
                "cancelButton"=>false,
                "enctype"=>false

            ],

            "data"=>[

                "content"=>["type"=>"text","placeholder"=>"Your error text", "required"=>false, "class"=>"inputAddPage", "id"=>"inputYourTexte","maxlength"=>100,
                    "error"=>"Your road exceeds one hundred characters", "value"=>"$content"],

                "background_color"=>["type"=>"color","label"=>"Choose your background color", "required"=>false, "class"=>"inputAddPage", "id"=>"button_change_background_color", "minlenght"=>7,"maxlength"=>7,
                    "error"=>"An error has occured", "value"=>"$background_color"],

                "text_color"=>["type"=>"color", "class"=>"inputAddPage","label"=>"Choose your text color", "id"=>"button_change_text_color", "required"=>false, "minlenght"=>7,"maxlength"=>7,
                    "error"=>"An error has occured", "value"=>"$text_color"],
            ]
        ];
    }
}