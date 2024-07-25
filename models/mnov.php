<?php
    class Mnov{

        //------------Novedad-----------
        private $idnov;
        private $fecreg;
        private $fecinov;
        private $fecfnov;
        private $fecrev;
        private $tipnov;
        private $obsnov;
        private $estnov;
        private $idper;
        private $idperg;
        private $idpercre;
        private $idperrev;
        private $area;

        //------------GET-----------
        public function getIdnov(){
            return $this->idnov;
        }
        public function getFecreg(){
            return $this->fecreg;
        }
        public function getFecinov(){
            return $this->fecinov;
        }
        public function getFecfnov(){
            return $this->fecfnov;
        }
        public function getFecrev(){
            return $this->fecrev;
        }
        public function getTipnov(){
            return $this->tipnov;
        }
        public function getEstnov(){
            return $this->estnov;
        }
        public function getIdper(){
            return $this->idper;
        }
        public function getIdperg(){
            return $this->idperg;
        }
        public function getIdpercre(){
            return $this->idpercre;
        }
        public function getIdperrev(){
            return $this->idperrev;
        }
        public function getObsnov(){
            return $this->obsnov;
        }
        public function getArea(){
            return $this->area;
        }


        //------------SET-----------
        public function setIdnov($idnov){
            $this->idnov=$idnov;
        }
        public function setFecreg($fecreg){
            $this->fecreg=$fecreg;
        }
        public function setFecinov($fecinov){
            $this->fecinov=$fecinov;
        }
        public function setFecfnov($fecfnov){
            $this->fecfnov=$fecfnov;
        }
        public function setFecrev($fecrev){
            $this->fecrev=$fecrev;
        }
        public function setTipnov($tipnov){
            $this->tipnov=$tipnov;
        }
        public function setEstnov($estnov){
            $this->estnov=$estnov;
        }
        public function setIdper($idper){
            $this->idper=$idper;
        }
        public function setIdperg($idperg){
            $this->idperg=$idperg;
        }
        public function setIdpercre($idpercre){
            $this->idpercre=$idpercre;
        }
        public function setIdperrev($idperrev){
            $this->idpercre=$idperrev;
        }
        public function setObsnov($obsnov){
            $this->obsnov=$obsnov;
        }
        public function setArea($area){
            $this->area=$area;
        }


        function getAll(){
            $sql = "SELECT n.idnov, n.fecreg, n.fecinov, n.fecfnov, n.obsnov, n.estnov, n.idperg AS perg, n.idpercre AS pcre, n.idperrev AS prev, CONCAT(rg.nomper,' ',rg.apeper) AS nomperg, CONCAT(rc.nomper,' ',rc.apeper) AS nomperc, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev FROM novedad AS n LEFT JOIN persona AS rg ON n.idperg=rg.idper INNER JOIN persona AS rc ON n.idpercre=rc.idper LEFT JOIN persona AS rr ON n.idperrev=rr.idper INNER JOIN valor AS vt ON n.tipnov=vt.idval INNER JOIN valor AS va ON n.area=va.idval";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql = "SELECT n.idnov, n.fecreg, n.fecinov, n.fecfnov, n.obsnov, n.estnov, n.idpercre AS pcre, n.idperrev AS prev, CONCAT(rc.nomper,' ',rc.apeper) AS nperc, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev FROM novedad AS n INNER JOIN persona AS rc ON n.idpercre=rc.idper LEFT JOIN persona AS rr ON n.idperrev=rr.idper INNER JOIN valor AS vt ON n.tipnov=vt.idval INNER JOIN valor AS va ON n.area=va.idval WHERE idnov=:idnov";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idnov = $this->getIdnov();
            $result->bindParam(":idnov",$idnov);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function save(){
            // try {
                $sql = "INSERT INTO novedad (fecreg, idperg, fecinov, fecfnov, tipnov, idpercre, obsnov, estnov, area) VALUES (:fecreg, :idperg, :fecinov, :fecfnov, :tipnov, :idpercre, :obsnov, :estnov, :area)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $fecreg = $this->getFecreg();
                $result->bindParam(":fecreg", $fecreg);
                $idperg = $this->getIdperg();
                $result->bindParam(":idperg", $idperg);
                $fecinov = $this->getFecinov();
                $result->bindParam(":fecinov", $fecinov);
                $fecfnov = $this->getFecfnov();
                $result->bindParam(":fecfnov", $fecfnov);
                $tipnov = $this->getTipnov();
                $result->bindParam(":tipnov", $tipnov);
                $idpercre = $this->getIdpercre();
                $result->bindParam(":idpercre", $idpercre);
                $obsnov = $this->getObsnov();
                $result->bindParam(":obsnov", $obsnov);
                $estnov = $this->getEstnov();
                $result->bindParam(":estnov", $estnov);
                $area = $this->getArea();
                $result->bindParam(":area", $area);               
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
        }

        function editAct(){
            try{
                $sql = "UPDATE novedad SET estnov=:estnov WHERE idnov=:idnov";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idnov = $this->getIdnov();
                $result->bindParam(":idnov",$idnov);
                $estnov = $this->getEstnov();
                $result->bindParam(":estnov",$estnov);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function edit(){
           //try {
                $sql = "UPDATE novedad  SET fecinov=:fecinov, fecfnov=:fecfnov, tipnov=:tipnov, obsnov=:obsnov, estnov=:estnov, area=:area WHERE idnov=:idnov";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $fecinov = $this->getFecinov();
                $result->bindParam(":fecinov", $fecinov);
                $fecfnov = $this->getFecfnov();
                $result->bindParam(":fecfnov", $fecfnov);
                $tipnov = $this->getTipnov();
                $result->bindParam(":tipnov", $tipnov);
                $obsnov = $this->getObsnov();
                $result->bindParam(":obsnov", $obsnov);
                $area = $this->getArea();
                $result->bindParam(":area", $area);
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
        }

        function del(){
            try {
                $sql = "DELETE FROM novedad WHERE idnov=:idnov";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idnov = $this->getIdnov();
                $result->bindParam(":idnov", $idnov);
                $result->execute();
            } catch (Exception $e) {
                ManejoError($e);
            }
        }
        
        //------------Traer valores-----------
        function getAllDom($iddom){
            $sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":iddom", $iddom);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getAllPer(){
            $sql = "SELECT idper, nomper, apeper, ndper, area FROM persona WHERE actper=1";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        
        function editEst()
    {
        try {
            $sql = "UPDATE novedad SET estnov=:estnov WHERE idnov=:idnov";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $estnov = $this->getEstnov();
            $result->bindParam(":estnov", $estnov);
            $idnov = $this->getIdnov();
            $result->bindParam(":idnov", $idnov);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    }

?>