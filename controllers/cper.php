<?php
    require_once("models/mper.php");
    require ('vendor/autoload.php');
    include("models/datos.php");
    require ('controllers/sendemail.php');

    use PhpOffice\PhpSpreadsheet\IOFactory;

    $mper = new Mper();

    //------------Persona-----------
    $idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
    $nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
    $apeper = isset($_POST['apeper']) ? $_POST['apeper']:NULL;
    $ndper = isset($_POST['ndper']) ? $_POST['ndper']:NULL;
    $area = isset($_POST['area']) ? $_POST['area']:NULL;
    $emaper = isset($_POST['emaper']) ? strtolower($_POST['emaper']):NULL;
    $actper = isset($_REQUEST['actper']) ? $_REQUEST['actper']:1;

    $pass = "A".$ndper."P";
    $pasper = encripta($pass);
    $hash = $pasper['hash'];
    $salt = $pasper['salt'];

    $arc = isset($_FILES["arc"]["name"]) ? $_FILES["arc"]["name"] : NULL;
    $arc = substr($arc, 0, strpos($arc, ".xls"));

    //------------Jefe-----------
    $idjef = isset($_POST['idjef']) ? $_POST['idjef']:NULL;

    //------------Perfil-----------
    $idpef = isset($_POST['idpef']) ? $_POST['idpef']:5;
    $datOne = NULL;
    $datJxP=NULL;
    $pg = 106;


    //------------Correo-----------
    $nombre = nombre($apeper." ".$nomper);
    $template = "views/mail.html";
    $mail_asun = "¡Bienvenido a nuestra app!";
    $txt_mess = "Es un placer darle la bienvenida a nuestra nueva aplicación. A continuación, le proporcionamos sus credenciales de acceso:<br><br>
    <strong>Usuario: </strong>".$ndper.(($emaper) ? "/".$emaper : "")."<br>
    <strong>Contraseña: </strong>".$pass."<br><br>
    Le solicitamos que, al iniciar sesión por primera vez, cambie su contraseña para garantizar la seguridad de su cuenta.<br><br>
    Para acceder a la aplicación, ingrese en el siguiente enlace: <a href='".$url."'>App Galqui</a><br><br>
    Si tiene alguna pregunta o requiere asistencia, no dude en ponerse en contacto con nosotros.<br><br>
    Agradecemos su confianza y esperamos que disfrute de la nueva experiencia.<br><br>";
    $fir_mail = '<strong>'.$nom.'</strong><br>Cra 1 Nº 4 - 02 Bdg 2 Parque Industrial K2<br>Chía - Cund<br>www.galqui.com';

    $mper->setIdper($idper);
    //------------Persona-----------
    if($ope=="save"){
        $mper->setNomper($nomper); 
        $mper->setApeper($apeper);
        $mper->setEmaper($emaper);
        $mper->setNdper($ndper);
        $mper->setArea($area);
        $mper->setActper($actper);
        $mper->setIdjef($idjef);
        $mper->setHash($hash);
        $mper->setSalt($salt);
        if(!$idper) {
            $mper->save();
            $per = $mper->getOneSPxF($ndper); 
            $mper->savePxFAut($per[0]['idper'],$idpef);
            $mper->setIdper($per[0]['idper']);
            if($emaper){ 
                $exito = sendemail($ema, $psem, $nom, $emaper, $nombre, "", $txt_mess, $mail_asun, $fir_mail, $template, "", "", "");
                while ($exito==2) $exito = sendemail($ema, $psem, $nom, $emaper, $nombre, "", $txt_mess, $mail_asun, $fir_mail, $template, "", "", "");
            }
        }
        else{
            $mper->edit();
            if($idper == $_SESSION["idper"]){
                $_SESSION['nomper'] = $nomper;
                $_SESSION['apeper'] = $apeper;
                $_SESSION['emaper'] = $emaper;
                $_SESSION['ndper'] = $ndper;
                $_SESSION['area'] = $area;
            }
        } 
        if($idper) $mper->delJxP();
        if($idjef){ foreach ($idjef as $i=>$jf) {
            if($jf){
                $mper->setIdjef($jf);
                $mper->saveJxP($i+1);
            }
        }}
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    if($ope=="act" && $idper && $actper){
        $mper->setActper($actper);
        $mper->editAct();
    }

    if($ope=="edi"&& $idper){
        $datOne=$mper->getOne();
        $datJxP=$mper->getOneJxP();
    }

    if($_SESSION['idpef']==5){
        $mper->setIdper($_SESSION['idper']);
        $datOne=$mper->getOne();
        $datJxP=$mper->getOneJxP();
        $est = 1;
    }

   if($ope=="eli"&& $idper){
        $mper->del();
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    //------------Perfil-----------
    if($ope=="savepxf"){
        if($idper) $mper->delPxF();
        if($idpef){ foreach ($idpef as $pf) {
            if($pf){
                $mper->setIdpef($pf);
                $mper->savePxF();
            }
        }}
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }
     //------------Traer valores-----------
    $datAll = $mper->getAll();
    $datarea = $mper->getAllDom(5);


        //------------Importar empleados-----------
    if ($ope=="carper" && $arc) {
        $dat = opti($_FILES["arc"], $arc, "arc/xls", $nomarc);
        $inputFileType = IOFactory::identify($dat);
        $objReader = IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($dat);
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 3; $row <= $highestRow; $row++) {
            // obtengo el valor de la celda
            $pf = 0;
            $idpefA = [];
            $idjefi = NULL;
            $idjefa = NULL;
            $idper = NULL;
            $ndper = $sheet->getCell("B" . $row)->getValue();
            $nomper = $sheet->getCell("C" . $row)->getValue();
            $apeper = $sheet->getCell("D" . $row)->getValue();
            $emaper = $sheet->getCell("E" . $row)->getValue();
            $area = $sheet->getCell("F" . $row)->getValue();
            $mper->setIdval($area);
            $carea = $mper->CompVal();
            $area = $carea[0]['idval'];
            
            $actper = $sheet->getCell("G" . $row)->getValue();
            $idpef = $sheet->getCell("H" . $row)->getValue();
            $idpef = str_replace(' ', '', $idpef);
            $idpefA = explode(".", $idpef);
            foreach($idpefA AS $pa){
                $mper->setIdpef($pa); 
                $pef = $mper->CompPef();
                $pef = $pef[0]['idpef'];
                if($pef) $pf++;
            }

            $ndjefi = $sheet->getCell("I" . $row)->getValue();
            $mper->setNdper($ndjefi); 
            $idjefia = $mper->selectUsu(); 
            if($idjefia) $idjefi = $idjefia[0]['idper'];


            $ndjefa = $sheet->getCell("J" . $row)->getValue();
            $mper->setNdper($ndjefa); 
            $idjefaa = $mper->selectUsu(); 
            if($idjefaa) $idjefa = $idjefaa[0]['idper'];


            $pass = "A".$ndper."P";
            $pasper = encripta($pass);
            $hash = $pasper['hash'];
            $salt = $pasper['salt'];
            $nombre = nombre($apeper." ".$nomper);
            $txt_mess = "Es un placer darle la bienvenida a nuestra nueva aplicación. A continuación, le proporcionamos sus credenciales de acceso:<br><br>
            <strong>Usuario: </strong>".$ndper.(($emaper) ? "/".$emaper : "")."<br>
            <strong>Contraseña: </strong>".$pass."<br><br>
            Le solicitamos que, al iniciar sesión por primera vez, cambie su contraseña para garantizar la seguridad de su cuenta.<br><br>
            Para acceder a la aplicación, ingrese en el siguiente enlace: <a href='".$url."'>App Tummy</a><br><br>
            Si tiene alguna pregunta o requiere asistencia, no dude en ponerse en contacto con nosotros.<br><br>
            Agradecemos su confianza y esperamos que disfrute de la nueva experiencia.<br><br>";
            $mper->setNomper($nomper);
            $mper->setApeper($apeper);
            $mper->setNdper($ndper);
            $mper->setEmaper($emaper);
            $mper->setArea($area);
            $mper->setActper($actper);
            $mper->setIdpef($idpef);
            $mper->setHash($hash);
            $mper->setSalt($salt);
            $existingData = $mper->selectUsu();
    		 if($existingData){
                $idper = $existingData[0]['idper'];
                $mper->setIdper($idper);
    		} if (count($idpefA)==$pf && (!$ndjefi OR ($ndjefi && $idjefi)) && (!$ndjefa OR ($ndjefa && $idjefa))) {
    		    if (!empty($ndper)) {
    		    	if (!$idper) {
    		    		$mper->save();
                        $per = $mper->getOneSPxF($ndper);
                        $mper->setIdper($per[0]['idper']);
                        if($emaper){
                            $exito = sendemail($ema, $psem, $nom, $emaper, $nombre, "", $txt_mess, $mail_asun, $fir_mail, $template, "", "", "");
                            while ($exito==2) $exito = sendemail($ema, $psem, $nom, $emaper, $nombre, "", $txt_mess, $mail_asun, $fir_mail, $template, "", "", "");
                        }

    		    	}else {
    		    		$mper->edit();
                        $mper->delPxF();
                        $mper->delJxP();
    		    	} if($idjefi){
                        $mper->setIdjef($idjefi);
                        $mper->saveJxP(1);
                    } if($idjefa){
                        $mper->setIdjef($idjefa);
                        $mper->saveJxP(2);
                    } if($idpefA){ foreach ($idpefA as $pf) {
                        if($pf){
                            $mper->setIdpef($pf);
                            $mper->savePxF();
                        }
                    }} 
                }
    		}else{
                $reg = $row;
                $row = $highestRow+5;
            }
    	}
        if($row>$highestRow+5) echo '<script>err("Ooops... Algo esta mal en la fila #'.$reg.', corrígelo y vuelve a subir el archivo");</script>';
        else echo '<script>satf("Todos los datos han sido registrados con exito, por favor espere un momento");</script>';
        echo "<script>setTimeout(function(){ window.location='home.php?pg=".$pg."';}, 7000);</script>";
    }

    function nombre($nombre){
        $partesp = explode(" ", $nombre);
        $apefor = ucfirst(strtolower($partesp[0]));
        $nomfor = ucfirst(strtolower($partesp[count($partesp) > 2 ? 2 : 1]));
        return $nomfor." ".$apefor;
    }


?>
