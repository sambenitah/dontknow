<?php
class SPDO {


    private static $instance = null;


    public static function getPDO()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new PDO(DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPWD);
        }
        return self::$instance;

    }

}