<?php


class Mped{
    private $idper;
    private $idalm;
    private $fecped;

    // Metodos Get 
    public function getIdper(){
        return $this->idper;
    }
    public function getIdalm(){
         return $this->idalm;
    }
    public function getfecped(){
        return $this->fecped;
   }
    

    // Metodo Set
    public function setIdper($idper){
        $this->idper=$idper;
    }
    public function setIdalm($idalm){
        $this->idalm=$idalm;
    }
    public function setFecped($fecped){
        $this->fecped=$fecped;
    }

    function getAll(){
        $sql = "SELECT p.idped, p.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm, p.fecped, p.idper FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function getOne(){
        $sql = "SELECT p.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm, p.fecped, p.idper FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm WHERE p.fecped=a.fecalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }





   //para el modal
    public function getAllPer(){
        $sql = "SELECT count(idper) As al FROM pedido WHERE idper=:idper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper= $this->getIdper();
        $result->bindParam(":idper",$idper);
        $result->execute();
        $res=$result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        //try{
            $sql = "INSERT INTO pedido (fecped, idper, idalm) VALUES (:fecped, :idper, :idalm)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $fecped = $this->getfecped();
            $result->bindParam(":fecped",$fecped);
            $idper = $this->getIdper();
            $result->bindParam(":idper",$idper);
            $idalm = $this->getIdalm();
            $result->bindParam(":idalm",$idalm);
            $result->execute();
    //     }catch(Exception $e){
    //         ManejoError($e);
    //     }
    }
}
?>