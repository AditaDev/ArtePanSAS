<?php
    require_once("models/mdot.php");
    // require ('vendor/autoload.php');

    $mdot = new Mdot();

    // use PhpOffice\PhpSpreadsheet\IOFactory;

    //------------Asignar-----------
    $ident = isset($_POST['ident']) ? $_POST['ident']:NULL;
    $idperent = isset($_POST['idperent']) ? $_POST['idperent']:NULL;
    $idperrec = isset($_POST['idperrec']) ? $_POST['idperrec']:NULL;
    $fecent = isset($_POST['fecent']) ? $_POST['fecent']:NULL;
    $observ = isset($_POST['observ']) ? $_POST['observ']:NULL;
    $idperentd = isset($_POST['idperentd']) ? $_POST['idperentd']:NULL;
    $idperrecd = isset($_POST['idperrecd']) ? $_POST['idperrecd']:$_SESSION['idper'];
    $fecdev = isset($_POST['fecdev']) ? $_POST['fecdev']:NULL;
    $observd = isset($_POST['observd']) ? $_POST['observd']:NULL;
    $estent = isset($_POST['estent']) ? $_POST['estent']:1;
    $firpent = isset($_FILES['firpent']) ? $_FILES['firpent']:NULL;
    $firprec = isset($_FILES['firprec']) ? $_FILES['firprec']:NULL;
   
    $firma = NULL;

    
    //------------Elementos-----------
    $idvdot = isset($_POST['idvdot']) ? $_POST['idvdot']:NULL;
    $idvtal = isset($_POST['idvtal']) ? $_POST['idvtal']:NULL;
    
    //------------ColorxCamisa-----------
    $idvdia = isset($_POST['idvdia']) ? $_POST['idvdia']:NULL;
    $idvcol = isset($_POST['idvcol']) ? $_POST['idvcol']:NULL;

    // $arc = isset($_FILES["arc"]["name"]) ? $_FILES["arc"]["name"] : NULL;
    // $arc = substr($arc, 0, strpos($arc, ".xls"));
    
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
    
    $datOne = NULL;
    $datTxD = NULL;
    $datCxD = NULL;
 
    $pg = 111;
    
    $mdot->setIdEnt($ident);
    var_dump($idvcol, $idvdia);
    //------------Asignar-----------
    if($ope=="save"){   
        $mdot->setIdperent($idperent);
        $mdot->setIdperrec($idperrec);
        $mdot->setFecent($fecent);
        $mdot->setObserv($observ);
        $mdot->setEstent($estent);    
        $mdot->setDifent($nmfl);    
        if(!$ident){
            $mdot->save();
            $id = $mdot->getOneAsg($nmfl);
            $ident = $id[0]['ident'];
        }
    
        if($ident) $mdot->delExD();
        if($ident) $mdot->delCxc();
        if($idvdot && $ident){ foreach($idvdot AS $index=>$ida){
            $mdot->setIdent($ident);
            $mdot->setIdvdot($ida);
            $mdot->setIdvtal($idvtal[$index]);
            $mdot->saveExD();
        }}
        if($idvdia && $ident){ foreach($idvdia AS $ind=>$id){ 
            $mdot->setIdent($ident);
            $mdot->setIdvdia($id);
            $mdot->setIdvcol($idvcol[$ind]);
            $mdot->saveCxc();
        }}
    
        // echo "<script>window.location='home.php?pg=".$pg."';</script>";

    }

    if($ope=="dev" && $ident){
        $mdot->setIdperentd($idperentd);
        $mdot->setIdperrecd($idperrecd);
        $mdot->setFecdev($fecdev);
        $mdot->setObservd($observd);
        $mdot->setEstent($estent);
        $mdot->dev();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    // if($ope=="edi" && $ideqxpr) {
    //     $datOneA = $masg->getOne();
    //     $datAxE = $masg->getAllAxE($ideqxpr);
    // }
    
    //------------Traer valores-----------

    $datAllD = $mdot->getAllD();
    $datPer = $mdot->getAllPer($ope);
    $datDot = $mdot->getAllDom(7);
    $datTalS = $mdot->getAllDom(8); 
    $datTalP = $mdot->getAllDom(9); 
    $datTalZ = $mdot->getAllDom(10);
    $datTalG = $mdot->getAllDom(11);
    $datCol = $mdot->getAllDom(12);
    $datDia = $mdot->getAllDom(13);
   
?>