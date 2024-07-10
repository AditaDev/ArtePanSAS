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
        // private $area;
        private $idper;

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
        // public function getArea(){
        //     return $this->area;
        // }
        public function getObsnov(){
            return $this->obsnov;
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
        // public function setArea($area){
        //     $this->area=$area;
        // }
        public function setObsnov($obsnov){
            $this->obsnov=$obsnov;
        }
      
        function getAll(){
            $sql = "SELECT n.idnov, n.fecreg, n.fecinov, n.fecfnov, n.fecrev, n.tipnov, n.obsnov, n.estnov, n.idper, p.nomper, p.ndper, p.area FROM novedad AS n INNER JOIN persona AS p ON n.idper=p.idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }


        function getOne(){
            $sql = "SELECT fecreg, fecinov, fecfnov, fecrev, tipnov, obsnov, estnov, area, idper FROM novedad WHERE idnov=:idnov";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idnov = $this->getIdnov();
            $result->bindParam(":idnov",$idnov);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        // idnov, fecreg, fecinov, fecfnov, fecrev, tipnov, obsnov, estnov, area, idper

        function save(){
            // try {
                $sql = "INSERT INTO novedad (fecreg, fecinov, fecfnov, fecrev, tipnov, obsnov, estnov, area, idper) VALUES (:fecreg, :fecinov, :fecfnov, f:ecrev, :tipnov, :obsnov, :estnov, :area, :idper)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $fecreg = $this->getFecreg();
                $result->bindParam(":fecreg", $fecreg);
                $fecinov = $this->getFecinov();
                $result->bindParam(":fecinov", $fecinov);
                $fecfnov = $this->getFecfnov();
                $result->bindParam(":fecfnov", $fecfnov);
                $fecrev = $this->getFecrev();
                $result->bindParam(":fecrev", $fecrev);
                $tipnov = $this->getTipnov();
                $result->bindParam(":tipnov", $tipnov);
                $idper = $_SESSION['idper'];
                $result->bindParam(":idper", $idper);
                $obsnov = $this->getObsnov();
                $result->bindParam(":obsnov", $obsnov);
                $estnov = $this->getEstnov();
                $result->bindParam(":estnov", $estnov); 
                // $area = $this->getArea();
                // $result->bindParam(":area", $area);              
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
            try {
                $sql = "UPDATE factura  SET fecreg=:fecreg, fecinov=:fecinov, fecfnov=:fecfnov, fecrev=:fecrev, tipnov=:tipnov, obsnov=:obsnov, estnov=:estnov, area=:area WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $fecreg = $this->getFecreg();
                $result->bindParam(":fecreg", $fecreg);
                $fecinov = $this->getFecinov();
                $result->bindParam(":fecinov", $fecinov);
                $fecfnov = $this->getFecfnov();
                $result->bindParam(":fecfnov", $fecfnov);
                $fecrev = $this->getFecrev();
                $result->bindParam(":fecrev", $fecrev);
                $tipnov = $this->getTipnov();
                $result->bindParam(":tipnov", $tipnov);
                $obsnov = $this->getObsnov();
                $result->bindParam(":obsnov", $obsnov);
                $estnov = $this->getEstnov();
                $result->bindParam(":estnov", $estnov); 
                // $area = $this->getArea();
                // $result->bindParam(":area", $area);
                $result->execute();
            } catch (Exception $e) {
                ManejoError($e);
            }
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