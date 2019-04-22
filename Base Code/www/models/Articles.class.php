<?php

declare(strict_types=1);

class Articles extends BaseSQL{

    public $id = null;
    //public $title;
    //public $description;
    //public $route;
   // public $content;

    //public function __construct(){
    //    parent::__construct();
    //}
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

        $this->content = str_replace('"', "'", $content);
    }

    public function setMainPicture($picture)
    {
        $this->main_picture = $picture;
    }

    public function setCategory($category){
        $this->category = ucfirst($category);
    }


    public function getAddArticleForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "class"=>"",
                "id"=>"form",
                "submit"=>"Create",
                "idSubmit" => "bouttonAddArticle",
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
                    "maxlength"=>100,
                    "error"=>"Your title must be between two or one hundred characters",
                ],

                "description"=>["value"=>"Your description", "required"=>true, "id"=>"textaeraAddPage", "class"=>"","minlength"=>2,"maxlength"=>310,
                    "error"=>"Your description must be between two or three hundred ten characters","type"=>""],

                "route"=>["type"=>"text","placeholder"=>"Your url of your page", "required"=>true, "class"=>"inputAddPage", "id"=>"i2--AddPage","maxlength"=>50,
                    "error"=>"Your road exceeds one hundred characters"]
            ]

        ];
    }

    public function getDetailArticleForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action" => "",
                "class"=>"",
                "id"=>"form",
                "idSubmit" => "bouttonDetailArticle",
                "submit"=>"Update",
                "classSubmit" =>"bouttonConfirmForm",
                "cancelButton"=>false,
                "enctype"=>false

            ],


            "data"=>[
                "content"=>["value"=> "",
                    "id"=>"textareaUpdateArticle",
                    "class"=>"",
                    "minlength"=>8,
                    "maxlength"=>10000,
                    "error"=>"Your content must be between two or ten thousand characters","type"=>""
                ],
            ],

            "select" =>[
                "main_picture"=>[
                    "id"=>"selectPicture",
                    "class"=>"select-css",
                    "label"=>"Select your picture",
                    /*"option"=>[
                        [
                            "class" => "tata",
                            "value" => "toto"
                        ],
                        [
                            "class" => "efhgzjk",
                            "value" => "test"
                        ]
                    ],*/
                ],

                "category"=>[
                    "id"=>"selectCategory",
                    "class"=>"select-css",
                    "label"=>"Select your category",
                    /*"option"=>[
                        [
                            "class" => "tata",
                            "value" => "toto"
                        ],
                        [
                            "class" => "efhgzjk",
                            "value" => "test"
                        ]
                    ]*/
                ]
            ]
        ];
    }
}