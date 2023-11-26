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
        //echo $_FILES['ruta']['name'];
        if($_FILES['ruta']['size']<=10000000){//10mb
            if(move_uploaded_file($_FILES['ruta']['tmp_name'], "public/pictures".$_FILES['ruta']['name'])){
                $cerveza->ruta="public/pictures".$_FILES['ruta']['name'];
            }else{
                $_FILES['ruta']['name']=$cerveza->nombre."_".$_FILES['ruta']['name'];
                $cerveza->ruta="public/pictures".$_FILES['ruta']['name'];
            }
        }else{
            $cerveza->ruta="";
        }
        //$_FILES['myFile']['size'] /public/beer_desc
        //5 MB = 5000000 Bytes 
        $cerveza->insert();
        if($_FILES['resumen']['size']<=5000000){
//ESTUVE PENSANDO SI CREABA UNA FUNCIÓN PARA OBTENER EL ID DEL ULTIMO INTRODUCIDO, COMO NI PUEDO CONFIGURAR EL SERVIDOR QUE LE DEN POR CULO
            $_FILES['resumen']['name']=$_REQUEST["nombre"]."_".$_FILES['resumen']['name'];
            move_uploaded_file($_FILES['resumen']['tmp_name'], "public/beer_desc".$_FILES['resumen']['name']);
        }
        header("Location: /");
    }

    function update($args){//edit
        $id=(int)$args[0];
        $cerveza=Cervezas::find($id);
        require "views/home/update.php";
    }

    function save($id){//save
        //$id=$_REQUEST["id"];
        //var_dump($id);
        $cerveza=Cervezas::find($id[0]);
        $cerveza->nombre=$_REQUEST["nombre"];//los mismos que en create.php
        $cerveza->tipo=$_REQUEST["tipo"];
        $cerveza->graduacionAlcoholica=$_REQUEST["graduacionAlcoholica"];
        $cerveza->pais=$_REQUEST["pais"];
        $cerveza->precio=$_REQUEST["precio"];
        //echo $_FILES['ruta']['name'];
        if($_FILES['ruta']['size']<=10000000){//10mb
            if(move_uploaded_file($_FILES['ruta']['tmp_name'], "public/pictures".$_FILES['ruta']['name'])){
                $cerveza->ruta="public/pictures".$_FILES['ruta']['name'];
            }else{
                $_FILES['ruta']['name']=$cerveza->nombre."_".$_FILES['ruta']['name'];
                $cerveza->ruta="public/pictures".$_FILES['ruta']['name'];
            }
        }else{
            $cerveza->ruta="";
        }
        $cerveza->save();//metodo del modelo
        header("Location: /");
    }

    function delete($args){//proff
        $id=(int)$args[0];
        $cerveza=Cervezas::find($id);
        $cerveza->delete();
        header("Location: /");
    }

}

?>