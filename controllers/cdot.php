<?php
    require_once("models/mdot.php");
    require ('vendor/autoload.php');

    $mdot = new Mdot();

    use PhpOffice\PhpSpreadsheet\IOFactory;

    //------------Asignar-----------
    // $ideqxpr = isset($_REQUEST['ideqxpr']) ? $_REQUEST['ideqxpr']:NULL;
    $ident = isset($_POST['ident']) ? $_POST['ident']:NULL;
    $idperent = isset($_POST['idperent']) ? $_POST['idperent']:NULL;
    $idperrec = isset($_POST['idperrec']) ? $_POST['idperrec']:NULL;
    $fecent = isset($_POST['fecent']) ? $_POST['fecent']:NULL;
    $observ = isset($_POST['observ']) ? $_POST['observ']:NULL;
    $fecdev = isset($_POST['fecdev']) ? $_POST['fecdev']:NULL;
    $observd = isset($_POST['observd']) ? $_POST['observd']:NULL;
    $firpent = isset($_FILES['firpent']) ? $_FILES['firpent']:NULL;
    $firprec = isset($_FILES['firprec']) ? $_FILES['firprec']:NULL;
   
    $firma = NULL;

    
    //------------Accesorios-----------
    // $idvacc = isset($_POST['idvacc']) ? $_POST['idvacc']:NULL;
    
    // $arc = isset($_FILES["arc"]["name"]) ? $_FILES["arc"]["name"] : NULL;
    // $arc = substr($arc, 0, strpos($arc, ".xls"));
    
    // $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
    // $asg = isset($_REQUEST['asg']) ? $_REQUEST['asg']:"equ";
    
    $datOneA = NULL;
    // $datAxE = NULL;
    // $pg = 51;
    
    // $masg->setIdeqxpr($ideqxpr);
    // //------------Asignar-----------
    // if($ope=="save"){   
    //     $masg->setIdequ($idequ);
    //     $masg->setIdperent($idperent);
    //     $masg->setIdperrec($idperrec);
    //     $masg->setFecent($fecent);
    //     $masg->setObserv($observ);
    //     $masg->setNumcel($numcel);
    //     $masg->setOpecel($opecel);
    //     $masg->setEstexp($estexp);    
    //     $masg->setDifasg($nmfl);    
    //     if(!$ideqxpr){
    //         $masg->save($asg);
    //         $id = $masg->getOneAsg($nmfl);
    //         $ideqxpr = $id[0]['ideqxpr'];
    //         $mequ->setIdequ($idequ);
    //         $mequ->setActequ(2);
    //         $mequ->editAct();
    //     }
    //     else $masg->edit();
    //     if($ideqxpr) $masg->delAxE();
    //     if($idvacc && $ideqxpr){ foreach($idvacc AS $ida){
    //         $masg->setIdeqxpr($ideqxpr);
    //         $masg->setIdvacc($ida);
    //         $masg->saveAxE();
    //     }}
    //     echo "<script>window.location='home.php?pg=".$pg."&asg=".$asg."';</script>";
    // }

    // if($ope=="dev" && $ideqxpr && $idequ){
    //     $masg->setIdperentd($idperentd);
    //     $masg->setIdperrecd($idperrecd);
    //     $masg->setFecdev($fecdev);
    //     $masg->setObservd($observd);
    //     $masg->setEstexp($estexp);
    //     $masg->dev();
    //     $mequ->setIdequ($idequ);
    //     $mequ->setActequ(1);
    //     $mequ->editAct();
    //     echo "<script>window.location='home.php?pg=".$pg."&asg=".$asg."';</script>";
    // }

    // if($ope=="edi" && $ideqxpr) {
    //     $datOneA = $masg->getOne();
    //     $datAxE = $masg->getAllAxE($ideqxpr);
    // }
    
    //------------Traer valores-----------

    $dat = $masg->getAllOpe(9);
    $datPer = $mdot->getAllPer($ope);
    $datPer = $masg->getAllPer($ope);
    
    // if($asg=="equ"){
    //     $datAllA = $masg->getAllAsig(52);
    //     $datEqu = $masg->getAllEquDis(52, $ope);
    //     $datAcc = $masg->getAllAcc(3);
    // }else if($asg=="cel"){
    //     $datAllA = $masg->getAllAsig(54);
    //     $datEqu = $masg->getAllEquDis(54, $ope);
    //     $datAcc = $masg->getAllAcc(5);
    // }

   
?>