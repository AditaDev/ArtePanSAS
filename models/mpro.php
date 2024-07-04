<?php
class Mpro
{
    public $idpro;
    public $nompro;
    public $iddom;
    
    function getIdpro(){
        return $this->idpro;
    }
    function getNompro(){
        return $this->nompro;
    }
    function getIddom(){
        return $this->iddom;
    }

    function setIdpro($idpro){
        $this->idpro = $idpro;
    }
    function setNompro($nompro){
        $this->nompro = $nompro;
    }
    function setIddom($iddom){
        $this->iddom = $iddom;
    }


    function getAll(){
        $sql = "SELECT p.idpro, p.nompro, p.iddom, d.nomdom FROM producto AS p LEFT JOIN dominio AS d ON p.iddom=d.iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    function getOne(){
        $sql = "SELECT idpro, nompro, iddom FROM producto WHERE idpro=:idpro";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpro = $this->getIdpro();
        $result->bindParam(":idpro", $idpro);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        // try {
            $sql = "INSERT INTO producto (nompro, iddom) VALUES (:nompro, :iddom)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nompro = $this->getNompro();
            $result->bindParam(":nompro", $nompro);
            $iddom = $this->getIddom();
            $result->bindParam(":iddom", $iddom);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function edit(){
        $sql = "UPDATE producto SET nompro=:nompro, iddom=:iddom WHERE idpro=:idpro";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpro = $this->getIdpro();
        $result->bindParam(":idpro", $idpro);
        $nompro = $this->getNompro();
        $result->bindParam(":nompro", $nompro);
        $iddom = $this->getIddom();
        $result->bindParam(":iddom", $iddom);
        $result->execute();
    }

    function del(){
        try {
            $sql = "DELETE FROM producto WHERE idpro=:idpro";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idpro = $this->getIdpro();
            $result->bindParam(":idpro", $idpro);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

}
?>