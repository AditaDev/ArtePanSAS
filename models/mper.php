<?php
class Mper
{   
    //------------Persona-----------
    private $idper;
    private $nomper;
    private $apeper;
    private $ndper;
    private $area;
    private $emaper;
    private $pasper;
    private $actper;
    private $idval;

    //------------Perfil-----------
    private $idpef;

    //------------Persona-----------
    public function getIdper(){
        return $this->idper;
    }
    public function getNomper(){
        return $this->nomper;
    }
    public function getApeper(){
        return $this->apeper;
    }
    public function getNdper(){
        return $this->ndper;
    }
    public function getArea(){
        return $this->area;
    }
    public function getEmaper(){
        return $this->emaper;
    }
    public function getPasper(){
        return $this->pasper;
    }
    public function getActper(){
        return $this->actper;
    }
    public function getIdval(){
        return $this->idval;
    }
    //------------Perfil-----------
    public function getIdpef()
    {
        return $this->idpef;
    }
    //------------Persona-----------
    public function setIdper($idper){
        $this->idper = $idper;
    }
    public function setNomper($nomper){
        $this->nomper = $nomper;
    }
    public function setApeper($apeper){
        $this->apeper = $apeper;
    }
    public function setNdper($ndper){
        $this->ndper = $ndper;
    }
    public function setArea($area){
        $this->area = $area;
    }
    public function setEmaper($emaper){
        $this->emaper = $emaper;
    }
    public function setPasper($pasper){
        $this->pasper = $pasper;
    }
    public function setActper($actper){
        $this->actper = $actper;
    }
    public function setIdval($idval){
        $this->idval = $idval;
    }
    //------------Perfil-----------
    public function setIdpef($idpef)
    {
        $this->idpef = $idpef;
    }
    //------------Persona-----------
    function getAll()
    {
        $sql = "SELECT p.idper, p.nomper, p.apeper, p.ndper, p.emaper, p.pasper, p.area, p.actper, pf.idpef, v.nomval FROM persona AS p INNER JOIN valor AS v ON p.area=v.idval LEFT JOIN perxpef AS pf ON p.idper=pf.idper";
        $sql .= " GROUP BY p.idper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);                                    
        return $res;
    }

    function getOne()
    {
        $sql = "SELECT p.idper, p.nomper, p.apeper, p.ndper, p.emaper, p.pasper, p.area, p.actper, pf.idpef, v.nomval FROM persona AS p INNER JOIN valor AS v ON p.area=v.idval LEFT JOIN perxpef AS pf ON p.idper=pf.idper WHERE p.idper=:idper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save()
    {
        //try {
            $sql = "INSERT INTO persona(nomper, apeper, ndper, area, emaper, actper";
            if ($this->getPasper()) $sql .= ", pasper";
            $sql .= ") VALUES (:nomper, :apeper, :ndper, :area, :emaper, :actper";
            if ($this->getPasper()) $sql .= ", :pasper";
            $sql .= ")";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nomper = $this->getNomper();
            $result->bindParam(":nomper", $nomper);
            $apeper = $this->getApeper();
            $result->bindParam(":apeper", $apeper);
            $ndper = $this->getNdper();
            $result->bindParam(":ndper", $ndper);
            $area = $this->getArea();
            $result->bindParam(":area", $area);
            $emaper = $this->getEmaper();
            $result->bindParam(":emaper", $emaper);
            $actper = $this->getActper();
            $result->bindParam(":actper", $actper);
            if ($this->getPasper()) {
                $pasper = $this->getPasper();
                $pasper = sha1($pasper);
                $result->bindParam(":pasper", $pasper);
            }
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function savePerXls()
    {
        // try{
            $sql = "INSERT INTO persona (nomper, apeper, ndper, emaper, area, actper, pasper) VALUES (:nomper, :apeper, :ndper, :emaper, :area, :actper, :pasper)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
                $nomper = $this->getNomper();
                $result->bindParam(":nomper", $nomper);
                $apeper = $this->getApeper();
                $result->bindParam(":apeper", $apeper);
                $ndper = $this->getNdper();
                $result->bindParam(":ndper", $ndper);
                $emaper = $this->getEmaper();
                $result->bindParam(":emaper", $emaper);
                $area = $this->getArea();
                $result->bindParam(":area", $area);
                $actper = $this->getActper();
                $result->bindParam(":actper", $actper);
                $pasper = $this->getPasper();
                $pasper = sha1($pasper);
                $result->bindParam(":pasper", $pasper);
                $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function EditPerXls()
    {
        // try{
            $sql = "UPDATE persona SET nomper=:nomper, apeper=:apeper, ndper=:ndper, emaper=:emaper, area=:area,  actper=:actper, pasper=:pasper WHERE idper=:idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
                $idper = $this->getIdper();
                $result->bindParam(":idper", $idper);
                $nomper = $this->getNomper();
                $result->bindParam(":nomper", $nomper);
                $apeper = $this->getApeper();
                $result->bindParam(":apeper", $apeper);
                $ndper = $this->getNdper();
                $result->bindParam(":ndper", $ndper);
                $emaper = $this->getEmaper();
                $result->bindParam(":emaper", $emaper);
                $area = $this->getArea();
                $result->bindParam(":area", $area);
                $actper = $this->getActper();
                $result->bindParam(":actper", $actper);
                $pasper = $this->getPasper();
                $pasper = sha1($pasper);
                $result->bindParam(":pasper", $pasper);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function editAct()
    {
        $sql = "UPDATE persona SET actper=:actper WHERE idper=:idper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $actper = $this->getActper();
        $result->bindParam(":actper", $actper);
        $result->execute();
    }

    function edit(){
        try{
            $sql = "UPDATE persona SET nomper=:nomper, apeper=:apeper, ndper=:ndper, area=:area, emaper=:emaper, actper=:actper";
            if ($this->getPasper()) $sql .= ", pasper=:pasper";
            $sql .= " WHERE idper=:idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam(":idper", $idper);
            $nomper = $this->getNomper();
            $result->bindParam(":nomper", $nomper);
            $apeper = $this->getApeper();
            $result->bindParam(":apeper", $apeper);
            $ndper = $this->getNdper();
            $result->bindParam(":ndper", $ndper);
            $area = $this->getArea();
            $result->bindParam(":area", $area);
            $emaper = $this->getEmaper();
            $result->bindParam(":emaper", $emaper);
            $actper = $this->getActper();
            $result->bindParam(":actper", $actper);
            if ($this->getPasper()) {
                $pasper = $this->getPasper();
                $pasper = sha1($pasper);
                $result->bindParam(":pasper", $pasper);
            }
            $result->execute();
        }catch (Exception $e) {
            ManejoError($e);
        }
    }

    function del()
    {
        try {
            $sql = "DELETE FROM persona WHERE idper=:idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam(":idper", $idper);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }
 
    function getPFxP($idper){
        $res = null;
        $modelo = new conexion();
		$sql = "SELECT COUNT(idper) AS can FROM perxpef WHERE idper=:idper";
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->bindParam(':idper',$idper);
		$result->execute();
		$res = $result-> fetchall(PDO::FETCH_ASSOC);
		return $res;
	}

    //------------Perfil-----------
    
    function getOnePxF()
    {
        $sql = "SELECT idpef FROM perxpef WHERE idper=:idper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function getOneSPxF($ndper)
    {
        $sql = "SELECT p.idper, p.nomper, p.apeper, p.ndper, p.emaper, p.pasper, p.actper, pf.idpef, v.nomval FROM persona AS p INNER JOIN valor AS v ON p.idper=v.idval LEFT JOIN perxpef AS pf ON p.idper=pf.idper WHERE p.ndper=:ndper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(":ndper", $ndper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function getOnePef()
    {
        $sql = "SELECT idpef, nompef FROM perfil";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function savePxF()
    {
        try{
            $sql = "INSERT INTO perxpef (idper, idpef) VALUES (:idper,:idpef)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam(":idper", $idper);
            $idpef = $this->getIdpef();
            $result->bindParam(":idpef", $idpef);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function savePxFAut($idper,$idpef)
    {
        try{
            $sql = "INSERT INTO perxpef (idper, idpef) VALUES (:idper,:idpef)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper", $idper);
            $result->bindParam(":idpef", $idpef);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function delPxF()
    {
        try{
            $sql = "DELETE FROM perxpef WHERE idper=:idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam(":idper", $idper);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }
    

     //------------Traer valores-----------

      function getAllDom($iddom)
    {
        $sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(":iddom", $iddom);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function getPef()
    {
        $sql = "SELECT idpef, nompef FROM perfil";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function CompVal(){
		$sql = "SELECT idval, COUNT(*) AS sum FROM valor WHERE idval=:idval";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $idval = $this->getIdval();
        $result->bindParam(":idval", $idval);
		$result->execute();
		$res = $result->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
    function selectUsu(){
		$sql = "SELECT idper, COUNT(*) AS sum FROM persona WHERE ndper=:ndper";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$ndper=$this->getNdper();
		$result->bindParam(":ndper",$ndper);
		$result->execute();
		$res = $result->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
    function CompPef(){
		$sql = "SELECT idpef, COUNT(*) AS sum FROM perfil WHERE idpef=:idpef";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $idpef = $this->getIdpef();
        $result->bindParam(":idpef", $idpef);
		$result->execute();
		$res = $result->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
}
