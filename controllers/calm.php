<?php
require_once 'models/malm.php';

$malm = new Malm();


//--------Almuerzo-------
$idalm = isset($_REQUEST['idalm']) ? $_REQUEST['idalm'] : NULL;
$ppalm = isset($_POST['ppalm']) ? $_POST['ppalm'] : NULL;
$spalm = isset($_POST['spalm']) ? $_POST['spalm'] : NULL;
$jgalm = isset($_POST['jgalm']) ? $_POST['jgalm'] : NULL;
$fecalm = date("Y-m-d H:i:s");

//--------Pedido-------
$idped = isset($_REQUEST['idped']) ? $_REQUEST['idped'] :NULL;
$canalm = isset($_POST['canalm']) ? $_POST['canalm']:1;
$tipalm = isset($_POST['tipalm']) ? $_POST['tipalm']:1;
$fecped = date("Y-m-d H:i:s");

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;


$datOne = NULL;

$malm->setIdalm($idalm);
$malm->setIdped($idped);

$datPed = $malm->getOnePed();

if ($ope == "eli" && $idped){ 
    $malm->delped();
echo "<script>window.location='home.php?pg=".$pg."';</script>";
}

if ($ope == "save") {
    $malm->setPpalm($ppalm);
    $malm->setSpalm($spalm);
    $malm->setJgalm($jgalm);
    $malm->setFecalm($fecalm);
    if(!$idalm) $malm->save();
    else $malm->edit();
    echo "<script>window.location='home.php?pg=".$pg."';</script>";
}


if($ope=="savePed"){
    $malm->setIdalm($idalm);
    $malm->setFecped($fecped);
    $malm->setCanalm($canalm);
    $malm->setTipalm($tipalm);
    $malm->setIdper($_SESSION['idper']);
    $malm->savePed(); 
    echo "<script>alert('Has pedido ".$canalm." almuerzo(s) exitosamente!!!');window.location='home.php?pg=".$pg."';</script>";
}

if ($ope == "edi" && $idalm) $datOne = $malm->getOne($idalm);
if ($ope == "eli" && $idalm) $malm->del();

$datAll = $malm->getAll();
$datOneAlmF = $malm->getOneAlmF();

$datAllPed = $malm->getOnePed();

?>