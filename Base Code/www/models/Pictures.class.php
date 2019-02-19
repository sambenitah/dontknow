<?php

class Pictures extends BaseSQL{

    public $id = null;
    public $name;
    public $status=0;


    public function setName($name)
    {
        $name= urlencode($name);
        $this->name = str_replace('%','-', $name);
    }

    public function setStatus(int $status)
    {
        $this->status = $status;
    }


    public function getAddPictureForm()
    {
        return [
            "config" => [
                "method" => "POST",
                "action" => Routing::getSlug("Pictures", "register"),
                "class" => "",
                "id" => "form",
                "submit" => "Insert",
                "classSubmit" => "bouttonConfirmForm",
                "idSubmit" => "idBouttonConfirmForm",
                "cancelButton" => false,
                "enctype"=>true

            ],


            "data" => [
                "title" => [
                    "type" => "text",
                    "placeholder" => "Title of your picture",
                    "required" => true,
                    "class" => "inputAddPage",
                    "id" => "i1--AddPage",
                    "minlength" => 2,
                    "maxlength" => 20,
                    "error" => "Your title must be between two or fifteen characters",
                ],
            ],

             "dataFile" => [
                 "name" => ["required" => false, "id" => "file", "class" => "input-file", "type" => "file", "value"=>"Choisir une image","classLabel"=>"label-file"
                     ,"accept" => "image/png,image/jpeg", "titleFile"=>"Download your picture", "errorExtension"=>"You must upload an image with png or jpeg or jpg format",
                     "error" => "Fail to upload your picture", "errorSize" => "Your picture exceeds 1 200 000 octets"
                 ],
             ]
        ];
    }

}