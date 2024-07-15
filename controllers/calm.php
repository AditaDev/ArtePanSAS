<?php
require_once 'models/malm.php';

$malm = new Malm();

$idalm = isset($_REQUEST['idalm']) ? $_REQUEST['idalm'] : NULL;
$ppalm = isset($_POST['ppalm']) ? $_POST['ppalm'] : NULL;
$spalm = isset($_POST['spalm']) ? $_POST['spalm'] : NULL;
$jgalm = isset($_POST['jgalm']) ? $_POST['jgalm'] : NULL;
$fecalm = date("Y-m-d H:i:s");

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

$datOne = NULL;
$datAll = NULL;
$datAll = $malm->getAll();

$malm->setIdalm($idalm);


if ($ope == "save") {
    $malm->setPpalm($ppalm);
    $malm->setSpalm($spalm);
    $malm->setJgalm($jgalm);
    $malm->setFecalm($fecalm);
    if(!$idalm) $malm->save();
    else $malm->edit();
}
if ($ope == "edi" && $idalm) $datOne = $malm->getOne();
if ($ope == "eli" && $idalm) $malm->del();

?>