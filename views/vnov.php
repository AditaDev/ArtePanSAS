<?php
require_once('controllers/cnov.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>

<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="idperg"><strong>Persona:</strong></label>
            <select id="idperg" name="idperg" class="form-control form-select" required>
                <?php if ($datPer) {
                    foreach ($datPer as $dep) { ?>
                        <option value='<?= $dep['idper']; ?>' <?php if ($datOne && $dep['idper'] == $datOne['idper']) echo " selected "; ?>>
                            <?= $dep['ndper'] . " - " . $dep['nomper']; ?>
                        </option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="tipnov"><strong>Tipo novedad:</strong></label>
            <select name="tipnov" id="tipnov" class="form-control form-select" required>
                    <?php foreach ($dattip as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['tipnov']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
        </div>
        <div class="form-group col-md-4">
            <label for="area"><strong>Area:</strong></label>
            <select name="area" id="area" class="form-control form-select" required>
                    <?php foreach ($datarea as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['area']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
        </div>
        <div class="form-group col-md-4">
                <label for="fecinov"><strong>Fecha inicial:</strong></label>
                <input class="form-control" type="date" id="fecinov" name="fecinov" value="<?php if ($datOne) echo $datOne[0]['fecinov']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="fecfnov"><strong>Fecha final:</strong></label>
                <input class="form-control" type="date" id="fecfnov" name="fecfnov" value="<?php if ($datOne) echo $datOne[0]['fecfnov']; ?>" required>
            </div>
        <div class="form-group col-md-4">
            <label for="arcimg"><strong>Soporte:</strong></label>
            <input class="form-control" type="file" id="arcpdf" name="arcpdf">
        </div>
        <div class="form-group col-md-12"> 
                <label for="obsnov"><strong>Observación:</strong></label>
                <textarea class="form-control" type="text" id="obsnov" name="obsnov" <?php if ($datOne) echo 'required';?>><?php if ($datOne) echo $datOne[0]['obsnov']; ?></textarea>
        
        <div class="form-group col-md-12" id="boxbtn">
            <br><br>
            <input class="btn btn-primary" type="submit" value="Registrar">
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="idnov" value="<?php if ($datOne) echo $datOne[0]['idnov']; ?>">
        </div>
    </div>
    </div>
</form>


<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Datos persona</th>
            <th>Estado</th>
            <th>Acciones</th>
        
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) { foreach ($datAll as $dta) { ?>
            <tr>
                    <td tyle="text-align: left;"><?= $dta['idnov']; ?></td>
                    <td>
                    <strong> <?=($dta['ndper']) .  " - "  . $dta['nomper']; ?></strong><br>
                        <small>
                            <strong>Tipo novedad: </strong> <?= $dta['tipnov']; ?><br>
                            <!-- <strong>: </strong><?= $dta['']; ?><br>                       -->
                        </small>
                    </td>
                    <td tyle="text-align: half;">
                        <?php if ($dta['estnov'] == 1) { ?>
                            <span style="font-size: 1px;opacity: 0;">+</span>
                            <a href="home.php?pg=<?= $pg; ?>&idnov=<?= $dta['idnov']; ?>&estnov=2&ope=act" title="Revisada">
                                <i class="fa fa-solid fa-circle-check fa-2x act"></i>
                            </a>
                        <?php } else { ?>
                            <span style="font-size: 1px;">--</span>
                            <a href="home.php?pg=<?= $pg; ?>&idnov=<?= $dta['idnov']; ?>&estnov=1&ope=act" title="No revisada">
                                <i class="fa fa-solid fa-circle-xmark fa-2x desact"></i>
                            </a>
                        <?php } ?>
                    </td>
                    <td tyle="text-align: right;">
                        <a href="home.php?pg=<?= $pg; ?>&idnov=<?= $dta['idnov']; ?>&ope=edi">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi"  title="Editar"></i>
                        </a>
                        <a href="home.php?pg=<?= $pg; ?>&idnov=<?= $dta['idnov']; ?>&ope=eli" onclick="return eliminar('<?= $dta['idnov']; ?>');">
                            <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                        </a>
                    </td>                    
            </tr>
        <?php }} ?>
    </tbody>
    <tfoot>
        <tr>
            <th>No.</th>
            <th>Datos persona</th>
            <th>Estado</th>
            <th>Acciones</th>
        
          
        </tr>
    </tfoot>
</table>

