<?php
class Mpro
{
    public $idpro;
    public $nompro;

    function getIdpro(){
        return $this->idpro;
    }
    function getNompro(){
        return $this->nompro;
    }

    function setIdpro($idpro){
        $this->idpro = $idpro;
    }
    function setNompro($nompro){
        $this->nompro = $nompro;
    }


    function getAll(){
        $sql = "SELECT idpro, nompro FROM producto";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    function getOne(){
        $sql = "SELECT idpro, nompro FROM producto WHERE idpro=:idpro";
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
        try {
            $sql = "INSERT INTO producto (nompro) VALUES (:nompro)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nompro = $this->getNompro();
            $result->bindParam(":nompro", $nompro);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function edit(){
        $sql = "UPDATE producto SET nompro=:nompro WHERE idpro=:idpro";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpro = $this->getIdpro();
        $result->bindParam(":idpro", $idpro);
        $nompro = $this->getNompro();
        $result->bindParam(":nompro", $nompro);
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