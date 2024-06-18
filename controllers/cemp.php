<?php
require_once("models/memp.php");

    $memp = new Memp();

    date_default_timezone_set('America/Bogota');
    $fecha = date("Y-m-d H:i:s");

    $idemp = isset($_REQUEST['idemp']) ? $_REQUEST['idemp'] : NULL;
    $nitemp = isset($_POST['nitemp']) ? $_POST['nitemp'] : NULL;
    $razsoem = isset($_POST['razsoem']) ? $_POST['razsoem'] : NULL;
    $actemp = isset($_REQUEST['actemp']) ? $_REQUEST['actemp'] : 1;

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

    $pg = 109;
    $datOne = NULL;
    $datALL = $memp->getAll();

    $memp->setIdemp($idemp);
    if ($ope == "save") {
        $memp->setNitemp($nitemp);
        $memp->setRazsoem($razsoem);
          
    $memp->setActemp($actemp);
    if (!$idemp) $memp->save();
    else $memp->edit();
}

if ($ope == "act" && $idemp && $actemp) {
    $memp->setActemp($actemp);
    $memp->editActEmp();
}
if ($ope == "eli" && $idemp) $memp->del();
if ($ope == "edi" && $idemp) $datOne = $memp->getOne();


$datAll = $memp->getAll();

    $memp->setIdemp($idemp);
 
 
    







