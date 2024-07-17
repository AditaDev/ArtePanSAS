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
$datAll = $malm->getAll();

$malm->setIdalm($idalm);

//ay problema de que no la ponga? que cosa? la fecha en save, nopi mi amor jummmm jajajaja te amo mucho, te amo mucho mas no me has contado el chisme no me amas jajajajjaja ahorita que slagamos te cuento, amor salganmos ya  y ya venimos , bueno chiqui jajajaj se me olvido escribir, es quer estaba mirando si se podia solucionar el editar rapido jajaj, amor pero no se que puede ser 
// perdon perdon jajaja ya se que ese, creo que amor? es que de lo poco que se se supone que esta bien jsjsj, estara pegado? el error va a ser de sintaxis porque en la viista sale eso >" 
if ($ope == "save") {
    $malm->setPpalm($ppalm);
    $malm->setSpalm($spalm);
    $malm->setJgalm($jgalm);
    $malm->setFecalm($fecalm);
    if(!$idalm) $malm->save();
    else $malm->edit();
    echo "<script>window.location='home.php?pg=".$pg."';</script>";
}
if ($ope == "edi" && $idalm) $datOne = $malm->getOne();
if ($ope == "eli" && $idalm) $malm->del();

?>