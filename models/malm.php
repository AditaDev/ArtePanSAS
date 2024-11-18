<?php
class Malm
{
//--------Almuerzo-------
    private $idalm;
    private $fecalm;
    private $ppalm;
    private $spalm;
    private $jgalm;
    private $vfac;

//--------Pedido-------
    private $idped;
    private $idper;
    private $fecped;
    private $canalm;
    private $tipalm;
    private $obser;

//------------------------------GET---------------------------//

//--------Almuerzo-------
    public function getIdalm(){
        return $this->idalm;
    }
    public function getFecalm(){
        return $this->fecalm;
    }
    public function getPpalm(){
        return $this->ppalm;
    }
    public function getSpalm(){
        return $this->spalm;
    }
    public function getJgalm(){
        return $this->jgalm;
    }
    public function getVfac(){
        return $this->vfac;
    }

//--------Pedido-------
    public function getIdped(){
        return $this->idped;
    }
    public function getIdper(){
        return $this->idper;
    }
    public function getfecped(){
        return $this->fecped;
    }
    public function getCanalm(){
        return $this->canalm;
    }  
    public function getTipalm(){
        return $this->tipalm;
    }  
    public function getObser(){
        return $this->obser;
    }
//-------------------------------SET---------------------------//

//--------Almuerzo-------
    public function setIdalm($idalm){
        $this->idalm = $idalm;
    }
    public function setFecalm($fecalm){
        $this->fecalm = $fecalm;
    }
    public function setPpalm($ppalm){
        $this->ppalm = $ppalm;
    }
    public function setSpalm($spalm){
        $this->spalm = $spalm;
    }
    public function setJgalm($jgalm){
        $this->jgalm = $jgalm;
    }
    public function setVfac($vfac){
        $this->vfac = $vfac;
    }

//--------Pedido-------
    public function setIdped($idped){
        $this->idped=$idped;
    }
    public function setIdper($idper){
        $this->idper=$idper;
    }
    public function setFecped($fecped){
        $this->fecped=$fecped;
    }
    public function setCanalm($canalm){
        $this->canalm=$canalm;
    }
    public function setTipalm($tipalm){
        $this->tipalm=$tipalm;
    }
    public function setObser($obser){
        $this->obser=$obser;
    }

//--------Almuerzo-------
    function getAll(){ 
        $sql = "SELECT idalm, fecalm, ppalm, spalm, jgalm, vfac FROM almuerzo";
        // $sql = "SELECT a.idalm, a.fecalm, a.ppalm, a.spalm, a.jgalm, p.idalm, p.idped FROM almuerzo AS a INNER JOIN pedido AS p ON a.idalm=p.idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res; 
    }

    function getOne(){
        $sql = "SELECT idalm, fecalm, ppalm, spalm, jgalm, vfac FROM almuerzo WHERE idalm=:idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    function save(){
        //try {
            $sql = "INSERT INTO almuerzo (fecalm, ppalm, spalm, jgalm) VALUES (:fecalm, :ppalm, :spalm, :jgalm)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $ppalm = $this->getPpalm();
            $result->bindParam(":ppalm", $ppalm);
            $spalm = $this->getSpalm();
            $result->bindParam(":spalm", $spalm);
            $jgalm = $this->getJgalm();
            $result->bindParam(":jgalm", $jgalm);
            $fecalm = $this->getFecalm();
            $result->bindParam(":fecalm", $fecalm); 
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function valfac(){
        $sql = "UPDATE almuerzo SET vfac=:vfac WHERE idalm=:idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $vfac = $this->getVfac();
        $result->bindParam(":vfac", $vfac);
        $result->execute();
}

    function edit(){
        $sql = "UPDATE almuerzo SET ppalm=:ppalm, spalm=:spalm, jgalm=:jgalm";
            $sql .= " WHERE idalm=:idalm";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idalm = $this->getIdalm();
        $result->bindParam(":idalm", $idalm);
        $ppalm = $this->getPpalm();
        $result->bindParam(":ppalm", $ppalm);
        $spalm = $this->getSpalm();
        $result->bindParam(":spalm", $spalm);
        $jgalm = $this->getJgalm();
        $result->bindParam(":jgalm", $jgalm);
        $result->execute();
    }

    function del(){
        try {
            $sql = "DELETE FROM almuerzo WHERE idalm=:idalm";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idalm = $this->getIdalm();
            $result->bindParam(":idalm", $idalm);
            $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

//--------Pedido-------


    function getInfoAll(){ 
        $sql = "SELECT p.idped, l.idper, p.idalm, p.fecped, CONCAT(l.nomper,' ',l.apeper) AS nomper FROM pedido AS p INNER JOIN persona AS l ON p.idper=l.idper WHERE l.idper=:idper";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper= $_SESSION['idper'];
        $result->bindParam(":idper", $idper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res; 
    }

    //Info pedidos dia actual
    function getAllPed(){ 
        $sql = "SELECT idped, idalm, fecped FROM pedido WHERE DATE(fecped) >= DATE(NOW())";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res; 
    }

    //Almuerzo dia actual
    function getOneAlmF(){
            $sql = "SELECT idalm, ppalm, spalm, jgalm, fecalm FROM almuerzo WHERE DATE(fecalm) >= DATE(NOW())";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res; 
        }   
    
    //Info almuerzos con personas
    function getAllDatPed(){
            $sql = "SELECT p.idped, a.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm, p.fecped, p.idper, p.canalm, p.tipalm, p.obser, CONCAT(l.nomper,' ',l.apeper) AS nomper, l.ndper FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm INNER JOIN persona AS l ON p.idper=l.idper WHERE p.idalm=:idalm";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idalm= $this->getIdalm();
            $result->bindParam(":idalm", $idalm);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
    
    //Hizo pedido
     function getOnePed(){
            $sql = "SELECT p.canalm, p.idped FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm WHERE DATE(p.fecped) = DATE(NOW()) AND p.idper=:idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper= $_SESSION['idper'];
            $result->bindParam(":idper", $idper);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
    
    //Pedidos con fechas por persona 
    function infoPed(){
        $sql = "SELECT p.idped, a.idalm, a.ppalm, a.spalm, a.jgalm, a.fecalm, p.fecped, p.idper, p.canalm, p.tipalm, p.obser, CONCAT(l.nomper,' ',l.apeper) AS nomper, l.ndper FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm=a.idalm INNER JOIN persona AS l ON p.idper=l.idper WHERE p.idper=:idper ORDER BY p.fecped";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper", $idper);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
        }
    
    function savePed(){
        //try{
            $sql = "INSERT INTO pedido (fecped, idper, idalm, canalm, tipalm, obser) VALUES (:fecped, :idper, :idalm, :canalm, :tipalm, :obser)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $fecped = $this->getfecped();
            $result->bindParam(":fecped",$fecped);
            $idper = $this->getIdper();
            $result->bindParam(":idper",$idper);
            $idalm = $this->getIdalm();
            $result->bindParam(":idalm",$idalm);
            $canalm = $this->getCanalm();
            $result->bindParam(":canalm",$canalm);
            $tipalm = $this->gettipalm();
            $result->bindParam(":tipalm",$tipalm);
            $obser = $this->getObser();
            $result->bindParam(":obser",$obser);
            $result->execute();
    //     }catch(Exception $e){
    //         ManejoError($e);
    //     }
        }

    function delped(){
        //try {
            $sql = "DELETE FROM pedido WHERE idped=:idped";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idped = $this->getIdped();
            $result->bindParam(":idped", $idped);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
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
    
    //Consultas para excel

    //fechas de todos los almuerzos
    function totalfec(){
        $sql = "SELECT DISTINCT fecalm FROM almuerzo ORDER BY fecalm";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
    }
    //total de personas que han hecho pedido
    function totalper(){
        $sql = "SELECT p.idper, CONCAT(l.nomper, ' ', l.apeper) AS nomper, l.ndper FROM pedido AS p INNER JOIN persona AS l ON p.idper = l.idper GROUP BY p.idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
    }
    //total pedidos x persona y fecha 
    function pedxper($fecha){
        $sql = "SELECT p.idper, CONCAT(l.nomper, ' ', l.apeper) AS nomper, l.ndper, MAX(CASE WHEN a.fecalm = :fec THEN p.canalm ELSE 'NO' END) AS fecha FROM almuerzo AS a INNER JOIN pedido AS p ON a.idalm = p.idalm INNER JOIN persona AS l ON p.idper = l.idper GROUP BY p.idper, l.nomper, l.apeper, l.ndper ORDER BY l.apeper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(":fec", $fecha);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
    }
    function modper(){
    $sql = "SELECT p.idped, a.idalm, p.fecped, p.idper, p.canalm, p.tipalm, p.obser, CONCAT(l.nomper, ' ', l.apeper) AS nomper, l.ndper FROM pedido AS p INNER JOIN almuerzo AS a ON p.idalm = a.idalm INNER JOIN persona AS l ON p.idper = l.idper WHERE p.idper=:idper";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam(":idper", $idper);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return $res;
            }
}
?>
    