<?php

class Malm
{
//--------Almuerzo-------
    private $idalm;
    private $fecalm;
    private $ppalm;
    private $spalm;
    private $jgalm;

//--------Pedido-------
    private $idped;
    private $idper;
    private $fecped;
    private $canalm;

//------------------------------GET---------------------------//

//--------Almuerzo-------
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

//--------Pedido-------
    public function getIdped(){
        return $this->idped;
    }
    public function getIdper(){
        return $this->idper;
    }
    public function getfecped(){
        return $this->fecped;
    }
    public function getCanalm(){
        return $this->canalm;
    }   
//-------------------------------SET---------------------------//

//--------Almuerzo-------
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

//--------Pedido-------
    public function setIdped($idped){
        $this->idped=$idped;
    }
    public function setIdper($idper){
        $this->idper=$idper;
    }
    public function setFecped($fecped){
        $this->fecped=$fecped;
    }
    public function setCanalm($canalm){
        $this->canalm=$canalm;
    }

//--------Almuerzo-------
    function getAll(){ 
        $sql = "SELECT idalm, fecalm, ppalm, spalm, jgalm FROM almuerzo";
        // $sql = "SELECT a.idalm, a.fecalm, a.ppalm, a.spalm, a.jgalm, p.idalm, p.idped FROM almuerzo AS a INNER JOIN pedido AS p ON a.idalm=p.idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res; 
    }

    function getOne(){
        $sql = "SELECT idalm, fecalm, ppalm, spalm, jgalm FROM almuerzo WHERE idalm=:idalm";
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
        try {
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
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function edit(){
        $sql = "UPDATE almuerzo SET ppalm=:ppalm, spalm=:spalm, jgalm=:jgalm WHERE idalm=:idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
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

//--------Pedido-------

function getOneAlmF(){
    $sql = "SELECT idalm, ppalm, spalm, jgalm, fecalm FROM almuerzo WHERE DATE(fecalm) >= DATE(NOW())";
    $modelo = new conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);
    $result->execute();
    $res = $result->fetchall(PDO::FETCH_ASSOC);
    return $res; 
}

function getAllDatPed(){
    $sql = "SELECT p.idped, a.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm, p.fecped, p.idper, p.canalm, CONCAT(l.nomper,' ',l.apeper) AS nomper FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm INNER JOIN persona AS l ON p.idper=l.idper WHERE p.idalm=:idalm";
    $modelo = new conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);
    $idalm= $this->getIdalm();
    $result->bindParam(":idalm", $idalm);
    $result->execute();
    $res = $result->fetchall(PDO::FETCH_ASSOC);
    return $res;
}

function getOnePed(){
    $sql = "SELECT p.canalm FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm WHERE DATE(p.fecped) = DATE(NOW()) AND p.idper=:idper";
    $modelo = new conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);
    $idper= $_SESSION['idper'];
    $result->bindParam(":idper", $idper);
    $result->execute();
    $res = $result->fetchall(PDO::FETCH_ASSOC);
    return $res;
}

function savePed(){
    //try{
        $sql = "INSERT INTO pedido (fecped, idper, idalm, canalm) VALUES (:fecped, :idper, :idalm, :canalm)";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $fecped = $this->getfecped();
        $result->bindParam(":fecped",$fecped);
        $idper = $this->getIdper();
        $result->bindParam(":idper",$idper);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm",$idalm);
        $canalm = $this->getCanalm();
        $result->bindParam(":canalm",$canalm);
        $result->execute();
//     }catch(Exception $e){
//         ManejoError($e);
//     }
}
}
?>
