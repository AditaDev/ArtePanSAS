<?php
require_once('controllers/cfac.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>

<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="nofac"><strong>N° factura:</strong></label>
            <input class="form-control" type="text" id="nofac" name="nofac" value="<?php if ($datOne) echo $datOne[0]['nofac']; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="confac"><strong>Concepto:</strong></label>
            <input class="form-control" type="text" id="confac" name="confac" value="<?php if ($datOne) echo $datOne[0]['confac']; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for=""><strong>Empresa:</strong></label>
            <select id="idempresa" name="idemp" class="form-control form-select" required>
                <option value="0"></option>
                <?php if ($datEmp) {
                    foreach ($datEmp as $dep) { ?>
                        <option value='<?= $dep['idper']; ?>' <?php if ($datOne && $dep['idper'] == $datOne[0]['idemp']) echo " selected "; ?>>
                            <?= $dep['nitemp'] . " - " . $dep['razsoem']; ?>
                        </option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="fefac"><strong>Fecha emisión:</strong></label>
            <input class="form-control" type="date" id="fefac" name="fefac" value="<?php if ($datOne) echo $datOne[0]['fefac']; ?>"  required>
        </div>
        <div class="form-group col-md-4">
            <label for="fvfac"><strong>Fecha de vencimiento:</strong></label>
            <input class="form-control" type="date" id="fvfac" name="fifac" value="<?php if ($datOne) echo $datOne[0]['fvfac']; ?>"  required>
        </div>
        <div class="form-group col-md-4">
            <label for="arcimg"><strong>Pdf:</strong></label>
            <input class="form-control" type="file" id="arcpdf" name="arcpdf" <?php if(!$datOne) echo "required";?>>
        </div>
        <div class="form-group col-md-4">
            <label for="arcimg"><strong>Soporte:</strong></label>
            <input class="form-control" type="file" id="arcpdf" name="arcpdf" <?php if(!$datOne) echo "required";?>>
        </div>

        <div class="form-group col-md-12" id="boxbtn">
            <br><br>
            <input class="btn btn-primary" type="submit" value="Registrar">
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="idfac" value="<?php if ($datOne) echo $datOne[0]['idfac']; ?>">
        </div>
    </div>
</form>


<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Datos factura</th>
            <th></th>
            <th></th>          
            
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) { foreach ($datAll as $dta) { ?>
            <tr>
                    <td tyle="text-align: left;"><?= $dta['idfac']; ?></td>
                    <td>
                    <strong> <?=($dta['nofac']) . " - " . $dta['confac']; ?></strong><br>
                        <small>
                            <strong>Fecha registro: </strong><?= $dta['fifac']; ?><br>
                            <strong>Empresa: </strong> <?= $dta['razsoem']; ?><br>
                            <!-- <strong><?= $dta['']; ?></strong> -->
                        
                        
                        </small>
                    </td>
                    <td tyle="text-align: half;">
                        <i class="fa fa-solid fa-circle-check fa-2x act"></i>
                        <a href="#" title="Ver detalles" data-bs-toggle="modal" data-bs-target="#mfac<?= $dta['idfac']; ?>" title="Revisar">
                            <i class="fa fa-solid fa-file-circle-check fa-2x iconi"></i>
                        </a>
                    </td>
                    <td tyle="text-align: right;">
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
            <th></th>
            <th></th>
          
        </tr>
    </tfoot>
</table>