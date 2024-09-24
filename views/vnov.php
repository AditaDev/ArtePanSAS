<?php
require_once('controllers/cnov.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>
        <div class="row">
            <div class="col-12" style="text-align: left;">
                <a href="home.php?pg=110&nov=news" title="Novedades">
                    <i class="fa-solid fa-bullhorn iconi"></i>
                </a>
                <a href="home.php?pg=110&nov=late" title="Llegadas tarde">
                    <i class="fa-solid fa-clock iconi"></i>
                </a>
            </div>
       
<?php if($nov){ if ($_SESSION['idpef'] == 7  OR $_SESSION['idpef'] == 1) { ?>
    <form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins" enctype="multipart/form-data">
        <div class="row">
                <div class="form-group col-md-3">
                <label for="idperg"><strong>Persona:</strong></label>
                <select id="combobox1" name="idperg" class="form-control form-select" <?php if ($datOne) echo 'disabled'; else echo 'required';?>>
                <option value="0"></option>
                        <?php if ($datPer) {
                            foreach ($datPer as $dep) { ?>
                                <option value='<?= $dep['idper']; ?>' <?php if ($datOne && $dep['idper'] == $datOne[0]['perg']) echo " selected "; ?>>
                                    <?= $dep['ndper'] . " - " . $dep['nomper']. " " . $dep['apeper']; ?>
                                </option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <?php if ($nov=="news") { ?>
                    <div class="form-group col-md-3">
                    <label for="tipnov"><strong>Tipo novedad:</strong></label>
                    <select name="tipnov" id="tipnov" class="form-control form-select" required>
                        <?php foreach ($dattip as $dte) { ?>
                            <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['tipnov']) echo " selected "; ?>>
                                <?= $dte['nomval']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <?php } ?>
                <div class="form-group col-md-6">
                    <label for="obsnov"><strong>Observación:</strong></label>
                    <textarea class="form-control" type="text" id="obsnov" name="obsnov" <?php if ($datOne) echo 'required'; ?>><?php if ($datOne) echo $datOne[0]['obsnov']; ?></textarea>
                </div>
                <?php if ($nov=="news") { ?>
                <div class="form-group col-md-3">
                    <label for="fecinov"><strong>Fecha inicial:</strong></label>
                    <input class="form-control" type="date" id="fecinov" name="fecinov" value="<?php if ($datOne) echo $datOne[0]['fecinov']; ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="fecfnov"><strong>Fecha final:</strong></label>
                    <input class="form-control" type="date" id="fecfnov" name="fecfnov" value="<?php if ($datOne) echo $datOne[0]['fecfnov']; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="arcpdf"><strong>Soporte:</strong></label>
                    <input class="form-control" type="file" id="arcpdf" name="arcpdf" accept=".pdf" <?php if (!$datOne); ?>>
                </div>
                <?php } ?>
                <?php if ($nov=="late") { ?>
                <div class="form-group col-md-4">
                    <label for="tini"><strong>Hora estipulada:</strong></label>
                    <input class="form-control" type="time" id="tini" name="tini" value="<?php if ($datOne) echo $datOne[0]['tini']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tfin"><strong>Hora de llegada:</strong></label>
                    <input class="form-control" type="time" id="tfin" name="tfin" value="<?php if ($datOne) echo $datOne[0]['tfin']; ?>" required>
                </div>
                <?php } ?>
                
                
                <div class="form-group col-md-12" id="boxbtn">
                    <!-- <br><br> -->
                    <input class="btn btn-primary" type="submit" value="Registrar">
                    <input type="hidden" name="ope" value="save">
                    <input type="hidden" name="nov" value="<?= $nov?>">
                    <input type="hidden" name="idnov" value="<?php if ($datOne) echo $datOne[0]['idnov']; ?>">
                </div>
        </div>

    </form>
<?php } ?>


<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>Fecha registro</th>
            <th>Datos persona</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) {
            foreach ($datAll as $dta) { ?>
                <tr>
                    <td tyle="text-align: left;"><?= $dta['fecreg']; ?></td>
                    <td>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <strong> <?= ($dta['ndper']) .  " - "  . $dta['nomperg']; ?></strong><br>
                                <small>
                                <?php if ($nov=="late") {?><strong>Observación: </strong> <?= $dta['obsnov']; ?><br> <?php } ?>
                                </small>
                                <small>
                                <?php if ($nov=="news") {?><strong>Tipo novedad: </strong> <?= $dta['tip']; ?><br> <?php } ?>
                                </small>
                            </div>
                            <div class="form-group col-md-2" style="text-align: right;">
                                <i class="fa fa-solid fa-eye iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdetnov<?= $dta['idnov']; ?>" title="Detalles"></i>
                                <?php
                                $mnov->setIdnov($dta['idnov']);
                                $info = $mnov->getOne();
                                modalinfonov("mdetnov", $dta['idnov'], $dta['ndper'] . " - " . $dta['nomperg'], $info, $nov);
                                if ($dta['rutpdf'] && file_exists($dta['rutpdf'])) { ?>
                                    <ul><i class="fa fa-solid fa-file-pdf iconi" onclick="pdf('<?php echo $dta['rutpdf']; ?>')"></i></ul>
                                <?php } ?>
                            </div>
                    </td>
                    <td style="text-align: left;">
                        <?php if ($dta['estnov'] == 52) { ?>
                            <span style="font-size: 1px;opacity: 0;">1</span>
                            <?php if ($_SESSION['idpef'] == 7) { ?>
                                <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="<?= $dta['est']; ?>"></i>
                            <?php } else { ?>
                                <a href="home.php?pg=<?= $pg; ?>&idnov=<?= $dta['idnov']; ?>&ope=est&estnov=54" onclick="return aceptar('<?= $dta['ndper'] . ' - ' . $dta['nomperg']; ?>');">
                                    <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="<?= $dta['est']; ?>"></i>
                                </a>
                            <?php }
                        } else { ?>
                            <span style="font-size: 1px;">2</span>
                            <i class="fa fa-solid fa-circle-check fa-2x act" title="<?= $dta['est']; ?>"></i>
                            </a>
                        <?php } ?>
                    </td>
                    <td tyle="text-align: right;">
                    <?php if ($_SESSION['idpef'] == 7) { ?>
                        <a href="home.php?pg=<?= $pg; ?>&idnov=<?= $dta['idnov']; ?>&ope=edi&nov=<?= $nov?>">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi" title="Editar"></i>
                        </a>
                        <a href="home.php?pg=<?= $pg; ?>&idnov=<?= $dta['idnov']; ?>&ope=eli" onclick="return eliminar('<?= $dta['idnov']; ?>');">
                            <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                        </a>
                    </td>
                </tr>
        <?php }}
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Fecha registro</th>
            <th>Datos persona</th>
            <th>Estado</th>
            <th>Acciones</th>


        </tr>
    </tfoot>
</table>
<?php } ?>
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
