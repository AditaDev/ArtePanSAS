<?php
   
class Malm
{
    private $idalm;
    private $ppalm;
    private $spalm;
    private $jgalm;
    private $fecalm;

//-------------------------------GET---------------------------//
    public function getIdalm(){
        return $this->idalm;
    }
    public function getPpalm(){
        return $this->ppalm;
    }
    public function getSpalm(){
        return $this->spalm;
    }
    public function getJgalm(){
        return $this->jgalm;
    }
    public function getFecalm(){
        return $this->fecalm;
    }
 

//-------------------------------FIN-GET---------------------------//

//-------------------------------SET---------------------------//
    public function setIdalm($idalm){
        $this->idalm = $idalm;
    }
    public function setPpalm($ppalm){
        $this->ppalm = $ppalm;
    }
    public function setSpalm($spalm){
        $this->spalm = $spalm;
    }
    public function setJgalm($jgalm){
        $this->jgalm = $jgalm;
    }
    public function setFecalm($fecalm){
        $this->fecalm = $fecalm;
    }
  

    function getAll(){
        try{
            $sql = "SELECT idalm, ppalm, spalm, jgalm, fecalm FROM almuerzo";
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
        $sql = "SELECT idalm, ppalm, spalm, jgalm, fecalm FROM almuerzo WHERE idalm=:idalm";
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        try {
            $sql = "INSERT INTO almuerzo (ppalm) VALUES (:ppalm)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $ppalm = $this->getPpalm();
            $result->bindParam(":ppalm", $ppalm);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function edit(){
        $sql = "UPDATE almuerzo SET ppalm, spalm, jgalm, fecalm WHERE idalm=:idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $ppalm = $this->getPpalm();
        $result->bindParam(":ppalm", $ppalm);
        $spalm = $this->getSpalm();
        $result->bindParam(":spalm", $spalm);
        $jgalm = $this->getJgalm();
        $result->bindParam(":jgalm", $jgalm);
        $fecalm = $this->getFecalm();
        $result->bindParam(":fecalm", $fecalm);
        $result->execute();
        
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
