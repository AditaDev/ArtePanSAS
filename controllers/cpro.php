<?php
require_once("models/mpro.php");

$mpro = new Mpro();

$idpro = isset($_REQUEST['idpro']) ? $_REQUEST['idpro'] : NULL;
$nompro = isset($_POST['nompro']) ? $_POST['nompro'] : NULL;
$iddom = isset($_REQUEST['iddom']) ? $_REQUEST['iddom']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;
// $pg = ;

$datOne = NULL;
$mpro->setIdpro($idpro);


if ($ope == "save") {
    $mpro->setNompro($nompro);
    $mdom->setIddom($iddom);
    if (!$nompro) $mpro->save();
    else $mpro->edit();
}

if ($ope == "edi" && $idpro) $datOne = $mpro->getOne();
if ($ope == "eli" && $idpro) $mpro->del();

$datAll = $mpro->getAll();
?>