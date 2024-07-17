
<?php

    require_once ('models/mped.php');
    include('models/malm.php');

    $mped = new Mped();
    $malm = new Malm();

   
    $idped = isset($_REQUEST['idped']) ? $_REQUEST['idped'] :NULL;
    $idalm = isset($_POST['idalm']) ? $_POST['idalm']:NULL;
    $canalm = isset($_POST['canalm']) ? $_POST['canalm']:1;
    $fecped = date("Y-m-d H:i:s");
    
    $opera=isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $mped->setIdper($idped);

    $datAllAlm = $malm->getAllAlm();
    $pg = 62;
    
    if($ope=="save"){
        $mped->setIdalm($idalm);
        $mped->setFecped($fecped);
        $mped->setCanalm($canalm);
        $mped->setIdper($_SESSION['idper']);
        $mped->save(); 
        echo "<script>alert('Has pedido ".$canalm." almuerzos exitosamente!!!');window.location='home.php?pg=".$pg."';</script>";
    }
    $datOne = $mped->getOneAlm();
    





// if ($opera == "save") {
//     // Verificar si el usuario ya ha votado antes de guardar el voto
//     $getOne = $mped->getOne();
    
//     if ($getOne && $getOne[0]['co'] == 0) {
//         // El usuario aún no ha votado, proceder con la votación
//         $mped->setCanusu($canusu);
//         $mped->setDtvot($dtvot);
//         $mped->save();
//         echo "<script type='text/javascript'>alert('Has votado exitosamente!!!');</script>";
//     } else {
//         echo "<script type='text/javascript'>alert('Ya has votado. No puedes votar más de una vez.');</script>";
//     }

//     echo "<script type='text/javascript'>window.location='index.php'</script>";
// }

// if ($opera == "votIns") {
//     // Verificar si el usuario ya ha votado antes de intentar insertar un voto
//     $getOne = $mped->getOne();

//     if ($getOne && $getOne[0]['co'] == 0) {
//         // El usuario aún no ha votado, proceder con la votación
//         $mped->setCanusu($canusu);
//         $mped->setDtvot($dtvot);
//         $mped->save();
//         echo "<script type='text/javascript'>alert('Has votado exitosamente!!!');</script>";
//     } else {
//         echo "<script type='text/javascript'>alert('Ya has votado. No puedes votar más de una vez.');</script>";
//     }
//     echo "<script type='text/javascript'>window.location='index.php'</script>";
// }
// $jorn = $mped->getOneJor();
// if($jorn && $jorn[0]['jornada']) $jorn = $jorn[0]['jornada'];
// else $jorn=1;
// $dat=$mped->getAll($jorn);

// ?> 