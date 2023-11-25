<?php
namespace Cerveceria\Core;
/*Gestionar esto:
http://mvc.local/user/index
http://mvc.local/index.php?url=user/index

la peticion get:
    http://mvc.local/controlador/metodo/argl/arg
    http://mvc.local/user/show/1
    http://mvc.local/controlador/argumentos se coge a partir de "/" argummentos
*/
class App{

    function __construct()
    {//echo "hola";
        //Tranformación para el controlador
        //tal vez habría que añadir !empty($_GET["url"])
        //redireccion de paginas que no existen en tu servidor a por ejemplo la pagina principal
        isset($_GET["url"]) ? $url = $_GET["url"] : $url="home";//controlador home o cualquiera
        // /user/show/1/ -> user/show/1 (trim) -> [user, show, 1] (explode)
        $arrArguments=explode('/',trim($url,'/'));
        /*echo "<pre>";
        var_dump($arrArguments);
        echo "</pre>";*/
        //obtener controlador
        $controllerName = array_shift($arrArguments);// user | product | home...
        //UserController, ProductController,...
        //convierto user en UserController
        //$controllerName = ucwords($controllerName)."Controller";
        $controllerName = ucwords($controllerName)."Controller";
        
        
        //Transformación para metodos
        count($arrArguments) ? $method=array_shift($arrArguments) : $method ="index";
        
        /*
        count($arrArguments) lo mismo que count($arrArguments)>0 
        se pueden convertir a true un objeto, array numeros excepto el 0 y null que son dalse
        */
        //lo mismo que la de arriba
        //$method=count($arrArguments) ? array_shift($arrArguments) : "index";

        /*//ejemplo de condiciones ternarias y de random
        $edad=rand(1,99);
        echo $edad>=17 ? "Adulto" : "Menor";
        */
        
        $file="app/controllers/$controllerName.php";//sin esto: ../
        //echo $file." ".getcwd()." ";
        if(file_exists($file)){//si existe el fichero lo leo
            require "$file";
        }else{//error
            http_response_code(404);
            //o: header("HTTP/1.0 404 Not Found);
            echo "No encontrado, el recurso. $file";
            die();//si pasa por esta linea el programa muere ===========================================================00
            //die("chau"); exit(); exit("bye"); funciona
        }

        //crear instancia del controlador y llamar al metodo
        //esto con names paces (linea58)
        $controllerName="\\Cerveceria\\App\\Controllers\\".$controllerName;
        $controllerObject = new $controllerName;
        //echo $controllerName." ".getcwd();
        //verificar que el metodo existe
        //echo $method;
        /*echo "$method <pre>";
        var_dump($controllerObject);
        echo "</pre>";*/
        if(method_exists($controllerObject,$method)){
            //invocarlo
            $controllerObject->$method($arrArguments);
        }else{
            http_response_code(404);
            echo "Función no encontrada";
            exit();
        }

    }


}