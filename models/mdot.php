<?php
    class Mdot{

        //------------Asignar-----------
        private $ident;
        private $idperent;
        private $idperrec;
        private $fecent;
        private $observ;
        private $firpent;
        private $firprec;
        private $difent;

        private $firma;

        private $ndper;



        //------------Asignar-----------
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


        public function getFirma(){
            return $this->firma;
        }

        public function getNdper(){
            return $this->ndper;
        }

        //---------Asignar---------------
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

    }
?>