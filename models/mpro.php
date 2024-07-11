<?php
class Mpro
{
    public $idpro;
    public $nompro;
    public $idval;
    
    function getIdpro(){
        return $this->idpro;
    }
    function getNompro(){
        return $this->nompro;
    }
    function getIdval(){
        return $this->idval;
    }

    function setIdpro($idpro){
        $this->idpro = $idpro;
    }
    function setNompro($nompro){
        $this->nompro = $nompro;
    }
    function setIdval($idval){
        $this->idval = $idval;
    }


    function getAll(){
        $sql = "SELECT p.idpro, p.nompro, p.idval, d.nomval FROM producto AS p LEFT JOIN valor AS d ON p.idval=d.idval";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    function getOne(){
        $sql = "SELECT idpro, nompro, idval FROM producto WHERE idpro=:idpro";
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
            $sql = "INSERT INTO producto (nompro, idval) VALUES (:nompro, :idval)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nompro = $this->getNompro();
            $result->bindParam(":nompro", $nompro);
            $idval = $this->getIdval();
            $result->bindParam(":idval", $idval);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function edit(){
        $sql = "UPDATE producto SET nompro=:nompro, idval=:idval WHERE idpro=:idpro";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpro = $this->getIdpro();
        $result->bindParam(":idpro", $idpro);
        $nompro = $this->getNompro();
        $result->bindParam(":nompro", $nompro);
        $idval = $this->getIdval();
        $result->bindParam(":idval", $idval);
        $result->execute();
    }
    function getAllDom($iddom){
        $sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(":iddom", $iddom);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
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