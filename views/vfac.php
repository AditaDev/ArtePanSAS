<?php
require_once('controllers/cfac.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>
<i class="fa fa-solid fa-file-import fa-2x imp" class="btn btn-primary" title="Importar"></i>

<?php if ($_SESSION['idpef'] == 4) { ?>
    <form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins" enctype="multipart/form-data">
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
                    <?php if ($datEmp) {
                        foreach ($datEmp as $dep) { ?>
                            <option value='<?= $dep['idemp']; ?>' <?php if ($datOne && $dep['idemp'] == $datOne[0]['idemp']) echo " selected "; ?>>
                                <?= $dep['nitemp'] . " - " . $dep['razsoem']; ?>
                            </option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="fi"><strong>Fecha emisión:</strong></label>
                <input class="form-control" type="date" id="fefac" name="fefac" value="<?php if ($datOne) echo $datOne[0]['fefac']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="fvfac"><strong>Fecha de vencimiento:</strong></label>
                <input class="form-control" type="date" id="fvfac" name="fvfac" value="<?php if ($datOne) echo $datOne[0]['fvfac']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="forpag"><strong>Forma de pago:</strong></label>
                <select name="forpag" id="forpag" class="form-control form-select" required>
                    <?php foreach ($dattpe as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['forpag']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="tipfac"><strong>Tipo:</strong></label>
                <select name="tipfac" id="tipfac" class="form-control form-select" required>
                    <?php foreach ($dattip as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['tipfac']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="arcpdf"><strong>Pdf:</strong></label>
                <input class="form-control" type="file" id="arcpdf" name="arcpdf" accept=".pdf" <?php if (!$datOne) echo 'required'; ?>>
            </div>
            <div class="form-group col-md-4">
                <label for="arcspt"><strong>Soporte:</strong></label>
                <input class="form-control" type="file" id="arcspt" name="arcspt" accept=".pdf">
            </div>

            <div class="form-group col-md-12" id="boxbtn">
                <br><br>
                <input class="btn btn-primary" type="submit" value="Registrar">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="idfac" value="<?php if ($datOne) echo $datOne[0]['idfac']; ?>">
            </div>
        </div>
        </div>
    </form>
<?php } ?>

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
        <?php if ($datAll) {
            foreach ($datAll as $dta) { ?>
                <tr>
                    <td tyle="text-align: left;"><?= $dta['idfac']; ?></td>
                    <td>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <strong> <?= ($dta['nofac']) .  " - "  . $dta['confac']; ?></strong><br>
                                <small>
                                    <strong>Empresa: </strong> <?= $dta['razsoem']; ?><br>
                                    <strong>Fecha de vencimiento: </strong><?= $dta['fvfac']; ?><br>
                                </small>

                            </div>
                            <div class="form-group col-md-2" style="text-align: right;">
                                <i class="fa fa-solid fa-eye iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbinf<?= $dta['idfac']; ?>" title="Detalles"></i>
                                <?php
                                $mfac->setIdfac($dta['idfac']);
                                $info = $mfac->getOne();
                                modalDet("mcbinf", $dta['idfac'], $dta['nofac'] . "-" . $dta['confac'], $info);
                                if($dta['rutpdf'] && file_exists($dta['rutpdf'])) { ?>
                                <ul><i class="fa fa-solid fa-file-pdf iconi" onclick="pdf('<?php echo $dta['rutpdf']; ?>')"></i></ul>
                                <?php } ?>
                            </div>
                    </td>
                    <td tyle="text-align: half;">
                        <?php if ($dta["estfac"] == 52) { ?>
                            <span style="font-size: 1px;opacity: 0;">1</span>
                            <?php if ($_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 12 OR $_SESSION['idpef'] == 2) { ?>
                                <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="<?= $dta['est']; ?>"></i>
                            <?php } else { ?>
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=53&tipfac=<?= $dta['tipfac']; ?>" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="<?= $dta['est']; ?>"></i> 
                                </a>
                            <?php }
                        } elseif ($dta["estfac"] == 53) { ?>
                            <span style="font-size: 1px;opacity: 0;">2</span>
                            <?php if ($_SESSION['idpef'] == 2 OR $_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 7 OR $_SESSION['idpef'] == 8 OR $_SESSION['idpef'] == 9 OR $_SESSION['idpef'] == 10 OR $_SESSION['idpef'] == 11 OR $_SESSION['idpef'] == 12) { ?>
                                <i class="fa fa-solid fa-circle-check fa-2x iconi prv" title="<?= $dta['est']; ?>"></i>
                            <?php } else { ?>  
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=54" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-check fa-2x iconi prv" title="<?= $dta['est']; ?>"></i>
                                </a>
                            <?php } 
                        } elseif ($dta["estfac"] == 54) { ?>
                            <span style="font-size: 1px;opacity: 0;">3</span>
                            <?php if ($_SESSION['idpef'] == 3 OR $_SESSION['idpef'] == 12 OR $_SESSION['idpef'] == 4) { ?>
                                <i class="fa fa-solid fa-circle-check fa-2x act" title="<?= $dta['est']; ?>"></i>
                            <?php } else { ?>
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=55" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-check fa-2x act" title="<?= $dta['est']; ?>"></i>
                                </a>
                            <?php }
                        } elseif ($dta["estfac"] == 55) { ?>
                            <span style="font-size: 1px;opacity: 0;">4</span>
                            <?php if ($_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 3 OR $_SESSION['idpef'] == 2) { ?>
                            <i class="fa fa-solid fa-circle-check fa-2x chulo" title="<?= $dta['est']; ?>"></i>
                        <?php } else { ?>
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=56" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-check fa-2x chulo" title="<?= $dta['est']; ?>"></i>
                                </a>
                            <?php }
                        } elseif ($dta["estfac"] == 56) { ?>
                            <span style="font-size: 1px;opacity: 0;">4</span>
                            <i class="fa fa-solid fa-circle-check fa-2x pagada" title="<?= $dta['est']; ?>"></i>
                            <?php } ?>
                    <td tyle="text-align: right;">
                    <?php if ($_SESSION['idpef'] == 4) { ?>
                        
                        <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=edi">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi" title="Editar"></i>
                        </a>
                        <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=eli" onclick="return eliminar('<?= $dta['idfac']; ?>');">
                            <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                        </a>
                    </td>
                </tr>
        <?php }}
        } ?>
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

