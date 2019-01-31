<?php

class Pictures extends BaseSQL{

    public $id = null;
    public $title;
    public $name;
    public $status=0;


    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = urlencode($name);
        /*$this->name = strtr($name,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $this->name = preg_replace('/([^.a-z0-9]+)/i', '-', $this->name );
        */
    }

    public function getName()
    {
        return $this->name;
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

                "name" => ["required" => false, "id" => "file", "class" => "input-file", "type" => "file", "value"=>"Choisir une image","classLabel"=>"label-file"
                    ,"accept" => "image/png,image/jpeg", "titleFile"=>"Download your picture", "errorExtension"=>"You must upload an image with png or jpeg or jpg format",
                    "error" => "Fail to upload your picture",


                     ],

            ]

        ];
    }

}