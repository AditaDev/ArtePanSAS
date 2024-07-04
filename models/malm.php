<?php
   

class Malm
{
    private $idalm;
    private $iddom;
    private $fecalm;

//-------------------------------GET---------------------------//
    public function getIdalm(){
        return $this->idalm;
    }
    public function getIddom(){
        return $this->iddom;
    }
    public function getFecalm(){
        return $this->fecalm;
    }

//-------------------------------SET---------------------------//
    public function setIdalm($idalm){
        $this->idalm = $idalm;
    }
    public function setIddom($iddom){
        $this->iddom = $iddom;
    }
    public function setFecalm($fecalm){
        $this->fecalm = $fecalm;
    }
  

    function getAll(){
        // try{
            $sql = "SELECT idalm, fecalm, iddom FROM almuerzo";
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
        $sql = "SELECT idalm, fecalm, iddom FROM almuerzo WHERE idalm=:idalm";
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        try {
            // SELECT a.idalm, a.fecalm, d.iddom, d.nomdom FROM almuerzo AS a INNER JOIN dominio;
            $sql = "INSERT INTO almuerzo (idalm, fecalm, iddom) VALUES (:idalm, :fecalm)";
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




}
?>
