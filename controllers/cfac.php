<?php
    require_once("models/mfac.php");
    require ('vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\IOFactory;

    $mfac = new Mfac();

    //------------Factura-----------
    $fecact = date("Y-m-d H:i:s"); // fecha actual
    $idfac = isset($_REQUEST['idfac']) ? $_REQUEST['idfac']:NULL;
    $nofac = isset($_POST['nofac']) ? $_POST['nofac']:NULL;
    $confac = isset($_POST['confac']) ? $_POST['confac']:NULL;
    $estfac = isset($_REQUEST['estfac']) ? $_REQUEST['estfac']:48;
    $idemp = isset($_POST['idemp']) ? $_POST['idemp']:NULL;
    $fefac = isset($_POST['fefac']) ? $_POST['fefac']:NULL; // fecha emision
    $fvfac = isset($_POST['fvfac']) ? $_POST['fvfac']:NULL; // fecha vencimiento
    $forpag = isset($_POST['forpag']) ? $_POST['forpag']:NULL;
    $tipfac = isset($_REQUEST['tipfac']) ? $_REQUEST['tipfac']:NULL;
    $arcpdf = isset($_FILES['arcpdf']) ? $_FILES['arcpdf']:NULL;
    $arcspt = isset($_FILES['arcspt']) ? $_FILES['arcspt']:NULL;
    $idpernov = isset($_POST['idpernov']) ? $_POST['idpernov']:$_SESSION['idper'];
    $numegr = isset($_POST['numegr']) ? $_POST['numegr']:NULL;
    $numbod = isset($_POST['numbod']) ? $_POST['numbod']:NULL;
    $fnov = isset($_POST['fnov']) ? $_POST['fnov']:NULL;
    $obsnov = isset($_POST['obsnov']) ? $_POST['obsnov']:NULL;
    $rutpdf = NULL;
    $rutspt = NULL;


    $arc = isset($_FILES["arc"]["name"]) ? $_FILES["arc"]["name"] : NULL;
    $arc = substr($arc, 0, strpos($arc, ".xls"));

    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $datOne = NULL;
    $datALL = NULL;
    $dattpe = $mfac->getAllDom(1);
    $dattip = $mfac->getAllDom(2);
    $datbod = $mfac->getAllDom(14);

    $mfac->setIdfac($idfac);

    if($idemp) $infoemp = $mfac->getOneEmp($idemp);
    if($arcpdf && $infoemp && $infoemp[0]['razsoem']) $rutpdf = opti($arcpdf, $nofac."_".$confac, "arc/facturas/".$infoemp[0]['razsoem'], $nmfl); 
    // var_dump($rut, $rutpdf);

    if($arcspt && $infoemp && $infoemp[0]['razsoem']) $rutspt = opti($arcspt, $nofac."_".$confac, "arc/soportes/".$infoemp[0]['razsoem'], $nmfl); 
        

    //------------Factura-----------
    if($ope=="save"){
        $mfac->setNofac($nofac);
        $mfac->setFifac($fecact);
        $mfac->setConfac($confac);
        $mfac->setEstfac($estfac);
        $mfac->setIdemp($idemp);
        $mfac->setFefac($fefac);
        $mfac->setFvfac($fvfac);
        $mfac->setTipfac($tipfac);
        $mfac->setForpag($forpag);
        $mfac->setRutpdf($rutpdf);
        $mfac->setRutspt($rutspt);
        $mfac->setIdpercre($_SESSION['idper']); 
        if(!$idfac) $mfac->save();
        else $mfac->edit();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    if($ope=="edi" && $idfac) $datOne = $mfac->getOne();
    if($ope=="eli" && $idfac) $mfac->del();

    $datEmp = $mfac->getAllEmp();
    $datAll = $mfac->getAll();

    if ($ope == 'est' && $idfac && $estfac) {
        $mfac->setIdfac($idfac);
        if ($estfac == 49 && ($tipfac == 14 OR $tipfac == 15 OR $tipfac == 16 OR $tipfac == 17 OR $tipfac == 18)) $estfac=50;
        $mfac->setEstfac($estfac);
        $mfac->setFecha($fecact);
        $mfac->setIdper($_SESSION['idper']);
        $mfac->editAct(); 
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    if($ope=="nov" && $idfac){
        $mfac->setIdpernov($idpernov);
        $mfac->setFnov($fnov);
        $mfac->setObsnov($obsnov);
        $mfac->nov();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    if($ope=="egreso" && $idfac){
        $mfac->setNumegr($numegr);
        $mfac->egreso();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    if($ope=="bodega" && $idfac){
        $mfac->setNumbod($numbod);
        $mfac->bodega();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }


//------------Importar Facturas-----------

    if ($ope=="carfac" && $arc) {
        $dat = opti($_FILES["arc"], $arc, "arc/xls", $nomarc);
    	$inputFileType = IOFactory::identify($dat);
    	$objReader = IOFactory::createReader($inputFileType);
    	$objPHPExcel = $objReader->load($dat);
    	$sheet = $objPHPExcel->getSheet(0);
    	$highestRow = $sheet->getHighestRow();
    	$highestColumn = $sheet->getHighestColumn();
         // Inicia a recoger el excel desde la fila 3 hasta la ultima con info
    	for ($row = 3; $row <= $highestRow; $row++) {
            $comp = 2;
        
    		$nofac = $sheet->getCell("B" . $row)->getValue();
    		$confac = $sheet->getCell("C" . $row)->getValue();
    		$nitemp = $sheet->getCell("D" . $row)->getValue();

            // Se comprueba que el id de la provedores exista
            $mfac->setNitemp($nitemp);
            $comemp = $mfac->CompEmp();
            $idemp = $comemp[0]['idemp'];

            $fefac = $sheet->getCell("E" . $row)->getValue();
            $fvfac = $sheet->getCell("F" . $row)->getValue();
            $forpag = $sheet->getCell("G" . $row)->getValue();

            // Se comprueba que el id de la forma de pago exista
            $mfac->setIdval($forpag);
            $comfp = $mfac->CompVal();
            $forpag = $comfp[0]['idval'];

    		$tipfac = $sheet->getCell("H" . $row)->getValue();

            // Se comprueba que el id del tipo de pago exista
            $mfac->setIdval($tipfac);
            $comtp = $mfac->CompVal();
            $tipfac = $comtp[0]['idval'];

    		$esfac = $sheet->getCell("I" . $row)->getValue(); //este es el valor que obtines, lo guardas en estfac

            $mfac->setIdval($estfac); //aca envias el valor que obtuviste en el excel//entonces el que debes enviar aca es estfac
            $comes = $mfac->CompVal(); //comprubas que ese valor exista, 
            $estfac = $comes[0]['idval']; //Luego de comprobar guardas ese nuevo valor en la variable//si existe trae el id y si no queda en NULL

            // $fifac = $sheet->getCell("J" . $row)->getValue();

            if (is_numeric($fefac)) $fefac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fefac)->format('Y-m-d');
            if (is_numeric($fvfac)) $fvfac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fvfac)->format('Y-m-d');
            // if (is_numeric($fifac)) $fifac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fifac)->format('Y-m-d');

            // Se capturan las variables para enviarlas al modelo
            $mfac->setNofac($nofac);
            $mfac->setConfac($confac);
            $mfac->setIdemp($idemp);
            $mfac->setFefac($fefac);
            $mfac->setFvfac($fvfac);
            $mfac->setForpag($forpag);
            $mfac->setTipfac($tipfac);
            $mfac->setEstfac($estfac);
            $mfac->setIdpercre($_SESSION['idper']);
            $mfac->setFifac($nmfl);
    		$existingData = $mfac->selectFac();
            $idfac = $existingData[0]['idfac'];
            $mfac->setIdfac($idfac);
            if($idemp AND $forpag AND $tipfac AND $estfac){ //solo si despues de comprobar que los valores del excel existan y todos estan llenos...
    			if ($existingData[0]['sum'] == 0) $mfac->saveFacXls(); //Si al hacer el conteo de las facturas que cumplen con las condiciones que se colocaron en el modelo, el conteo es 0, la factura no existe y la crea, si es diferente a 0 la edita
    			else $mfac->EditFacXls();
            }else{ //Si alguno de los datos del excel que va a comprobar en ese registro esta vacio
                $reg = $row; // Iguala reg al valor de la ultima fila hasta donde guardo antes de dar error
                $row = $highestRow+5; //coloca el valor de row como el de la utlima columna en la que hay registros + 5 para así forzar a que se corte el ciclo, creo que se puede hacer con break pero no toma el condicional del mensaje
            }
    	}
        // if($row>$highestRow+5) die;
        if($row>$highestRow+5) echo '<script>err("Ooops... Algo esta mal en la fila #'.$reg.', corrígelo y vuelve a subir el archivo");</script>';
        else echo '<script>satf("Todos los datos han sido registrados con exito, por favor espere un momento");</script>';
        echo "<script>setTimeout(function(){ window.location='home.php?pg=".$pg."';}, 7000);</script>";
    }
?>

