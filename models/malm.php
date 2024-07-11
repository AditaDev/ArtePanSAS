<?php
   

class Malm
{
    private $idalm;
    private $idval;
    private $fecalm;

//-------------------------------GET---------------------------//
    public function getIdalm(){
        return $this->idalm;
    }
    public function getIdval(){
        return $this->idval;
    }
    public function getFecalm(){
        return $this->fecalm;
    }

//-------------------------------SET---------------------------//
    public function setIdalm($idalm){
        $this->idalm = $idalm;
    }
    public function setIdval($idval){
        $this->idval = $idval;
    }
    public function setFecalm($fecalm){
        $this->fecalm = $fecalm;
    }
  

    function getAll(){
        // try{
            $sql = "SELECT idalm, fecalm, idval FROM almuerzo";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
        // }catch(Exception $e){
        //     ManejoError($e);
        // }
        return $res; 
    }
    function getOne(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idalm, fecalm, idval FROM almuerzo WHERE idalm=:idalm";
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        try {
            // SELECT a.idalm, a.fecalm, d.idval, d.nomdom FROM almuerzo AS a INNER JOIN dominio;
            $sql = "INSERT INTO almuerzo (idalm, fecalm, idval) VALUES (:idalm, :fecalm)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idalm = $this->getIdalm();
            $result->bindParam(":idalm", $idalm);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function del(){
        try {
            $sql = "DELETE FROM almuerzo WHERE idalm=:idalm";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idalm = $this->getIdalm();
            $result->bindParam(":idalm", $idalm);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function getAllPro($idval)
    {
        $sql = "SELECT idpro, nompro FROM producto WHERE idval=:idval";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(":idval", $idval);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }


}
?>
