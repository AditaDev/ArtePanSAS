
<?php
    require_once ("models/seguridad.php");
    require_once ('models/conexion.php');
    require_once ('models/mdot.php');
    require_once ('models/mprm.php');

    $mprm = new Mprm();
    $mdot = new Mdot();

    // Obtener parámetros de la solicitud
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
    $arc = isset($_REQUEST['arc']) ? $_REQUEST['arc'] : NULL;
    $pg = isset($_REQUEST['pg']) ? $_REQUEST['pg'] : NULL; // Identificar la página

    if ($pg == 111) {
        $mdot->setIdent($id); // Usar el modelo mdot
        if ($arc) {
            $dt = $mdot->getPdf(); // Supongo que existe un método getPdf() en Mdot
            $rut = $dt[0]['rut'];
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($rut) . '"');
            readfile($rut);
        }
    }if ($pg == 112) {
        $mprm->setIdprm($id); // Usar el modelo mprm
        if ($arc) {
            $dt = $mprm->getPdf($arc);
            $rut = $dt[0]['rut'];
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($rut) . '"');
            readfile($rut);
        }
    }
?>
