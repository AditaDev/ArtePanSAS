<?php
   
class Malm
{
    private $idalm;
    private $fecalm;

//-------------------------------GET---------------------------//
    public function getIdalm(){
        return $this->idalm;
    }

    public function getFecalm(){
        return $this->fecalm;
    }
 

//-------------------------------FIN-GET---------------------------//

//-------------------------------SET---------------------------//
    public function setIdalm($idalm){
        $this->idalm = $idalm;
    }
    public function setFecalm($fecalm){
        $this->fecalm = $fecalm;
    }
  

    function getAll(){
        try{
            $sql = "SELECT idalm, fecalm FROM almuerzo";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            ManejoError($e);
        }
        return $res;
    }
    function getOne(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idalm, fecalm FROM almuerzo WHERE idalm=:idalm";
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        try {
            $sql = "INSERT INTO almuerzo (idalm, fecalm) VALUES (:idalm, :fecalm)";
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
