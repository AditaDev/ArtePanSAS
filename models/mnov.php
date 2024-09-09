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
        
        public function setTini($tini){
            $this->tini=$tini;
        }
        public function setTfin($tfin){
            $this->tfin=$tfin;
        }

        function getAll($nov){
            $sql = "SELECT n.idnov, n.fecreg, n.fecrev, n.fecinov, n.fecfnov, n.obsnov, n.tipnov, n.rutpdf, n.estnov, n.tini, n.tfin, n.idperg AS perg, n.idpercre AS pcre, n.idperrev AS prev, CONCAT(rg.nomper,' ',rg.apeper) AS nomperg, CONCAT(rc.nomper,' ',rc.apeper) AS nomperc, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev, rg.ndper, vt.nomval AS tip, va.nomval AS area, ve.nomval AS est FROM novedad AS n LEFT JOIN persona AS rg ON n.idperg=rg.idper INNER JOIN persona AS rc ON n.idpercre=rc.idper LEFT JOIN persona AS rr ON n.idperrev=rr.idper INNER JOIN valor AS vt ON n.tipnov=vt.idval INNER JOIN valor AS va ON rg.area=va.idval INNER JOIN valor AS ve ON n.estnov=ve.idval";
            if($nov=="late") $sql .= " WHERE n.tipnov=32";
            if($nov=="news") $sql .= " WHERE n.tipnov!=32";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql = "SELECT n.idnov, n.fecreg, n.fecrev, n.fecinov, n.fecfnov, n.obsnov, n.tipnov, n.rutpdf, n.estnov, n.tini, n.tfin, n.idperg AS perg, n.idpercre AS pcre, n.idperrev AS prev, CONCAT(rg.nomper,' ',rg.apeper) AS nomperg, CONCAT(rc.nomper,' ',rc.apeper) AS nomperc, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev, rg.ndper, vt.nomval AS tip, va.nomval AS area, ve.nomval AS est, SEC_TO_TIME(SUM(TIME_TO_SEC(SUBTIME(tfin, tini)))) AS tot FROM novedad AS n LEFT JOIN persona AS rg ON n.idperg=rg.idper INNER JOIN persona AS rc ON n.idpercre=rc.idper LEFT JOIN persona AS rr ON n.idperrev=rr.idper INNER JOIN valor AS vt ON n.tipnov=vt.idval INNER JOIN valor AS va ON rg.area=va.idval INNER JOIN valor AS ve ON n.estnov=ve.idval WHERE idnov=:idnov GROUP BY idnov";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idnov = $this->getIdnov();
            $result->bindParam(":idnov",$idnov);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOneSum($idnov){
            $sql = "SELECT idnov, SEC_TO_TIME(SUM(TIME_TO_SEC(SUBTIME(tfin, tini)))) AS tot FROM novedad WHERE idnov=:idnov GROUP BY idnov";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":idnov",$idnov);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function save($nov){
            // try {
                    $sql = "INSERT INTO novedad (fecreg, idperg, idpercre, estnov, tipnov"; 
                    if($this->getRutpdf()) $sql .= ", rutpdf";
                    if($nov=="news") $sql .= ", fecinov, fecfnov, obsnov";
                    if($nov=="late") $sql .=", tini , tfin";
                    $sql .= ") VALUES (:fecreg, :idperg, :idpercre, :estnov, :tipnov";
                    if($this->getRutpdf()) $sql .= ", :rutpdf";
                    if($nov=="news") $sql .= ", :fecinov, :fecfnov, :obsnov";
                    if($nov=="late") $sql .=", :tini , :tfin";
                    $sql .= ")";
                    $modelo = new conexion();
                    $conexion = $modelo->get_conexion();
                    $result = $conexion->prepare($sql);
                    $fecreg = $this->getFecreg();
                    $result->bindParam(":fecreg", $fecreg);
                    $idperg = $this->getIdperg();
                    $result->bindParam(":idperg", $idperg);
                    $idpercre = $this->getIdpercre();
                    $result->bindParam(":idpercre", $idpercre);
                    $estnov = $this->getEstnov();
                    $result->bindParam(":estnov", $estnov);
                    $tipnov = $this->getTipnov();
                    $result->bindParam(":tipnov", $tipnov);
                    if($nov=="news"){
                    $fecinov = $this->getFecinov();
                    $result->bindParam(":fecinov", $fecinov);
                    $fecfnov = $this->getFecfnov();
                    $result->bindParam(":fecfnov", $fecfnov);
                    $obsnov = $this->getObsnov();
                    $result->bindParam(":obsnov", $obsnov);
                    }
                    if($nov=="late"){
                        $tini = $this->getTini();
                        $result->bindParam(":tini", $tini);
                        $tfin = $this->getTfin();
                        $result->bindParam(":tfin", $tfin);
                        } 
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
                $tini = $this->getTini();
                $tfin = $this->getTfin();
                $sql = "UPDATE novedad  SET ";
                if($tini) $sql .= "tini=:tini, ";
                if($tfin) $sql .= "tfin=:tfin, ";

                $sql .= "fecinov=:fecinov, fecfnov=:fecfnov, tipnov=:tipnov, obsnov=:obsnov, estnov=:estnov"; 
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
        function getAllDom($id){
            $sql = "SELECT idval, nomval FROM valor WHERE ";
            if($id==4) $sql .= "iddom=:id";
            else $sql .= "idval=:id";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":id", $id);
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