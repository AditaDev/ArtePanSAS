<?php
    class Mprm{
        private $idprm;
        private $noprm;
        private $fecini;
        private $fecfin;
        private $idjef;
        private $idvtprm;
        private $sptrut;
        private $desprm;
        private $obsprm;
        private $estprm;
        private $idper;
        private $idvubi;
        private $fecsol;
        private $fecrev;
        private $rutpdf;
        

        public function getIdprm(){
            return $this->idprm;
        }
        public function getNoprm(){
            return $this->noprm;
        }
        public function getFecini(){
            return $this->fecini;
        }
        public function getFecfin(){
            return $this->fecfin;
        }
        public function getIdjef(){
            return $this->idjef;
        }
        public function getIdvtprm(){
            return $this->idvtprm;
        }
        public function getSptrut(){
            return $this->sptrut;
        }
        public function getDesprm(){
            return $this->desprm;
        }
        public function getObsprm(){
            return $this->obsprm;
        }
        public function getEstprm(){
            return $this->estprm;
        }
        public function getIdper(){
            return $this->idper;
        }
        public function getIdvubi(){
            return $this->idvubi;
        }
        public function getFecsol(){
            return $this->fecsol;
        }
        public function getFecrev(){
            return $this->fecrev;
        }
        public function getRutpdf(){
            return $this->rutpdf;
        }

        public function setIdprm($idprm){
            $this->idprm=$idprm;
        }
        public function setNoprm($noprm){
            $this->noprm=$noprm;
        }
        public function setFecini($fecini){
            $this->fecini=$fecini;
        }
        public function setFecfin($fecfin){
            $this->fecfin=$fecfin;
        }
        public function setIdjef($idjef){
            $this->idjef=$idjef;
        }
        public function setIdvtprm($idvtprm){
            $this->idvtprm=$idvtprm;
        }
        public function setSptrut($sptrut){
            $this->sptrut=$sptrut;
        }
        public function setDesprm($desprm){
            $this->desprm=$desprm;
        }
        public function setObsprm($obsprm){
            $this->obsprm=$obsprm;
        }
        public function setEstprm($estprm){
            $this->estprm=$estprm;
        }
        public function setIdper($idper){
            $this->idper=$idper;
        }
        public function setIdvubi($idvubi){
            $this->idvubi=$idvubi;
        }
        public function setFecsol($fecsol){
            $this->fecsol=$fecsol;
        }
        public function setFecrev($fecrev){
            $this->fecrev=$fecrev;
        }
        public function setRutpdf($rutpdf){
            $this->rutpdf=$rutpdf;
        }

        function getAll($id){
            $sql ="SELECT r.idprm, r.noprm, r.fecini, r.fecfin, r.idvtprm, r.idvubi, r.rutpdf, DATE_FORMAT(r.fecini, '%e de %M de %Y') AS fini, DATE_FORMAT(r.fecini, '%h:%i %p') AS hini, DATE_FORMAT(r.fecfin, '%e de %M de %Y') AS ffin, DATE_FORMAT(r.fecfin, '%h:%i %p') AS hfin, r.sptrut, r.desprm, r.obsprm, r.estprm, 
    -- Ajuste de duración con condiciones
    FLOOR((TIME_TO_SEC(TIMEDIFF(r.fecfin, r.fecini)) - 
    CASE 
        WHEN (HOUR(r.fecini) < 14 AND HOUR(r.fecfin) > 13) THEN TIME_TO_SEC('1:00:00') 
        ELSE 0 
    END) / TIME_TO_SEC('8:30:00')) AS ddif, 
    SEC_TO_TIME((TIME_TO_SEC(TIMEDIFF(r.fecfin, r.fecini)) - 
    CASE 
        WHEN (HOUR(r.fecini) < 14 AND HOUR(r.fecfin) > 13) THEN TIME_TO_SEC('1:00:00') 
        ELSE 0 
    END) % TIME_TO_SEC('8:30:00')) AS hdif, DATE_FORMAT(r.fecsol, '%e de %M de %Y') AS fsol, DATE_FORMAT(r.fecrev, '%e de %M de %Y') AS frev, vu.nomval AS ubi, vt.nomval AS tprm, pp.idper AS iper, pp.nomper AS nper, pp.apeper AS aper, pp.ndper AS dper, pp.emaper AS eper, pj.idper AS ijef, pj.nomper AS njef, pj.apeper AS ajef, pj.ndper AS djef, pj.emaper AS ejef FROM permiso AS r INNER JOIN persona AS pp ON r.idper = pp.idper INNER JOIN persona AS pj ON r.idjef = pj.idper INNER JOIN valor AS vu ON r.idvubi = vu.idval INNER JOIN valor AS vt ON r.idvtprm = vt.idval";
            if($id==5) $sql .= " WHERE r.idper=:id";
            if($id==7) $sql .= " WHERE r.estprm=3 OR r.estprm=4";
            if($id==15) $sql .= " WHERE r.estprm=2";
            if($id==$_SESSION['idper']) $sql .= " WHERE r.estprm=2 AND r.idjef=:id";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $conexion->query("SET lc_time_names = 'es_ES';");
            $result = $conexion->prepare($sql);
            if($id==3) $result->bindParam(":id", $_SESSION['idper']);
            if($id==$_SESSION['idper']) $result->bindParam(":id", $id);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql ="SELECT r.idprm, r.noprm, r.fecini, r.fecfin, r.idvtprm, r.idvubi, r.rutpdf, DATE_FORMAT(r.fecini, '%e de %M de %Y') AS fini, DATE_FORMAT(r.fecini, '%h:%i %p') AS hini, DATE_FORMAT(r.fecfin, '%e de %M de %Y') AS ffin, DATE_FORMAT(r.fecfin, '%h:%i %p') AS hfin, r.sptrut, r.desprm, r.obsprm, r.estprm, 
    -- Ajuste de duración con condiciones
    FLOOR((TIME_TO_SEC(TIMEDIFF(r.fecfin, r.fecini)) - 
    CASE 
        WHEN (HOUR(r.fecini) < 14 AND HOUR(r.fecfin) > 13) THEN TIME_TO_SEC('1:00:00') 
        ELSE 0 
    END) / TIME_TO_SEC('8:30:00')) AS ddif, 
    SEC_TO_TIME((TIME_TO_SEC(TIMEDIFF(r.fecfin, r.fecini)) - 
    CASE 
        WHEN (HOUR(r.fecini) < 14 AND HOUR(r.fecfin) > 13) THEN TIME_TO_SEC('1:00:00') 
        ELSE 0 
    END) % TIME_TO_SEC('8:30:00')) AS hdif, DATE_FORMAT(r.fecsol, '%e de %M de %Y') AS fsol, DATE_FORMAT(r.fecrev, '%e de %M de %Y') AS frev, vu.nomval AS ubi, vt.nomval AS tprm, pp.idper AS iper, pp.nomper AS nper, pp.apeper AS aper, pp.ndper AS dper, pp.emaper AS eper,  pj.idper AS ijef, pj.nomper AS njef, pj.apeper AS ajef, pj.ndper AS djef, pj.emaper AS ejef FROM permiso AS r INNER JOIN persona AS pp ON r.idper = pp.idper INNER JOIN persona AS pj ON r.idjef = pj.idper INNER JOIN valor AS vu ON r.idvubi = vu.idval INNER JOIN valor AS vt ON r.idvtprm = vt.idval  WHERE r.idprm=:idprm";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $conexion->query("SET lc_time_names = 'es_ES';");
            $result = $conexion->prepare($sql);
            $idprm = $this->getIdprm();
            $result->bindParam(":idprm", $idprm);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function save(){
            try{
                $sptrut = $this->getSptrut();
                $sql = "INSERT INTO permiso (fecini, fecfin, idjef, idvtprm,";
                if($sptrut) $sql .= " sptrut,";
                $sql .= " desprm, estprm, idper, idvubi) VALUES (:fecini, :fecfin, :idjef, :idvtprm,";
                if($sptrut) $sql .= " :sptrut,";
                $sql .= " :desprm, :estprm, :idper, :idvubi)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $fecini = $this->getFecini();
                $result->bindParam(":fecini", $fecini);
                $fecfin = $this->getFecfin();
                $result->bindParam(":fecfin", $fecfin);
                $idjef = $this->getIdjef();
                $result->bindParam(":idjef", $idjef);
                $idvtprm = $this->getIdvtprm();
                $result->bindParam(":idvtprm", $idvtprm);
                if($sptrut) $result->bindParam(":sptrut", $sptrut);
                $desprm = $this->getDesprm();
                $result->bindParam(":desprm", $desprm);
                $estprm = $this->getEstprm();
                $result->bindParam(":estprm", $estprm);
                $idper = $this->getIdper();
                $result->bindParam(":idper", $idper);
                $idvubi = $this->getIdvubi();
                $result->bindParam(":idvubi", $idvubi);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function edit(){
            try{
                $sptrut = $this->getSptrut();
                $sql = "UPDATE permiso SET fecini=:fecini, fecfin=:fecfin, idjef=:idjef, idvtprm=:idvtprm,";
                if($sptrut) $sql .= " sptrut=:sptrut,";
                $sql .= " desprm=:desprm, estprm=:estprm, idper=:idper, idvubi=:idvubi WHERE idprm=:idprm";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idprm = $this->getIdprm();
                $result->bindParam(":idprm", $idprm);
                $fecini = $this->getFecini();
                $result->bindParam(":fecini", $fecini);
                $fecfin = $this->getFecfin();
                $result->bindParam(":fecfin", $fecfin);
                $idjef = $this->getIdjef();
                $result->bindParam(":idjef", $idjef);
                $idvtprm = $this->getIdvtprm();
                $result->bindParam(":idvtprm", $idvtprm);
                if($sptrut) $result->bindParam(":sptrut", $sptrut);
                $desprm = $this->getDesprm();
                $result->bindParam(":desprm", $desprm);
                $estprm = $this->getEstprm();
                $result->bindParam(":estprm", $estprm);
                $idper = $this->getIdper();
                $result->bindParam(":idper", $idper);
                $idvubi = $this->getIdvubi();
                $result->bindParam(":idvubi", $idvubi);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function editAct(){
            try{
                $estprm = $this->getEstprm();
                $sql = "UPDATE permiso SET estprm=:estprm";
                if($estprm==2) $sql .= ", fecsol=:fecsol";
                if($estprm==5 || $estprm==7){ 
                    $sql .= ", fecrev=:fecrev";
                    if($estprm==5) $sql .= ", noprm=:noprm";
                    else $sql .= ", obsprm=:obsprm";
                }
                $sql .= " WHERE idprm=:idprm";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idprm = $this->getIdprm();
                $result->bindParam(":idprm", $idprm);
                $result->bindParam(":estprm", $estprm);
                if($estprm==2){
                    $fecsol = $this->getFecsol();
                    $result->bindParam(":fecsol", $fecsol);
                }
                if($estprm==5 || $estprm==7){
                    $fecrev = $this->getFecrev();
                    $result->bindParam(":fecrev", $fecrev);
                    if($estprm==5){
                        $noprm = $this->getNoprm();
                        $result->bindParam(":noprm", $noprm);
                    }else{ 
                        $obsprm = $this->getObsprm();
                        $result->bindParam(":obsprm", $obsprm);
                }}
                $result->execute();
            } catch (Exception $e) {
                ManejoError($e);
            }
        }

        function savePdf(){
            try{
                $sql = "UPDATE permiso SET rutpdf=:rutpdf WHERE idprm=:idprm";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idprm = $this->getIdprm();
                $result->bindParam(":idprm",$idprm);
                $rutpdf = $this->getRutpdf();
                $result->bindParam(":rutpdf", $rutpdf);
                $result->execute();
            } catch (Exception $e) {
                ManejoError($e);
            }
        }

        function del(){
            try{
                $sql = "DELETE FROM permiso WHERE idprm=:idprm";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idprm = $this->getIdprm();
                $result->bindParam(":idprm", $idprm);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function getAllDom($id){
            $sql = "SELECT idval, nomval FROM valor WHERE ";
            if($id==15) $sql .= "iddom=:id";
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
            // $sql = "SELECT idper, CONCAT(nomper,' ', apeper) AS nomjef FROM persona WHERE actper=1 AND idper!=:idper";
            $sql = "SELECT idper, CONCAT(nomper,' ', apeper) AS nomjef FROM persona WHERE actper=1";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            // $idper = $_SESSION['idper'];
            // $result->bindParam(":idper", $idper);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
    }
?>