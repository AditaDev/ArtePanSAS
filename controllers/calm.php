<?php
require_once 'models/malm.php';

$malm = new Malm();

$idalm = isset($_REQUEST['idalm']) ? $_REQUEST['idalm'] : NULL;
$iddom = isset($_REQUEST['iddom']) ? $_REQUEST['iddom'] : NULL;
$fecalm = date("Y-m-d H:i:s");

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

$datOne = NULL;
$datAll = $malm->getAll();

$malm->setIdalm($idalm);
// $datDom = $mdom-> getALL();


// if ($ope == "save") {
//     $malm->setPpalm($ppalm);
//     if (!$ppalm) $malm->save();
//     else $malm->edit();
// }

if ($ope == "edi" && $idalm) $datOne = $malm->getOne();
if ($ope == "eli" && $idalm) $malm->del();

?>