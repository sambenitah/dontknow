<?php
class Articles extends BaseSQL{

    public $id = null;
    //public $title;
    //public $description;
    //public $route;
   // public $content;

    public function __construct(){
        parent::__construct();
    }


    /*public function __get($property) {
        if (property_exists($this, $property)) {
            if('date_inserted' === $property) {
                echo "test";
                return $property->format('d/m/Y H:i:s');
            }
            return $this->$property;
        }
        return null;
    }
    */

    public function setIDBIS($id)
    {
        $this->id = $id;
        //  $this->getOneBy(["title"=>"$title"], false);
    }

    public function setTitle($title)
    {
        $this->title = mb_strtoupper(trim($title));
      //  $this->getOneBy(["title"=>"$title"], false);
    }

    public function setDescription($description)
    {
        $this->description = ucfirst(trim($description));
    }

    public function setRoute($route)
    {
        $this->route = urlencode(trim($route));
    }

    public function setContent($content){

        echo $content;
        $this->content = $content;
    }


    public function getAddArticleForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "class"=>"",
                "id"=>"form",
                "submit"=>"Create",
                "classSubmit" =>"bouttonConfirmForm",
                "cancelButton"=>false,
                "enctype"=>false

            ],


            "data"=>[

                "title"=>[
                    "type"=>"text",
                    "placeholder"=>"Title of your page",
                    "required"=>true,
                    "class"=>"inputAddPage",
                    "id"=>"i1--AddPage",
                    "minlength"=>2,
                    "maxlength"=>20,
                    "error"=>"Your title must be between two or fifteen characters",
                ],

                "description"=>["value"=>"Your description", "required"=>true, "id"=>"textaeraAddPage", "class"=>"","minlength"=>2,"maxlength"=>310,
                    "error"=>"Your description must be between two or three hundred ten characters","type"=>""],

                "route"=>["type"=>"text","placeholder"=>"Your url of your page", "required"=>true, "class"=>"inputAddPage", "id"=>"i2--AddPage","maxlength"=>20,
                    "error"=>"Your road exceeds twenty characters"]
            ]

        ];
    }

    public function getDetailArticleForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action" => Routing::getSlug("Article", "register"),
                "class"=>"",
                "id"=>"form",
                "submit"=>"Update",
                "classSubmit" =>"bouttonConfirmForm",
                "cancelButton"=>false,
                "enctype"=>false

            ],


            "data"=>[

                "content"=>["value"=>"Your main content", "required"=>true, "id"=>"test", "class"=>"","minlength"=>2,"maxlength"=>2000,
                    "error"=>"Your content must be between two or one thousand characters","type"=>""],

            ]

        ];
    }
}