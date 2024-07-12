<?php
require_once 'models/malm.php';

$malm = new Malm();

$idalm = isset($_REQUEST['idalm']) ? $_REQUEST['idalm'] : NULL;
$idpro = isset($_REQUEST['idpro']) ? $_REQUEST['idpro'] : NULL;
$fecalm = date("Y-m-d H:i:s");

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

$datOne = NULL;
$datAll = $malm->getAll();
$datProSop = $malm->getAllPro(25);
$datProPf = $malm->getAllPro(26);
$datProJg = $malm->getAllPro(27);

$malm->setIdalm($idalm);
// $datDom = $mdom-> getALL();


// if ($ope == "save") {
//     $malm->setPpalm($ppalm);
//     if (!$ppalm) $malm->save();
//     else $malm->edit();
// }

if($ope=="savepxa"){
    if($idper) $mper->delPxF();
    if($idpef){ foreach ($idpef as $pf) {
        if($pf){
            $mper->setIdpef($pf);
            $mper->savePxF();
        }
    }}
}

if ($ope == "edi" && $idalm) $datOne = $malm->getOne();
if ($ope == "eli" && $idalm) $malm->del();

?>