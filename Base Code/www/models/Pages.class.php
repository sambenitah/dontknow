<?php
class Pages extends BaseSQL{

    public $id = null;
    public $title;
    public $description;
    public $route;

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
        $this->route = trim($route);
    }


    public function getAddPagesForm(){
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
}