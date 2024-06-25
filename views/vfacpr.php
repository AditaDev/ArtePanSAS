<?php
require_once('controllers/cfacpr.php');
require_once('controllers/cfac.php');


$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>


<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Datos factura</th>
            <th>Estado</th>
            <th></th>      
            
            
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) { foreach ($datAll as $dta) { ?>
            <tr>
                    <td tyle="text-align: left;"><?= $dta['idfac']; ?></td>
                    <td>
                    <div class="container mt-5">
                        <div id="items" class="row row-cols-1">
                        <?php foreach ($datAll as $dta) { ?>
                            <?php if ($dta['estfac'] == 2); 
                                 }?>
                    </td>
                    
                    <td tyle="text-align: half;">
                        <?php if ($dta["estfac"] == 1) { ?>
                            <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="Sin Revisar"></i>
                        <?php } elseif ($dta["estfac"] == 2) { ?>
                            <i class="fa fa-solid fa-circle-check fa-2x iconi prv" title="Primera Revisión"></i>
                        <?php } elseif ($dta["estfac"] == 3) { ?>
                            <i class="fa fa-solid fa-circle-check fa-2x act" title="Revisada"></i>
                        <?php } elseif ($dta["estfac"] == 4) { ?>
                            <i class="fa fa-solid fa-circle-check fa-2x chulo" title="Entregada"></i>
                        <?php } ?>
                    </td>

                    <td tyle="text-align: left;">
                        <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=edi">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi"  title="Editar"></i>
                        </a>
                        <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=eli" onclick="return eliminar('<?= $dta['idfac']; ?>');">
                            <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                        </a>
                    </td>
                  
                    
                    
                    
            </tr>
            <tr></tr>
        <?php }} ?>
    </tbody>
    <tfoot>
        <tr>
            <th>No.</th>
            <th>Datos factura</th>
            <th>Estado</th>
            <th></th> 
        
          
        </tr>
    </tfoot>
</table>