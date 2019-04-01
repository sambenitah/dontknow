<?php
class Comments extends BaseSQL{

    public $id = null;
    public $content;
    public $userId;
    public $articleId;
    public $commentId;

    public function __construct(){
        parent::__construct();
    }


    public function setIDBIS($id)
    {
        $this->id = $id;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }

    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

    public function getAddCommentForm(){
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "class"=>"",
                "id"=>"form",
                "submit"=>"Create",
                "idSubmit" => "buttonAddComment",
                "classSubmit" =>"buttonConfirmForm",
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





}