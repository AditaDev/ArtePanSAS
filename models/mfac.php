<?php
    class Mfac{

        //------------Factura-----------
        private $idfac;
        private $nofac;
        private $fifac;
        private $confac;
        private $fffac;
        private $estfac;
        private $idemp;
        private $idper;
        private $fefac;
        private $fvfac;
        private $tipfac;
        private $forpag;

        //------------GET-----------
        public function getIdfac(){
            return $this->idfac;
        }
        public function getnofac(){
            return $this->nofac;
        }
        public function getFifac(){
            return $this->fifac;
        }
        public function getConfac(){
            return $this->confac;
        }
        public function getFffac(){
            return $this->fffac;
        }
        public function getEstfac(){
            return $this->estfac;
        }
        public function getIdemp(){
            return $this->idemp;
        }
        public function getIdper(){
            return $this->idper;
        }
        public function getFefac(){
            return $this->fefac;
        }
        public function getFvfac(){
            return $this->fvfac;
        }
        public function getForpag(){
            return $this->forpag;
        }
        public function getTipfac(){
            return $this->tipfac;
        }

        //------------SET-----------
        public function setIdfac($idfac){
            $this->idfac=$idfac;
        }
        public function setnofac($nofac){
            $this->nofac=$nofac;
        }
        public function setFifac($fifac){
            $this->fifac=$fifac;
        }
        public function setConfac($confac){
            $this->confac=$confac;
        }
        public function setFffac($fffac){
            $this->fffac=$fffac;
        }
        public function setEstfac($estfac){
            $this->estfac=$estfac;
        }
        public function setIdemp($idemp){
            $this->idemp=$idemp;
        }
        public function setIdper($idper){
            $this->idper=$idper;
        }
        public function setFefac($fefac){
            $this->fefac=$fefac;
        }
        public function setFvfac($fvfac){
            $this->fvfac=$fvfac;
        }
        public function setForpag($forpag){
            $this->forpag=$forpag;
        }
        public function setTipfac($tipfac){
            $this->tipfac=$tipfac;
        }

      
        function getAll(){
            $sql = "SELECT f.idfac, f.nofac, f.fifac, f.confac, f.fffac, f.idemp, f.estfac, f.forpag, f.idper, f.fefac, f.fvfac, f.forpag, f.tipfac, e.razsoem, e.nitemp, r.nomper FROM factura AS f INNER JOIN empresa AS e ON f.idemp=e.idemp INNER JOIN persona AS r ON f.idper=r.idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

         //Funcion de equipos disponibles
        // function getAllDis(){
        //     $sql = "SELECT e.idequ, e.marca, e.modelo, e.serialeq, e.nomred, e.idvtpeq, e.capgb, e.ram, e.procs, e.fecultman, e.fecproman, e.actequ, e.tipcon, e.contrato, e.valrcont, vt.nomval AS tpe, vc.nomval AS tpc FROM equipo AS e LEFT JOIN valor AS vt ON e.idvtpeq=vt.idval LEFT JOIN valor AS vc ON e.tipcon=vc.idval WHERE e.actqu=1";
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $result->execute();
        //     $res = $result->fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }

        function getOne(){
            $sql = "SELECT idfac, nofac, confac, fifac, estfac, idemp, idper, fefac, fvfac, forpag, tipfac FROM factura WHERE idfac=:idfac";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idfac = $this->getIdfac();
            $result->bindParam(":idfac",$idfac);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function save(){
            // try {
                $sql = "INSERT INTO factura (nofac, confac, fifac, estfac, idemp, idper, fefac, fvfac, forpag, tipfac) VALUES (:nofac, :confac, :fifac, :estfac, :idemp, :idper, :fefac, :fvfac, :forpag, :tipfac)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $nofac = $this->getnofac();
                $result->bindParam(":nofac", $nofac);
                $confac = $this->getConfac();
                $result->bindParam(":confac", $confac);
                $fifac = $this->getFifac();
                $result->bindParam(":fifac", $fifac);
                $estfac = $this->getEstfac();
                $result->bindParam(":estfac", $estfac);
                $idemp = $this->getIdemp();
                $result->bindParam(":idemp", $idemp);
                $idper = $_SESSION['idper'];
                $result->bindParam(":idper", $idper);
                $fefac = $this->getFefac();
                $result->bindParam(":fefac", $fefac);
                $fvfac = $this->getFvfac();
                $result->bindParam(":fvfac", $fvfac); 
                $forpag = $this->getForpag();
                $result->bindParam(":forpag", $forpag);   
                $tipfac = $this->getTipfac();
                $result->bindParam(":tipfac", $tipfac);                
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
        }

        function editAct(){
            try{
                $sql = "UPDATE factura SET estfac=:estfac WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idfac = $this->getIdfac();
                $result->bindParam(":idfac",$idfac);
                $estfac = $this->getEstfac();
                $result->bindParam(":estfac",$estfac);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function edit(){
            try {
                $sql = "UPDATE factura  SET nofac=:nofac, confac=:confac, estfac=:estfac, idemp=:idemp, fefac=:fefac, fvfac=:fvfac, forpag=:forpag, tipfac=:tipfac WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $nofac = $this->getnofac();
                $result->bindParam(":nofac", $nofac);
                $confac = $this->getConfac();
                $result->bindParam(":confac", $confac);
                $fefac = $this->getFefac();
                $result->bindParam(":fefac", $fefac);
                $fvfac = $this->getFvfac();
                $result->bindParam(":fvfac", $fvfac);
                $estfac = $this->getEstfac();
                $result->bindParam(":estfac", $estfac);
                $idemp = $this->getIdemp();
                $result->bindParam(":idemp", $idemp);
                $forpag = $this->getForpag();
                $result->bindParam(":forpag", $forpag);
                $tipfac = $this->getTipfac();
                $result->bindParam(":tipfac", $tipfac);
                $result->execute();
            } catch (Exception $e) {
                ManejoError($e);
            }
        }

        function del(){
            try {
                $sql = "DELETE FROM factura WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idfac = $this->getIdfac();
                $result->bindParam(":idfac", $idfac);
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
        
        function editEst()
    {
        try {
            $sql = "UPDATE factura SET estfac=:estfac WHERE idfac=:idfac";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $estfac = $this->getEstfac();
            $result->bindParam(":estfac", $estfac);
            $idfac = $this->getIdfac();
            $result->bindParam(":idfac", $idfac);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

        // function getEqxEp($idequ){
        //     $res = null;
        //     $modelo = new conexion();
        //     $sql = "SELECT COUNT(idequ) AS can FROM prgxequi WHERE idequ=:idequ";
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $result->bindParam(':idequ',$idequ);
        //     $result->execute();
        //     $res = $result-> fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }

        // function getAcxEq($idequ){
        //     $res = null;
        //     $modelo = new conexion();
        //     $sql = "SELECT COUNT(idequ) AS can FROM accxequi WHERE idequ=:idequ";
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $result->bindParam(':idequ',$idequ);
        //     $result->execute();
        //     $res = $result-> fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }

        // function getEqprxEq($idequ){
        //     $res = null;
        //     $modelo = new conexion();
        //     $sql = "SELECT COUNT(idequ) AS can FROM asignar WHERE idequ=:idequ";
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $result->bindParam(':idequ',$idequ);
        //     $result->execute();
        //     $res = $result-> fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }

        // //------------Programa-----------
        // function getOnePxE()
        // {
        //     $sql = "SELECT p.idvprg AS prg, p.verprg, v.nomval, d.nomdom FROM prgxequi AS p INNER JOIN valor AS v ON idvprg=v.idval INNER JOIN dominio AS d ON v.iddom=d.iddom WHERE idequ=:idequ";
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $idequ = $this->getIdEqu();
        //     $result->bindParam(":idequ", $idequ);
        //     $result->execute();
        //     $res = $result->fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }

        // function getOnePrg($iddom)
        // {
        //     $sql = "SELECT v.idval, v.nomval, v.iddom, d.nomdom FROM valor AS v INNER JOIN dominio AS d ON v.iddom=d.iddom WHERE v.iddom=:iddom";
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $result->bindParam(":iddom", $iddom);
        //     $result->execute();
        //     $res = $result->fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }

        // function savePxE()
        // {
        //     try{
        //         $sql = "INSERT INTO prgxequi (idequ, idvprg, verprg) VALUES (:idequ, :idvprg, :verprg)";
        //         $modelo = new conexion();
        //         $conexion = $modelo->get_conexion();
        //         $result = $conexion->prepare($sql);
        //         $idequ = $this->getIdequ();
        //         $result->bindParam(":idequ", $idequ);
        //         $idvprg = $this->getIdvprg();
        //         $result->bindParam(":idvprg", $idvprg);
        //         $verprg = $this->getVerprg();
        //         $result->bindParam(":verprg", $verprg);
        //         $result->execute();
        //     } catch (Exception $e) {
        //         ManejoError($e);
        //     }
        // }

        // function delPxE()
        // {
        //     try{
        //         $sql = "DELETE FROM prgxequi WHERE idequ=:idequ";
        //         $modelo = new conexion();
        //         $conexion = $modelo->get_conexion();
        //         $result = $conexion->prepare($sql);
        //         $idequ = $this->getIdequ();
        //         $result->bindParam(":idequ", $idequ);
        //         $result->execute();
        //     } catch (Exception $e) {
        //         ManejoError($e);
        //     }
        // }


        // function getAllTpCt($iddom){
        //     $sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $result->bindParam(":iddom", $iddom);
        //     $result->execute();
        //     $res = $result->fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }

        // function getAllDom($iddomo, $iddomw)
        // {
        //     $sql = "SELECT iddom, nomdom FROM dominio WHERE iddom=:iddomo OR iddom=:iddomw";
        //     $modelo = new conexion();
        //     $conexion = $modelo->get_conexion();
        //     $result = $conexion->prepare($sql);
        //     $result->bindParam(":iddomo", $iddomo);
        //     $result->bindParam(":iddomw", $iddomw);
        //     $result->execute();
        //     $res = $result->fetchall(PDO::FETCH_ASSOC);
        //     return $res;
        // }
    }

?>