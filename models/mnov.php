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
        private $fecha;
        private $rutpdf;

        private $nov;
        private $tini;
        private $tfin;

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
        public function getFecha(){
            return $this->fecha;
        }
        public function getRutpdf(){
            return $this->rutpdf;
        }
        public function getNov(){
            return $this->nov;
        }
        public function getTini(){
            return $this->tini;
        }
        public function getTfin(){
            return $this->tfin;
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
        public function setFecha($fecha){
            $this->fecha=$fecha;
        }
        public function setRutpdf($rutpdf){
            $this->rutpdf=$rutpdf;
        }
        public function setNov($nov){
            $this->nov=$nov;
        }
        public function setTini($tini){
            $this->tini=$tini;
        }
        public function setTfin($tfin){
            $this->tfin=$tfin;
        }

        function getAll(){
            $sql = "SELECT n.idnov, n.fecreg, n.fecrev, n.fecinov, n.fecfnov, n.obsnov, n.tipnov, n.rutpdf, n.estnov, n.idperg AS perg, n.idpercre AS pcre, n.idperrev AS prev, CONCAT(rg.nomper,' ',rg.apeper) AS nomperg, CONCAT(rc.nomper,' ',rc.apeper) AS nomperc, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev, rg.ndper, vt.nomval AS tip, va.nomval AS area, ve.nomval AS est FROM novedad AS n LEFT JOIN persona AS rg ON n.idperg=rg.idper INNER JOIN persona AS rc ON n.idpercre=rc.idper LEFT JOIN persona AS rr ON n.idperrev=rr.idper INNER JOIN valor AS vt ON n.tipnov=vt.idval INNER JOIN valor AS va ON rg.area=va.idval INNER JOIN valor AS ve ON n.estnov=ve.idval";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql = "SELECT n.idnov, n.fecreg, n.fecrev, n.fecinov, n.fecfnov, n.obsnov, n.tipnov, n.rutpdf, n.estnov, n.idperg AS perg, n.idpercre AS pcre, n.idperrev AS prev, CONCAT(rg.nomper,' ',rg.apeper) AS nomperg, CONCAT(rc.nomper,' ',rc.apeper) AS nomperc, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev, rg.ndper, vt.nomval AS tip, va.nomval AS area, ve.nomval AS est FROM novedad AS n LEFT JOIN persona AS rg ON n.idperg=rg.idper INNER JOIN persona AS rc ON n.idpercre=rc.idper LEFT JOIN persona AS rr ON n.idperrev=rr.idper INNER JOIN valor AS vt ON n.tipnov=vt.idval INNER JOIN valor AS va ON rg.area=va.idval INNER JOIN valor AS ve ON n.estnov=ve.idval WHERE idnov=:idnov";
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
                $sql = "INSERT INTO novedad (fecreg, idperg, fecinov, fecfnov, tipnov, idpercre, obsnov, estnov"; 
                if($this->getRutpdf()) $sql .= ", rutpdf";
                $sql .= ")VALUES (:fecreg, :idperg, :fecinov, :fecfnov, :tipnov, :idpercre, :obsnov, :estnov";
                if($this->getRutpdf()) $sql .= ", :rutpdf";
                $sql .= ")";
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
                if($this->getRutpdf()){
                    $rutpdf = $this->getRutpdf();
                    $result->bindParam(":rutpdf", $rutpdf);
                }              
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
        }

        function editAct(){
            //try{
                $estnov = $this->getEstnov();
                $sql = "UPDATE novedad SET estnov=:estnov, idperrev=:idper, fecrev=:fecha WHERE idnov=:idnov";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idnov = $this->getIdnov();
                $result->bindParam(":idnov",$idnov);
                $estnov = $this->getEstnov();
                $result->bindParam(":estnov",$estnov);
                $idper = $this->getIdper();
                $result->bindParam(":idper",$idper);
                $fecha = $this->getFecha();
                $result->bindParam(":fecha",$fecha);
                $result->execute();
            // }catch(Exception $e){
            //     ManejoError($e);
            // }
        }

        function edit(){
           try {
                $sql = "UPDATE novedad  SET fecinov=:fecinov, fecfnov=:fecfnov, tipnov=:tipnov, obsnov=:obsnov, estnov=:estnov"; 
                if($this->getRutpdf()) $sql .= ", rutpdf=:rutpdf";
                $sql .= " WHERE idnov=:idnov";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idnov = $this->getIdnov();
                $result->bindParam(":idnov", $idnov);
                $fecinov = $this->getFecinov();
                $result->bindParam(":fecinov", $fecinov);
                $fecfnov = $this->getFecfnov();
                $result->bindParam(":fecfnov", $fecfnov);
                $tipnov = $this->getTipnov();
                $result->bindParam(":tipnov", $tipnov);
                $obsnov = $this->getObsnov();
                $result->bindParam(":obsnov", $obsnov);
                $estnov = $this->getEstnov();
                $result->bindParam(":estnov", $estnov);
                if($this->getRutpdf()){
                    $rutpdf = $this->getRutpdf();
                    $result->bindParam(":rutpdf", $rutpdf);
                }
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

        function getOnePer($idper){ 
            $sql = "SELECT p.nomper, p.apeper, vt.nomval AS tip FROM persona AS p INNER JOIN novedad AS n ON p.idper=n.idperg INNER JOIN valor AS vt ON n.tipnov=vt.idval WHERE n.idperg=:idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper", $idper);
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