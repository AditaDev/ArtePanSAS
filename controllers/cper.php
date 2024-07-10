<?php
    require_once("models/mper.php");

    $mper = new Mper();

    //------------Persona-----------
    $idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
    $nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
    $apeper = isset($_POST['apeper']) ? $_POST['apeper']:NULL;
    $ndper = isset($_POST['ndper']) ? $_POST['ndper']:NULL;
    $area = isset($_POST['area']) ? $_POST['area']:NULL;
    $emaper = isset($_POST['emaper']) ? strtolower($_POST['emaper']):NULL;
    $actper = isset($_REQUEST['actper']) ? $_REQUEST['actper']:1;

    $pasper = strtoupper(substr($nomper, 0, 1)).strtolower(substr($apeper, 0, 1)).$ndper;
    
    //------------Perfil-----------
    $idpef = isset($_POST['idpef']) ? $_POST['idpef']:3;
    $datOne = NULL;

    //------------Persona-----------
    if($ope=="save"){
        $mper->setNomper($nomper);
        $mper->setApeper($apeper);
        $mper->setEmaper($emaper);
        $mper->setNdper($ndper);
        $mper->setArea($area);
        $mper->setActper($actper);
        $mper->setPasper($pasper);
        if(!$idper) {
            $mper->save();
            $per = $mper->getOneSPxF($ndper); 
            $mper->savePxFAut($per[0]['idper'],$idpef);
        }
        else{
            $mper->save();
            if($idper == $_SESSION["idper"]){
                $_SESSION['nomper'] = $nomper;
                $_SESSION['apeper'] = $apeper;
                $_SESSION['emaper'] = $emaper;
                $_SESSION['ndper'] = $ndper;
            };
        } 
    }

    if($ope=="act" && $idper && $actper){
        $mper->setActper($actper);
        $mper->editAct();
    }

    if($ope=="eli"&& $idper) $mper->del();
    if($ope=="edi"&& $idper) $datOne=$mper->edit();

    //------------Perfil-----------
    if($ope=="savepxf"){
        if($idper) $mper->delPxF();
        if($idpef){ foreach ($idpef as $pf) {
            if($pf){
                $mper->setIdpef($pf);
                $mper->savePxF();
            }
        }}
    }
     //------------Traer valores-----------
    $datAll = $mper->getAll();
    $idmod = $mper->getAllMod();
    $datarea = $mper->getAllDom(5);
?>
