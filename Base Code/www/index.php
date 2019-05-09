<?php
session_start();
require "conf.inc.php";


function myAutoloader($class){
	$classPath = "core/".$class.".class.php";
	$classModel = "models/".$class.".class.php";
	if(file_exists($classPath)){
		include $classPath;
	}else if (file_exists($classModel)){
	    include $classModel;
    }
}

spl_autoload_register("myAutoloader");
$slug = $_SERVER["REQUEST_URI"];
$slugExploded = explode("?", $slug);
$slug = $slugExploded[0];

$routes = Routing::getRoute($slug);
extract($routes);

if( file_exists($controllerPath) ){
	include $controllerPath;
	if( class_exists($controller)){
		$cObject = new $controller();
		if( method_exists($cObject, $action) ){
		    if($connexion){
		        $user = new Users();
		        if($user->logged()) {
		            $userRole = $user->getRole($_SESSION['auth']);
		            if($userRole >= $role)
                        $cObject->$action($param);
		            else
                        header('Location: '.Routing::getSlug("Users","login").'');
                }
                else{
                    header('Location: '.Routing::getSlug("Users","login").'');
                }
            }
            else{
                $cObject->$action($param);
            }

		}else{
            header('Location: '.Routing::getSlug("ErrorPage","showErrorPage").'');
		}
		
	}else{
        header('Location: '.Routing::getSlug("ErrorPage","showErrorPage").'');
	}
}else{
    header('Location: '.Routing::getSlug("ErrorPage","showErrorPage").'');
}


