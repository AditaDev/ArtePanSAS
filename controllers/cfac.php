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
    $estfac = isset($_REQUEST['estfac']) ? $_REQUEST['estfac']:52;
    $idemp = isset($_POST['idemp']) ? $_POST['idemp']:NULL;
    $fefac = isset($_POST['fefac']) ? $_POST['fefac']:NULL; // fecha emision
    $fvfac = isset($_POST['fvfac']) ? $_POST['fvfac']:NULL; // fecha vencimiento
    $forpag = isset($_POST['forpag']) ? $_POST['forpag']:NULL;
    $tipfac = isset($_REQUEST['tipfac']) ? $_REQUEST['tipfac']:NULL;
    $arcpdf = isset($_FILES['arcpdf']) ? $_FILES['arcpdf']:NULL;
    $arcspt = isset($_FILES['arcspt']) ? $_FILES['arcspt']:NULL;
    $idpernov = isset($_POST['idpernov']) ? $_POST['idpernov']:$_SESSION['idper'];
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

    $mfac->setIdfac($idfac);

    if($idemp) $infoemp = $mfac->getOneEmp($idemp);
    if($arcpdf && $infoemp && $infoemp[0]['razsoem']) $rutpdf = opti($arcpdf, $nofac."_".$confac, "arc/facturas/".$infoemp[0]['razsoem'], $nmfl); 
    if($arcspt) $rutspt = opti($arcpdf, "nombre", "ruta", "id"); 

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
        if ($estfac == 53 && ($tipfac == 14 OR $tipfac == 15 OR $tipfac == 16 OR $tipfac == 17 OR $tipfac == 18)) $estfac=54;
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


    //------------Importar tarjetas-----------
       if ($ope=="carfac" && $arc) {
        $dat = opti($_FILES["arc"], $arc, "arc/xls", $nomarc);

        // var_dump($dat);
        // die;


    	$inputFileType = IOFactory::identify($dat);
    	$objReader = IOFactory::createReader($inputFileType);
    	$objPHPExcel = $objReader->load($dat);
    	$sheet = $objPHPExcel->getSheet(0);
    	$highestRow = $sheet->getHighestRow();
    	$highestColumn = $sheet->getHighestColumn();
        // Inicia a recoger el excel desde la fila 3 hasta la ultima con info
    	for ($row = 3; $row <= $highestRow; $row++) {
    		// obtengo el valor de la celda
            $comp = 2;

            // $idperrecd = NULL;
            // $idperentd = NULL;
            // $mfac->setIdperrecd($idperrecd);
            // $mfac->setIdperentd($idperentd);

    		$nofac = $sheet->getCell("B" . $row)->getValue();
    		$confac = $sheet->getCell("C" . $row)->getValue();
    		$idemp = $sheet->getCell("D" . $row)->getValue();
            // Se comprueba que el id de la empresa exista
    		// $idemp = $sheet->getCell("D" . $row)->getValue();
            // $idemp = $mfac->selectEmp(); 
            // $idemp = $idemp[0]['idemp']; 

            $fefac = $sheet->getCell("E" . $row)->getValue();
            $fvfac = $sheet->getCell("F" . $row)->getValue();
            $forpag = $sheet->getCell("G" . $row)->getValue();
    		$tipfac = $sheet->getCell("H" . $row)->getValue();
    		$esfac = $sheet->getCell("I" . $row)->getValue();
            

        //     if (is_numeric($fecent)) $fecent = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fecent)->format('Y-m-d');
        //     if (is_numeric($fecdev)) $fecdev = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fecdev)->format('Y-m-d');
        //     if($fecdev){
    	// 	    $dpentd = $sheet->getCell("I" . $row)->getValue();
        // Se comprueba que el id de la empresa exista
        //         $mfac->setNdper($dpentd); 
        //         $idpentd = $mfac->selectUsu(); 
        //         $idperentd = $idpentd[0]['idper']; 
        //         $mfac->setIdperentd($idperentd);
    	// 	    $dprecd = $sheet->getCell("K" . $row)->getValue();
        // Se comprueba que el id de la persona exista
        //         $mfac->setNdper($dprecd); 
        //         $idprecd = $mfac->selectUsu(); 
        //         $idperrecd = $idprecd[0]['idper']; 
        //         $mfac->setIdperrecd($idperrecd);
        //         if($idperent && $idperrec && $idperentd && $idperrecd) $comp = 1;
        //     }elseif(!$fecdev){
        //         if($idperent && $idperrec) $comp = 1;
        //     }
    	// $esttaj = ($fecdev) ? 2 : 1;

      // Se capturan las variables para enviarlas al modelo
            $mfac->setNofac($nofac);
            $mfac->setConfac($confac);
            $mfac->setFefac($fefac);
            $mfac->setFvfac($fvfac);
            $mfac->setForpag($forpag);
            $mfac->setTipfac($tipfac);
        // Se comprueba que el id del registro existe, en este caso si el idfac existe no lo duplica sino lo edita
    	// 	$existingData = $mfac->selectTaj();
        //     $idtaj = $existingData[0]['idtaj'];
        //     $mfac->setIdtaj($idtaj);
        // Se valida que los datos que trajo cada validacion de id esten llenos, si no lo estan va a generar error, para que no lo haga el ciclo se corta y no lo inserta
        // Crean o actualizan los registros
    	// 	if($comp==1 && (!empty($numtajpar) OR !empty($numtajofi))) {
        // Valida si el comrobar el registro viene lleno o no para editar o crear
    	// 		if ($existingData[0]['sum'] == 0) $mfac->saveTajXls(); // Crea
    	// 		else $mfac->EditTajXls(); //Edita
        // Si los datos que compruban la existencia de los id viene alguno vacio, corta el ciclo 
    	// 	}else{
        //         $reg = $row; // Iguala reg al valor de la ultima fila hasta donde guardo antes de dar error
        //         $row = $highestRow+5; //coloca el valor de row como el de la utlima columna en la que hay registros + 5 para así forzar a que se corte el ciclo, creo que se puede hacer con break pero no toma el condicional del mensaje
        //     }
    	// }
        // if($row>$highestRow+5) echo '<script>err("Ooops... Algo esta mal en la fila #'. " ".', corrígelo y vuelve a subir el archivo");</script>'; //aca usa reg para decirle al usuario en que fila del excel hay error
        echo '<script>satf("Todos los datos han sido registrados con exito, por favor espere un momento");</script>';
        echo "<script>setTimeout(function(){ window.location='home.php?pg=".$pg."';}, 7000);</script>";
         } }
?>

