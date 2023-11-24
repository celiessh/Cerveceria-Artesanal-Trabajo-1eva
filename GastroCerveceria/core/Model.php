<?php
namespace Cerveceria\Core;

require "config/db.php";// sin ../
use const dsn; 
use const username;
use const password;

#[\AllowDynamicProperties]
class Model{
    function __construct()
    {
        
    }
    static function db(){//aeducar mvc3 añadir base de datos
        //http://phpmyadmin.docker root password

        
        $dbhandler=null;
        try{
            //Para mostrar tildes en db.php de config
            //echo getcwd()."<br>";
            $dbhandler=new \PDO("mysql:host=localhost;dbname=cerveceria;charset=utf8", "root", "");//dsn,username,password sin contra
            $dbhandler->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $ex){
            echo "Error: ".$ex->getMessage();
        }catch(\Throwable $ex){
            echo "Error: ".$ex->getMessage();
        }
        return $dbhandler;//devuelvo conexion a bd
    }
}



?>