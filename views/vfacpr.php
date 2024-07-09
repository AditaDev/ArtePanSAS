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
                    <td tyle="text-align: left;"></td>
                    <td>
                    <div class="container mt-5">
                        <div id="items" class="row row-cols-1">
                        <?php foreach ($datAll as $dta) { ?>
                            <?php if ($dta['estfac'] == 2); 
                                 }?>
                    </td>
                    
                    <td tyle="text-align: half;">
                    
                    </td>

                    <td tyle="text-align: left;">
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