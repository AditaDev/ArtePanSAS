<?php

class Malm
{
    private $idalm;
    private $fecalm;
    private $ppalm;
    private $spalm;
    private $jgalm;

//-------------------------------GET---------------------------//
    public function getIdalm(){
        return $this->idalm;
    }
    public function getFecalm(){
        return $this->fecalm;
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


//-------------------------------SET---------------------------//
    public function setIdalm($idalm){
        $this->idalm = $idalm;
    }
    public function setFecalm($fecalm){
        $this->fecalm = $fecalm;
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

  

    function getAll(){
        // try{
            $sql = "SELECT idalm, fecalm, ppalm, spalm, jgalm FROM almuerzo";
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
        $sql = "SELECT fecalm, ppalm, spalm, jgalm FROM almuerzo WHERE idalm=:idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        //try {
            $sql = "INSERT INTO almuerzo (fecalm, ppalm, spalm, jgalm) VALUES (:fecalm, :ppalm, :spalm, :jgalm)";
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
    //     } catch (Exception $e) {
    //         ManejoError($e);
    //     }
    }

    function edit(){
        $sql = "UPDATE almuerzo SET ppalm=:ppalm, spalm=:spalm, jgalm=:jgalm WHERE idalm=:idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $ppalm = $this->getPpalm();
        $result->bindParam(":ppalm", $ppalm);
        $spalm = $this->getSpalm();
        $result->bindParam(":spalm", $spalm);
        $jgalm = $this->getJgalm();
        $result->bindParam(":jgalm", $jgalm);
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
