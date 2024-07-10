<?php
require_once("models/mpro.php");
include('models/mdom.php');

$mpro = new Mpro();
$mdom = new Mdom();

$idpro = isset($_REQUEST['idpro']) ? $_REQUEST['idpro'] : NULL;
$nompro = isset($_POST['nompro']) ? $_POST['nompro'] : NULL;
$iddom = isset($_REQUEST['iddom']) ? $_REQUEST['iddom']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;
// $pg = ;

$datOne = NULL;
$datAll = NULL;

$mpro->setIdpro($idpro);


if ($ope == "save") {
    $mpro->setNompro($nompro);
    $mpro->setIdval($idval);
    if (!$idpro) $mpro->save();
    else $mpro->edit();
}

if ($ope == "edi" && $idpro) $datOne = $mpro->getOne();
if ($ope == "eli" && $idpro) $mpro->del();

$datAll = $mpro->getAll();
$datDom = $mdom-> getALL();

$obtOne= $mpro->getOne();
?>