<?php

class Pictures extends BaseSQL{

    public $id = null;
    public $name;
    public $status=0;


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = strtoupper(trim($name));
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
                "action" => "",
                "class" => "",
                "id" => "form",
                "submit" => "Insert",
                "classSubmit" => "bouttonConfirmForm",
                "cancelButton" => false

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

                "name" => ["required" => true, "id" => "file", "class" => "input-file", "type" => "file", "value"=>"Choisir une image","classLabel"=>"label-file"
                    ,"accept" => "image/png, image/jpeg" ],

            ]

        ];
    }

}