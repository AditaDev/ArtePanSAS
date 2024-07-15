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

    function getAllAlm(){
        $sql = "SELECT a.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm FROM almuerzo AS a INNER JOIN pedido AS p ON p.idalm=a.idalm WHERE fecalm >= CURDATE()";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

   
    public function getOne(){
        $sql = "SELECT count(idper) As al FROM pedido WHERE idper=:idper;";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper= $this->getIdper();
        $result->bindParam(":idper",$idper);
        $result->execute();
        $res=$result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}
?>