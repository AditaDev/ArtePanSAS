<?php
require_once 'models/malm.php';

$malm = new Malm();

$idalm = isset($_REQUEST['idalm']) ? $_REQUEST['idalm'] : NULL;
$ppalm = isset($_POST['ppalm']) ? $_POST['ppalm'] : NULL;
$spalm = isset($_REQUEST['spalm']) ? $_REQUEST['spalm'] : NULL;
$jgalm = isset($_REQUEST['jgalm']) ? $_REQUEST['jgalm'] : NULL;
$fecalm = date("Y-m-d H:i:s");
$idper = isset($_REQUEST['idper']) ? $_REQUEST['idper'] : NULL;

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;
$pg = 61;

$datOne = NULL;

$malm->setIdalm($idalm);


if ($ope == "save") {
    $malm->setPpalm($ppalm);
    if (!$ppalm) $malm->save();
    else $malm->edit();
}

if ($ope == "edi" && $idalm) $datOne = $malm->getOne();
if ($ope == "eli" && $idalm) $malm->del();

$datAll = $malm->getAll();
?>