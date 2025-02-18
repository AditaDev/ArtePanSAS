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
        private $fefac;
        private $fvfac;
        private $tipfac;
        private $forpag;
        private $idpercre;
        private $idper;
        private $fecha;
        private $rutpdf;
        private $rutspt;
        private $idpernov;
        private $fnov;
        private $obsnov;
        private $nitemp;
        private $idval;
        private $numegr;
        private $numbod;
        private $vneto;


        
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
        public function getIdpercre(){
            return $this->idpercre;
        }
        public function getIdper(){
            return $this->idper;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getRutpdf(){
            return $this->rutpdf;
        }
        public function getRutspt(){
            return $this->rutspt;
        }
        public function getIdpernov(){
            return $this->idpernov;
        }
        public function getFnov(){
            return $this->fnov;
        }
        public function getObsnov(){
            return $this->obsnov;
        }
        public function getNitemp(){
            return $this->nitemp;
        }
        public function getIdval(){
            return $this->idval;
        }
        public function getNumegr(){
            return $this->numegr;
        }
        public function getNumbod(){
            return $this->numbod;
        }
        public function getVneto(){
            return $this->vneto;
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
        public function setIdpercre($idpercre){
            $this->idpercre=$idpercre;
        }
        public function setIdper($idper){
            $this->idper=$idper;
        }
        public function setFecha($fecha){
            $this->fecha=$fecha;
        }
        public function setRutpdf($rutpdf){
            $this->rutpdf=$rutpdf;
        }
        public function setRutspt($rutspt){
            $this->rutspt=$rutspt;
        }
        public function setIdpernov($idpernov){
            $this->idpernov=$idpernov;
        }
        public function setFnov($fnov){
            $this->fnov=$fnov;
        }
        public function setObsnov($obsnov){
            $this->obsnov=$obsnov;
        }
        public function setNitemp($nitemp){
            $this->nitemp=$nitemp;
        }
        public function setIdval($idval){
            $this->idval=$idval;
        }
        public function setNumegr($numegr){
            $this->numegr=$numegr;
        }
        public function setNumbod($numbod){
            $this->numbod=$numbod;
        }
        public function setVneto($vneto){
            $this->vneto=$vneto;
        }
       
      
        function getAll(){
            $idpef = $_SESSION['idpef'];
            $sql = "SELECT f.idfac, f.nofac, f.fifac, f.confac, f.fffac, f.idemp, f.estfac, f.obsnov, f.idpercre AS pcre, f.idperrev AS prev, f.idperapr AS papr, f.idperent AS pent, f.idperpag AS ppag, f.idpernov AS pnov, f.fefac, f.fvfac, f.forpag, f.tipfac, f.numbod, f.faprfac, f.fprfac, f.fpagfac, f.fnov, f.rutpdf, f.rutspt, e.razsoem, e.nitemp, CONCAT(rc.nomper,' ',rc.apeper) AS nompcre, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev, CONCAT(ra.nomper,' ',ra.apeper) AS nompapr,CONCAT(re.nomper,' ',re.apeper) AS nompent, CONCAT(rg.nomper,' ',rg.apeper) AS nomppag, CONCAT(rn.nomper,' ',rn.apeper) AS nompnov, ve.nomval AS est, vf.nomval AS fpag, vt.nomval AS tip, f.numegr, vb.nomval AS bod, f.vneto FROM factura AS f INNER JOIN provedores AS e ON f.idemp=e.idemp INNER JOIN persona AS rc ON f.idpercre=rc.idper LEFT JOIN persona AS rr ON f.idperrev=rr.idper LEFT JOIN persona AS ra ON f.idperapr=ra.idper LEFT JOIN persona AS re ON f.idperent=re.idper LEFT JOIN persona AS rg ON f.idperpag=rg.idper LEFT JOIN persona AS rn ON f.idpernov=rn.idper INNER JOIN valor AS ve ON f.estfac=ve.idval INNER JOIN valor AS vf ON f.forpag=vf.idval INNER JOIN valor AS vt ON f.tipfac=vt.idval LEFT JOIN valor AS vb ON f.numbod=vb.idval";
            if ($idpef == 7 ) {
                $sql .= " WHERE (f.tipfac = 22 OR f.tipfac = 23 OR f.tipfac = 24) AND (f.estfac = 48 OR f.estfac = 49)"; 
            }if ($idpef == 8 ) { 
                $sql .= " WHERE (f.tipfac = 19 OR f.tipfac = 20) AND (f.estfac = 48 OR f.estfac = 49)"; 
            }if ($idpef == 9 ) {
                $sql .= " WHERE f.tipfac = 21 AND (f.estfac = 48 OR f.estfac = 49)"; 
            }if ($idpef == 10 ) {
                $sql .= " WHERE f.tipfac = 25 AND (f.estfac = 48 OR f.estfac = 49)"; 
            }if ($idpef == 11 ) {
                $sql .= " WHERE (f.tipfac = 58 OR f.tipfac = 59 OR f.tipfac = 60) AND (f.estfac = 48 OR f.estfac = 49)"; 
            }if ($idpef == 13 ) {
                $sql .= " WHERE (f.tipfac = 14 OR f.tipfac = 15 OR f.tipfac = 16) AND (f.estfac = 48 OR f.estfac = 50) AND f.numbod"; 
            }
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOne(){
            $sql = "SELECT f.idfac, f.nofac, f.fifac, f.confac, f.fffac, f.idemp, f.estfac, f.obsnov, f.idpercre AS pcre, f.idperrev AS prev, f.idperapr AS papr, f.idperent AS pent, f.idperpag AS ppag, f.idpernov AS pnov, f.fefac, f.fvfac, f.forpag, f.tipfac, f.numbod, f.faprfac, f.fprfac, f.fpagfac, f.fnov, f.rutpdf, f.rutspt, e.razsoem, e.nitemp, CONCAT(rc.nomper,' ',rc.apeper) AS nompcre, CONCAT(rr.nomper,' ',rr.apeper) AS nomprev, CONCAT(ra.nomper,' ',ra.apeper) AS nompapr,CONCAT(re.nomper,' ',re.apeper) AS nompent, CONCAT(rg.nomper,' ',rg.apeper) AS nomppag, CONCAT(rn.nomper,' ',rn.apeper) AS nompnov, ve.nomval AS est, vf.nomval AS fpag, vt.nomval AS tip, f.numegr, vb.nomval AS bod, f.vneto FROM factura AS f INNER JOIN provedores AS e ON f.idemp=e.idemp INNER JOIN persona AS rc ON f.idpercre=rc.idper LEFT JOIN persona AS rr ON f.idperrev=rr.idper LEFT JOIN persona AS ra ON f.idperapr=ra.idper LEFT JOIN persona AS re ON f.idperent=re.idper LEFT JOIN persona AS rg ON f.idperpag=rg.idper LEFT JOIN persona AS rn ON f.idpernov=rn.idper INNER JOIN valor AS ve ON f.estfac=ve.idval INNER JOIN valor AS vf ON f.forpag=vf.idval INNER JOIN valor AS vt ON f.tipfac=vt.idval LEFT JOIN valor AS vb ON f.numbod=vb.idval WHERE idfac=:idfac";
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
                $sql = "INSERT INTO factura (nofac, confac, fifac, estfac, idemp, idpercre, fefac, fvfac, forpag, tipfac";
                if($this->getRutpdf()) $sql .= ", rutpdf";
                if($this->getRutspt()) $sql .= ", rutspt";
                $sql .= ") VALUES (:nofac, :confac, :fifac, :estfac, :idemp, :idpercre, :fefac, :fvfac, :forpag, :tipfac";
                if($this->getRutpdf()) $sql .= ", :rutpdf";
                if($this->getRutspt()) $sql .= ", :rutspt";
                $sql .= ")";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $nofac = $this->getNofac();
                $result->bindParam(":nofac", $nofac);
                $confac = $this->getConfac();
                $result->bindParam(":confac", $confac);
                $fifac = $this->getFifac();
                $result->bindParam(":fifac", $fifac);
                $estfac = $this->getEstfac();
                $result->bindParam(":estfac", $estfac);
                $idemp = $this->getIdemp();
                $result->bindParam(":idemp", $idemp);
                $idpercre = $this->getIdpercre();
                $result->bindParam(":idpercre", $idpercre);
                $fefac = $this->getFefac();
                $result->bindParam(":fefac", $fefac);
                $fvfac = $this->getFvfac();
                $result->bindParam(":fvfac", $fvfac); 
                $forpag = $this->getForpag();
                $result->bindParam(":forpag", $forpag);   
                $tipfac = $this->getTipfac();
                $result->bindParam(":tipfac", $tipfac);
                if($this->getRutpdf()){
                    $rutpdf = $this->getRutpdf();
                    $result->bindParam(":rutpdf", $rutpdf);
                }if($this->getRutspt()){
                    $rutspt = $this->getRutspt();
                    $result->bindParam(":rutspt", $rutspt);
                }
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
        }

        function saveFacXls()
    {
        // try{
            $sql = "INSERT INTO factura (nofac, confac, idemp, fefac, fvfac, forpag, tipfac, estfac, idpercre, fifac) VALUES (:nofac, :confac, :idemp, :fefac, :fvfac, :forpag, :tipfac, :estfac, :idpercre, :fifac)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
                $nofac = $this->getNofac();
                $result->bindParam(":nofac", $nofac);
                $confac = $this->getConfac();
                $result->bindParam(":confac", $confac);
                $idemp = $this->getIdemp();
                $result->bindParam(":idemp", $idemp);
                $fefac = $this->getFefac();
                $result->bindParam(":fefac", $fefac);
                $fvfac = $this->getFvfac();
                $result->bindParam(":fvfac", $fvfac); 
                $forpag = $this->getForpag();
                $result->bindParam(":forpag", $forpag);   
                $tipfac = $this->getTipfac();
                $result->bindParam(":tipfac", $tipfac);
                $estfac = $this->getEstfac();
                $result->bindParam(":estfac", $estfac);
                $idpercre = $this->getIdpercre();
                $result->bindParam(":idpercre", $idpercre);
                $fifac = $this->getFifac();
                $result->bindParam(":fifac", $fifac);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function EditFacXls()
    {
        // try{
            $sql = "UPDATE factura SET nofac=:nofac, confac=:confac, idemp=:idemp, fefac=:fefac, fvfac=:fvfac, forpag=:forpag, tipfac=:tipfac, estfac=:estfac WHERE idfac=:idfac";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idfac = $this->getIdfac();
            $result->bindParam(":idfac", $idfac);
            $nofac = $this->getNofac();
            $result->bindParam(":nofac", $nofac);
            $confac = $this->getConfac();
            $result->bindParam(":confac", $confac);
            $idemp = $this->getIdemp();
            $result->bindParam(":idemp", $idemp);
            $fefac = $this->getFefac();
            $result->bindParam(":fefac", $fefac);
            $fvfac = $this->getFvfac();
            $result->bindParam(":fvfac", $fvfac); 
            $forpag = $this->getForpag();
            $result->bindParam(":forpag", $forpag);   
            $tipfac = $this->getTipfac();
            $result->bindParam(":tipfac", $tipfac);
            $estfac = $this->getEstfac();
            $result->bindParam(":estfac", $estfac);
            // $fifac = $this->getFifac();
            // $result->bindParam(":fifac", $fifac);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

        function nov(){
                $sql = "UPDATE factura SET idpernov=:idpernov, fnov=:fnov, obsnov=:obsnov WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idfac = $this->getIdfac();
                $result->bindParam(":idfac", $idfac);
                $idpernov = $this->getIdpernov();
                $result->bindParam(":idpernov", $idpernov);
                $fnov = $this->getFnov();
                $result->bindParam(":fnov", $fnov);
                $obsnov = $this->getObsnov();
                $result->bindParam(":obsnov", $obsnov);
                $result->execute();
        }

        function egreso(){
                $sql = "UPDATE factura SET numegr=:numegr WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idfac = $this->getIdfac();
                $result->bindParam(":idfac", $idfac);
                $numegr = $this->getNumegr();
                $result->bindParam(":numegr", $numegr);
                $result->execute();
        }

        function bodega(){
                $sql = "UPDATE factura SET numbod=:numbod WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idfac = $this->getIdfac();
                $result->bindParam(":idfac", $idfac);
                $numbod = $this->getNumbod();
                $result->bindParam(":numbod", $numbod);
                $result->execute();
        }

        function valneto(){
            $sql = "UPDATE factura SET vneto=:vneto WHERE idfac=:idfac";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idfac = $this->getIdfac();
            $result->bindParam(":idfac", $idfac);
            $vneto = $this->getVneto();
            $result->bindParam(":vneto", $vneto);
            $result->execute();
    }


        function editAct() {
            $estfac = $this->getEstfac();
            $sql = "UPDATE factura SET estfac=:estfac";
            
            // Añadir las columnas y parámetros correspondientes según el valor de $estfac
            if ($estfac == 49) {$sql .= ", idperrev=:idper, fprfac=:fecha";
            } elseif ($estfac == 50) {$sql .= ", idperapr=:idper, faprfac=:fecha";
            } elseif ($estfac == 51) {$sql .= ", idperent=:idper, fffac=:fecha";
            } elseif ($estfac == 52) {$sql .= ", idperpag=:idper, fpagfac=:fecha";
            } else {
                // Manejar el caso en que $estfac no es uno de los valores esperados
                throw new Exception("Valor de estfac no válido: " . $estfac); 
            }
            $sql .= " WHERE idfac=:idfac";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            
            // Binding de los parámetros
            $idfac = $this->getIdfac();
            $result->bindParam(":idfac", $idfac);
            $result->bindParam(":estfac", $estfac); 
            // Agregar el binding de los parámetros adicionales según el valor de $estfac
            if ($estfac == 49 || $estfac == 50 || $estfac == 51 || $estfac == 52) {
                $idper = $this->getIdper();
                $fecha = $this->getFecha();
                $result->bindParam(":idper", $idper);
                $result->bindParam(":fecha", $fecha);
            } 
            $result->execute();
        }




        function edit(){
            //try {
                $sql = "UPDATE factura  SET nofac=:nofac, confac=:confac, estfac=:estfac, idemp=:idemp, fefac=:fefac, fvfac=:fvfac, forpag=:forpag, tipfac=:tipfac";
                if($this->getRutpdf()) $sql .= ", rutpdf=:rutpdf";
                if($this->getRutspt()) $sql .= ", rutspt=:rutspt";
                $sql .= " WHERE idfac=:idfac";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idfac = $this->getIdfac();
                $result->bindParam(":idfac", $idfac);
                $nofac = $this->getNofac();
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
                if($this->getRutpdf()){
                    $rutpdf = $this->getRutpdf();
                    $result->bindParam(":rutpdf", $rutpdf);
                }if($this->getRutspt()){
                    $rutspt = $this->getRutspt();
                    $result->bindParam(":rutspt", $rutspt);
                }
                $result->execute();
            // } catch (Exception $e) {
            //     ManejoError($e);
            // }
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

        function getAllEmp(){
            $sql = "SELECT idemp, nitemp, razsoem FROM provedores WHERE actemp=1";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function getOneEmp($idemp){
            $sql = "SELECT e.idemp, e.nitemp, e.razsoem FROM provedores AS e INNER JOIN factura AS f ON e.idemp=f.idemp WHERE f.idemp=:idemp";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":idemp", $idemp);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
        
        function editEst()
    {
        try {
            $fffac = $this->getFffac();
            $sql = "UPDATE factura SET estfac=:estfac";
            if($fffac) $sql .= ", fffac=:fffac"; 
            $sql .= " WHERE idfac=:idfac";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $estfac = $this->getEstfac();
            $result->bindParam(":estfac", $estfac);
            if($fffac) $result->bindParam(":fffac", $fffac);
            $idfac = $this->getIdfac();
            $result->bindParam(":idfac", $idfac);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

    function CompEmp(){
		$sql = "SELECT idemp, COUNT(*) AS sum FROM provedores WHERE nitemp=:nitemp";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $nitemp = $this->getNitemp();
        $result->bindParam(":nitemp", $nitemp);
		$result->execute();
		$res = $result->fetchAll(PDO::FETCH_ASSOC);
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
        $sql = "SELECT idper, COUNT(*) AS sum FROM persona WHERE idper=:idper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper=$this->getIdper();
        $result->bindParam(":idper",$idper);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function selectFac(){ //Con esta funcion se comprueba si la factura ya existe, se comparan datos que pueden ser "unicos" o que es dificil que se repitan
        $sql = "SELECT idfac, COUNT(*) AS sum FROM factura WHERE nofac=:nofac AND fefac=:fefac AND fvfac=:fvfac";
        // creo yo que esos valores es un poco difícil que se repitan en 2 facturas
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofac=$this->getNofac();
        $result->bindParam(":nofac",$nofac);
        $fefac=$this->getFefac();
        $result->bindParam(":fefac",$fefac);
        $fvfac=$this->getFvfac();
        $result->bindParam(":fvfac",$fvfac);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
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


    }


?>