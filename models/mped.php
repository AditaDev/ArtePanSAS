<?php


class Mped{
    private $idper;
    private $idalm;
    private $fecped;
    private $canalm;

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
    public function getCanalm(){
        return $this->canalm;
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
    public function setCanalm($canalm){
        $this->canalm=$canalm;
    }

    function getAll(){
        $sql = "SELECT p.idped, p.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm, p.fecped, p.idper, p.canalm FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function getOneAlm(){
        $sql = "SELECT p.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm, p.fecped, p.idper FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm WHERE p.fecped=a.fecalm";
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
        //porahora entons dejemolo asi
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
            $sql = "INSERT INTO pedido (fecped, idper, idalm, canalm) VALUES (:fecped, :idper, :idalm, :canalm)";
            // Deben estar en el mismo orden, si no, la que ingresas como la fecha desde la vista, se te va a guardar en canalm, no sabia que tambien ahi importaba el orden , si amor porue le estas diciendo
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