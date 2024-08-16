<?php
    class Mdot{

        //------------Dotacion-----------
        private $ident;
        private $idperent;
        private $idperrec;
        private $fecent;
        private $observ;
        private $estent;
        private $firpent;
        private $firprec;
        private $difent;

        private $firma;

        private $ndper;

        //------------DotxEnt-----------

        private $idvdot; 
        private $idvtal;

        //------------Dotacion-----------
         public function getIdent(){
            return $this->ident;
        }
        public function getIdperent(){
            return $this->idperent;
        }
        public function getIdperrec(){
            return $this->idperrec;
        }
        public function getFecent(){
            return $this->fecent;
        }
        public function getObserv(){
            return $this->observ;
        }
        public function getFirpent(){
            return $this->firpent;
        }
        public function getFirprec(){
            return $this->firprec;
        }
        public function getDifent(){
            return $this->difent;
        }
        public function getEstent(){
            return $this->estent;
        }


        public function getFirma(){
            return $this->firma;
        }

        public function getNdper(){
            return $this->ndper;
        }

        //------------DotxEnt-----------
        public function getIdvdot(){
            return $this->idvdot;
        }
        public function getIdvtal(){
            return $this->idvtal;
        }

        //---------Dotacion---------------
        public function setIdent($ident){
            $this->ident=$ident;
        }
        public function setIdperent($idperent){
            $this->idperent=$idperent;
        }
        public function setIdperrec($idperrec){
            $this->idperrec=$idperrec;
        }
        public function setFecent($fecent){
            $this->fecent=$fecent;
        }
        public function setObserv($observ){
            $this->observ=$observ;
        }
        public function setFirpent($firpent){
            $this->firpent=$firpent;
        }
        public function setfirprec($firprec){
            $this->$firprec=$firprec;
        }
        public function setDifent($difent){
            $this->difent=$difent;
        }

        public function setFirma($firma){
            $this->firma=$firma;
        }

        public function setNdper($ndper){
            $this->ndper = $ndper;
        }
        public function setEstent($estent){
            $this->estent = $estent;
        }

        //------------DotxEnt-----------
        public function setIdvdot($idvdot){
            $this->idvdot = $idvdot;
        }
        public function setIdvtal($idvtal){
            $this->idvtal = $idvtal;
        }
        
        //------------Dotacion-----------

        function getAllD(){
            $sql = "SELECT d.ident, d.idperent AS pent, d.idperrec AS prec, d.fecent, d.fecdev, d.observ, d.firpent, d.firprec, d.difent, CONCAT(pe.nomper,' ',pe.apeper) AS nompent, CONCAT(pr.nomper,' ',pr.apeper) AS nomprec, pe.area, v.nomval AS area FROM dotacion AS d INNER JOIN persona AS pe ON d.idperent=pe.idper LEFT JOIN persona AS pr ON d.idperrec=pr.idper INNER JOIN valor AS v ON pe.area=v.idval";
                    $modelo = new conexion();
                    $conexion = $modelo->get_conexion();
                    $result = $conexion->prepare($sql);
                    $result->execute();
                    $res = $result->fetchall(PDO::FETCH_ASSOC);
                    return $res;
        }

        function save(){
            // try{
                $sql = "INSERT INTO dotacion (idperent, idperrec, fecent, observ, estent, difent) VALUES (:idperent, :idperrec, :fecent, :observ, :estent, :difent)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idperent = $_SESSION['idper'];
                $result->bindParam(":idperent", $idperent);
                $idperrec = $this->getIdperrec();
                $result->bindParam(":idperrec", $idperrec);
                $fecent = $this->getFecent();
                $result->bindParam(":fecent", $fecent);
                $observ = $this->getObserv();
                $result->bindParam(":observ", $observ);
                $estent = $this->getEstent();
                $result->bindParam(":estent", $estent);
                $difent = $this->getDifent();
                $result->bindParam(":difent", $difent);
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
        }

    //------------Elementos x dotacion-----------

        function getAllTxD($ident){
            $sql = "SELECT de.idvdot, v.nomval, vv.nomval, de.idvtal FROM dotxent AS de INNER JOIN valor AS v ON de.idvdot=v.idval INNER JOIN valor AS vv ON de.idvtal=vv.idval WHERE ident=:ident";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":ident", $ident);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function saveExD() 
        {
            // try{
                $sql = "INSERT INTO dotxent (ident, idvdot, idvtal) VALUES (:ident, :idvdot, :idvtal)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $ident = $this->getIdent();
                $result->bindParam(":ident", $ident);
                $idvdot = $this->getIdvdot();
                $result->bindParam(":idvdot", $idvdot);
                $idvtal = $this->getIdvtal();
                $result->bindParam(":idvtal", $idvtal);
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
        }

        function delExD()
        {
            try{
                $sql = "DELETE FROM dotxent WHERE ident=:ident";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $ident = $this->getIdent();
                $result->bindParam(":ident", $ident);
                $result->execute();
            } catch (Exception $e) {
                ManejoError($e);
            }
        }

        //------------Traer valores-----------
        function getAllOpe($iddom){
            $sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":iddom", $iddom);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getAllAcc($iddom){
            $sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":iddom", $iddom);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOneAsg($difent)
        {
            $sql = "SELECT ident FROM dotacion WHERE difent=:difent";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":difent", $difent);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getAllPer($ope){

                    $sql = "SELECT DISTINCT idper, nomper, apeper, ndper FROM persona";
                    if(!$ope) $sql.= " WHERE actper=1";
                    $sql .= " ORDER BY apeper";
                    $modelo = new conexion();
                    $conexion = $modelo->get_conexion();
                    $result = $conexion->prepare($sql);
                    $result->execute();
                    $res = $result->fetchall(PDO::FETCH_ASSOC);
                    return $res;
                 }

        function getAllDot($iddom){
                    $sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
                    $modelo = new conexion();
                    $conexion = $modelo->get_conexion();
                    $result = $conexion->prepare($sql);
                    $result->bindParam(":iddom", $iddom);
                    $result->execute();
                    $res = $result->fetchall(PDO::FETCH_ASSOC);
                    return $res;
                }

    }
?>