
<?php

    require_once ('models/mped.php');
    include('models/malm.php');

    $mped = new Mped();
    $malm = new Malm();

   
    $idped = isset($_REQUEST['idped']) ? $_REQUEST['idped'] :NULL;
    $idper = isset($_SESSION['idper']) ? $_SESSION['idper'] :NULL;
    $idalm= isset($_REQUEST['idalm']) ? $_REQUEST['idalm']:NULL;

    $opera=isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $mped->setIdper($idper);

    // $datOne = $mped->getOne();
    $datAllAlm = $malm->getAllAlm();
    $datOne = NULL;
 
    if($ope=="save"){
        $mped->setIdalm($idalm);
        $mped->setFecped($fecact);
        $mped->setIdper($_SESSION['idper']);
        $mped->save(); 
        echo "<script>window.location='home.php?pg=".$pg."';</script>";
    }

    





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