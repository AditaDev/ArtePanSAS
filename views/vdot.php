<?php

require_once('controllers/cdot.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>

<!-- <div class="row">
        <div class="col-6" style="text-align: right;">
            <i class="fa fa-solid fa-file-import fa-2x imp" title="Importar"></i>
        </div>
</div> -->

<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-8">
            <label for="idperrec"><strong>Usuario:</strong></label>
            <select id="idperrec" name="idperrec" class="form-control form-select" required>
                <option value="0"></option>
                <?php if ($datPer) {
                    foreach ($datPer as $dep) { ?>
                        <option value='<?= $dep['idper']; ?>' <?php if ($datOne && $dep['idper'] == $datOne[0]['prec']) echo " selected "; ?>>
                            <?= $dep['ndper'] . " - " . $dep['nomper'] . "  " . $dep['apeper']; ?>
                        </option>
                <?php }
                } ?>
            </select>
        </div>
        <?php ?>
        <div class="form-group col-md-4">
            <label for="fecent"><strong>F. Entrega:</strong></label>
            <input class="form-control" type="date" id="fecent" name="fecent" max=<?php echo $hoy; ?> <?php if ($datOne) echo 'value="' . $datOne[0]['fecent'] . '" disabled';
                                                                                                        else echo 'value="' . $hoy . '" required'; ?>>
        </div>
        <div class="form-group col-md-12"><br></div>
        <?php if ($datDot && $datTalS && $datTalP && $datTalZ) {
            foreach ($datDot as $ddo) { ?>
                <div class="form-group col-md-6">
                    <input type="checkbox" name="idvdot[]" value="<?= $ddo['idval'] ?>" <?php if ($datTxD) {
                                            foreach ($datTxD as $ddt) {
                                                if ($ddo['idval'] == $ddt['idvdot']) echo " checked ";
                                                }
                                            } ?>>
                    <label for="idvdot"><strong><?= $ddo['nomval']; ?></strong></label>
                </div>
                <div class="form-group col-md-6">
                    <select name="idvtal[]" id="idvtal" class="form-control form-select">
                        <option value="0"></option>
                        <?php
                        if ($ddo['idval'] == 82 or $ddo['idval'] == 83) $datTal = $datTalS;
                        elseif ($ddo['idval'] == 81) $datTal = $datTalP;
                        elseif ($ddo['idval'] == 84) $datTal = $datTalZ;
                        elseif ($ddo['idval'] == 85) $datTal = $datTalG;
                        if ($datTal) {
                            foreach ($datTal as $ddt) { ?>
                                <option value="<?= $ddt['idval'] ?>" <?php if ($datTxD) {
                                        foreach ($datTxD as $ddot) {
                                            if ($ddt['idval'] == $ddot['idvtal']) echo " selected ";
                                            }
                                        } ?>>
                                    <?= $ddt['nomval']; ?>
                                </option>
                        <?php }
                        } ?>
                    </select>
                </div>

        <?php }
        } ?>
        <div class="form-group col-md-12">
            <br>
            <label for="observ"><strong>Observaciones entrega:</strong></label>
            <textarea class="form-control" type="text" id="observ" name="observ" <?php if ($datOne) echo 'required'; ?>><?php if ($datOne) echo $datOne[0]['observ']; ?></textarea>
        </div>
        <div class="form-group col-md-12" id="boxbtn">
            <br><br>
            <input class="btn btn-primary" type="submit" value="Registrar">
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="ident" value="<?php if ($datOne) echo $datOne[0]['ident']; ?>">
        </div>





        <select name="color" id="color" class="form-control form-select">
            
            
            <?php foreach ($datCol as $dte) { ?>
                <option value="<?= $dte['idval']; ?>" <?php if ($datCxD){
                foreach ($datCxD as $ddot) {
                    if  ($dte['idval'] == $ddot[0]['color']) echo " selected "
                            
                         ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php }} }?>
                </select>
            
                <select name="color[]" id="color" class="form-control form-select">
                        <option value="0"></option>
                        <?php
                        if ($datCol) {
                            foreach ($datCol as $ddt) { ?>
                                <option value="<?= $ddt['idval'] ?>" <?php if ($datCxD) {
                                        foreach ($datCxD as $ddot) {
                                            if ($ddt['idval'] == $ddot['color']) echo " selected ";
                                            }
                                        } ?>>
                                    <?= $ddt['nomval']; ?>
                                </option>
                        <?php }
                        } ?>
                    </select>
                

    </div>
</form>

<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>Datos persona</th>
            <th>Estado</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php if ($datAllD) {
            foreach ($datAllD as $dta) { ?>
                <tr>
                    <td tyle="text-align: left;">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <strong> <?= ($dta['fecent']) .  " - "  . $dta['nomprec']; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <small><strong>Área: </strong> <?= $dta['area']; ?></small><br>
                                <small>
                                    <strong>Observación: </strong><?= $dta['observ']; ?><br>
                                </small>
                            </div>
                            <div class="form-group col-md-2">
                                <i class="fa fa-solid fa-eye iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbdet<?= $dta['ident']; ?>" title="Detalles"></i>
                                <?php
                                $mdot->setIdent($dta['ident']);
                                $acc = $mdot->getAllTxD($dta['ident']);
                                $det = $mdot->getOne();
                                modalInfAsg("mcbdet", $dta['ident'], $acc, $det);
                                ?>
                                <i class="fa fa-solid fa-pen-clip iconi" class="btn btn-primary" data-bs-toggle="modal" title="Firmar"></i>
                                <!-- <i class="fa fa-solid fa-envelopes-bulk iconi"></i> -->
                                <i class="fa fa-solid fa-file-pdf iconi"></i>
                            </div>
                        </div>

                    </td>
                    <td style="text-align: left;">
                        <?php if ($dta['estent'] == 1) { ?>
                            <span style="font-size: 1px;opacity: 0;">1</span>
                            <i class="fa fa-solid fa-circle-check fa-2x act" title="Asignado"></i>
                        <?php } else if ($dta['estent'] == 2) { ?>
                            <span style="font-size: 1px;">2</span>
                            <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="Devuelto"></i>
                        <?php } ?>
                    </td>
                    <td tyle="text-align: half;">
                        <span style="font-size: 1px;opacity: 0;"><?= $dta['fecdev']; ?></span>
                        <?php if ($dta['estent'] != 2) { ?>
                            <i class="fa fa-solid fa-arrows-turn-to-dots fa-2x iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbdev<?= $dta['ident']; ?>" title="Devolver"></i>
                            <?php
                            $mdot->setIdent($dta['ident']);
                            $acc = $mdot->getAllTxD($dta['ident']);
                            $det = $mdot->getOne();
                            modalDev("mcbdev", $dta['ident'], $acc, $det, $pg);
                            ?>
                            <!-- <a href="home.php?pg=<?= $pg; ?>&ident=<?= $dta['ident']; ?>&ope=edi&asg=<?= $asg; ?>" title="Editar"> -->
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi"></i>
                            </a>
                        <?php } ?>
                    </td>

                </tr>
        <?php
            }
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Datos persona</th>
            <th>Estado</th>
            <th></th>



        </tr>
    </tfoot>
</table>



<style>
    .custom-combobox1,
    .custom-combobox2-input {
        position: relative;
        display: inline-block;
        width: 100%;
        text-align: left;
    }

    .custom-combobox1-toggle,
    .custom-combobox2-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }

    .custom-combobox1-input,
    .custom-combobox2-input {
        margin: 0;
        padding: 5px 10px;
        width: 100%;
        text-align: left;
        border-radius: 5px;
        border: 1px solid #ced4da;
        background-color: #fff;
    }
</style>