<?php
namespace Cerveceria\App\Models;
//public
require "core/Model.php";//sin ../
use Cerveceria\Core\Model;

class Cervezas extends Model
{
    public static function all(){
        $dbh=Cervezas::db();//self::db();
        $sql="SELECT * FROM cervezas";
        $statement=$dbh->query($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS,Cervezas::class);
        $Cervezas=$statement->fetchAll(\PDO::FETCH_CLASS);
        return $Cervezas;
    }
    public static function find($id){
        $dbh = self::db();
        $sql="SELECT * FROM cervezas where identificador = :id";
        $statement=$dbh->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS,Cervezas::class);
        $cerveza=$statement->fetch(\PDO::FETCH_CLASS);
        return $cerveza;
    }
    public function insert(){//insertar crear registro A LA MIERDA LO DE STATIC
        $dbh = self::db();
        $sql="INSERT into cervezas(nombre, tipo, graduacionAlcoholica, pais,precio,ruta) 
        values (:nombre, :tipo, :graduacionAlcoholica, :pais, :precio, :ruta)";
        $statement=$dbh->prepare($sql);
        $statement->bindValue(":nombre",$this->nombre);
        $statement->bindValue(":tipo",$this->tipo);
        $statement->bindValue(":graduacionAlcoholica",$this->graduacionAlcoholica);
        $statement->bindValue(":pais",$this->pais);
        $statement->bindValue(":precio",$this->precio);
        $statement->bindValue(":ruta",$this->ruta);
        return $statement->execute();//devuelve true o false
    }

    public function save(){      
      $dbh = self::db();
        $sql="update cervezas set nombre=:nombre, tipo=:tipo,
        graduacionAlcoholica=:graduacionAlcoholica, pais=:pais, precio=:precio, ruta=:ruta where identificador=:id";
       $statement=$dbh->prepare($sql);
       $statement->bindValue(":nombre",$this->nombre);
       $statement->bindValue(":tipo",$this->tipo);
       $statement->bindValue(":graduacionAlcoholica",$this->graduacionAlcoholica);
       $statement->bindValue(":pais",$this->pais);
       $statement->bindValue(":precio",$this->precio);
       $statement->bindValue(":ruta",$this->ruta);
       $statement->bindValue(":id",$this->identificador);
       return $statement->execute();
    }

    public function delete(){
        $dbh = Cervezas::db();
        $sql="DELETE from cervezas where identificador=:identificador";
        $statement=$dbh->prepare($sql);
        $statement->bindValue(":identificador",$this->identificador);
        return $statement->execute();
    }

}
?>