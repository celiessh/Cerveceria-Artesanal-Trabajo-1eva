<?php
namespace Cerveceria\App\Controllers;
//echo getcwd()."<br>";
require "app/models/Cervezas.php";//sin el  ../
use \Cerveceria\App\Models\Cervezas;

class HomeController{
    function __construct()
    {
        
    }
    function index(){
        //echo getcwd()."<br>";
        $cervezas=Cervezas::all();
        require "views/home/home.php";
    }

    function show($paramertros){//para mostrar un usuario
        $id=(int)$paramertros[0];
        $cerveza=Cervezas::find($id);//.htaccess es importante
        require "views/home/show.php";
    }

    
    function create(){//el que luego llama a insertar
        require "views/home/create.php";
    }

    /*
echo $cerveza->nombre . " ";
echo $cerveza->tipo. "; ";
echo $cerveza->graduacionAlcoholica. "º De ";
echo $cerveza->pais. " a ";
echo $cerveza->precio.".";
    */
    function store(){
        //echo "E";
        $cerveza=new Cervezas();
        $cerveza->nombre=$_REQUEST["nombre"];//los mismos que en create.php
        $cerveza->tipo=$_REQUEST["tipo"];
        $cerveza->graduacionAlcoholica=$_REQUEST["graduacionAlcoholica"];
        $cerveza->pais=$_REQUEST["pais"];
        $cerveza->precio=$_REQUEST["precio"];
        if($_FILES['ruta']['size']==10000000){//10mb
            if(move_uploaded_file($_FILES['ruta']['tmp_name'], "public/pictures".$_FILES['ruta']['name'])){
                $cerveza->ruta="public/pictures".$_FILES['ruta']['name'];
            }
        }
        if($_FILES['resumen']['size']==5000000){
            move_uploaded_file($_FILES['resumen']['tmp_name'], "public/beer_desc".$_FILES['resumen']['name']);
        }
        //$_FILES['myFile']['size'] /public/beer_desc
        //5 MB = 5000000 Bytes 
        $cerveza->insert();
        header("Location: /home/");
    }

    function edit($args){
        $id=(int)$args[0];
        $user=User::find($id);
        require "views/home/update.php";
    }

    function save(){
        $id=$_REQUEST["id"];
        $user=User::find($id);
        $cerveza->nombre=$_REQUEST["nombre"];//los mismos que en create.php
        $cerveza->tipo=$_REQUEST["tipo"];
        $cerveza->graduacionAlcoholica=$_REQUEST["graduacionAlcoholica"];
        $cerveza->pais=$_REQUEST["pais"];
        $cerveza->precio=$_REQUEST["precio"];
        if($_FILES['ruta']['size']==10000000){//10mb
            if(move_uploaded_file($_FILES['ruta']['tmp_name'], "public/pictures".$_FILES['ruta']['name'])){
                $cerveza->ruta="public/pictures".$_FILES['ruta']['name'];
            }
        }
        $user->save();//metodo del modelo
        header("Location: /user/");
    }

}

?>