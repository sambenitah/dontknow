<?php
class Routing{

    public static $routeFile = "routes.yml";

    public static function getRoute($slug){

        $slug = explode("/", $slug);

        if(!isset($slug[3])){
            $slugPartOne = "/".$slug[1];
            $routes = yaml_parse_file(self::$routeFile);
            if( isset($routes[$slugPartOne])){
                if(empty($routes[$slugPartOne]["controller"]) || empty($routes[$slugPartOne]["action"])){
                    die("Il y a une erreur dans le fichier routes.yml");
                }
                $c = ucfirst($routes[$slugPartOne]["controller"])."Controller";
                $a = $routes[$slugPartOne]["action"]."Action";
                $cPath = "controllers/".$c.".class.php";
                $param = null;



            }else if(isset($slug[1]) && isset($slug[2])){
                $c = ucfirst($slug[1])."Controller";
                $a = $slug[2]."Action";
                $cPath = "controllers/".$c.".class.php";
                $param = null;
            }else{

                return ["c"=>null, "a"=>null,"cPath"=>null ];
            }

        }else{
            $c = ucfirst($slug[1])."Controller";
            $a = $slug[2]."Action";
            $cPath = "controllers/".$c.".class.php";
            $param = $slug[3];

        }

        return ["c"=>$c, "a"=>$a,"cPath"=>$cPath, "param"=>$param ];
    }


    public static function getSlug($c, $a){
        $routes = yaml_parse_file(self::$routeFile);

        foreach ($routes as $slug => $cAndA) {

            if( !empty($cAndA["controller"]) &&
                !empty($cAndA["action"]) &&
                $cAndA["controller"] == $c &&
                $cAndA["action"] == $a){
                return $slug;
            }
        }
        return null;
    }

}










