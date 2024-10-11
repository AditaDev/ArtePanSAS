<?php
require_once('controllers/cfac.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>
    <div style="text-align: right;">
        <?php if ($_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 12) { ?>
    <i class="fa fa-solid fa-file-import fa-2x imp" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod<?=$pg?>carfac" title="Importar Facturas"></i>
    <?php modalImp("mod", $pg, "Facturas", "carfac", ""); ?>
        
    <?php } ?>

        <a href="excel/xfac.php" title="Exportar Facturas">
    <i class="fa fa-solid fa-file-export fa-2x exp"></i>
        </a>
    </div>


<?php if ($_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 1) { ?>
    <form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nofac"><strong>N° factura:</strong></label>
                <input class="form-control" type="text" id="nofac" name="nofac" value="<?php if ($datOne) echo $datOne[0]['nofac']; ?>" required onkeypress="return solonum(event);">
            </div>
            <div class="form-group col-md-4">
                <label for="confac"><strong>Concepto:</strong></label>
                <input class="form-control" type="text" id="confac" name="confac" value="<?php if ($datOne) echo $datOne[0]['confac']; ?>" required>
            </div>

            <div class="form-group col-md-4 ui-widget">
                <label for="idemp"><strong>Proveedores:</strong></label>
                <select id="combobox1" name="idemp" class="form-control form-select" required>
                <option value="0"></option>
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

<!-- <style>
   .table table-striped{
    background-color: #fff;
   }
   bgcolor="red"
</style> -->
<!-- class=" <?php echo ($row['estfac']==57)?'color-verde':'sin-color' ?>" -->


<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>
                <div class="th-content">
                    <span class="left">Datos factura</span>
                    <span class="center">Detalles</span>
                </div>
            </th>
            <th>Estado</th>
            <?php if ($_SESSION['idpef'] == 4  OR $_SESSION['idpef'] == 12) { ?><th></th><?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) {
            foreach ($datAll as $dta) { ?>
                <tr>
                    <td tyle="text-align: left;"><?= $dta['idfac']; ?></td>
                    <td>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <strong> <?= ($dta['nofac']) .  " - "  . $dta['confac']; ?></strong><br>
                                <small>
                                    <strong>Proveedor: </strong> <?= $dta['razsoem']; ?><br>
                                    <strong>Fecha de vencimiento: </strong><?= $dta['fvfac']; ?><br>
                                </small>
                            </div>
                            <div class="form-group col-md-3">
                            <?php if ($dta['tipfac'] == 14 OR $dta['tipfac'] == 15 OR $dta['tipfac'] == 16)  { ?>
                                <?php if ($dta['numbod'] == NULL)  { ?> 
                                <form action="home.php?pg=<?= $pg; ?>" method="POST" id="numbodega">
                                        <div class="form-group col-md-8">
                                            <label for="numbod"><strong>Bodega</strong></label>
                                            <select name="numbod" id="numbod" class="form-control form-select" onchange="document.getElementById('numbodega').submit();">
                                            <option value="0">Seleccione...</option>
                                                <?php foreach ($datbod as $dte) { ?>
                                                    <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['numbod']) echo " selected "; ?>>
                                                        <?= $dte['nomval']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    
                                    <input type="hidden" name="ope" value="bodega">
                                    <input type="hidden" name="idfac" value="<?=$dta['idfac']; ?>">
                                </form>
                                <?php }} ?>    
                            </div>
                            <div class="form-group col-md-2" style="text-align: left;">
                                <i class="fa fa-solid fa-eye iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbinf<?= $dta['idfac']; ?>" title="Detalles"></i>
                                <?php
                                $mfac->setIdfac($dta['idfac']);
                                $info = $mfac->getOne();
                                modalDet("mcbinf", $dta['idfac'], $dta['nofac'] . "-" . $dta['confac'], $info);
                                if($dta['rutpdf'] && file_exists($dta['rutpdf'])) { ?>
                                <i class="fa fa-solid fa-file-pdf iconi" title='PDF' onclick="pdf('<?php echo $dta['rutpdf']; ?>')"></i>
                                <?php } ?>
                                <?php if ($dta['pnov'] == NULL) { ?>
                                <i class="fa-solid fa-circle-exclamation iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbnov<?= $dta['idfac']; ?>" title="NOVEDAD"></i>
                                <?php
                                    $mfac->setIdfac($dta['idfac']);
                                    $info = $mfac->getOne();
                                    modalNov("mcbnov", $dta['idfac'], $pg, $info, $nmfl);
                                }?>
                                <?php if ($dta['numegr'] == NULL) { ?>                                  
                                <?php if (($_SESSION['idpef'] == 12) OR ($_SESSION['idpef'] == 12)) { ?> 
                                <i class="fa-solid fa-hashtag iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbegre<?= $dta['idfac']; ?>" title="# EGRESO"></i>
                                <?php
                                    $mfac->setIdfac($dta['idfac']);
                                    $info = $mfac->getOne();
                                    modalegre("mcbegre", $dta['idfac'], $pg, $info);
                                }}?>
                                
                            </div>
                    </td>
                    <td tyle="text-align: half;">
                        <?php if ($dta["estfac"] == 48) { ?>
                            <span style="font-size: 1px;opacity: 0;">1</span>
                            <?php if ($_SESSION['idpef'] ==3 AND ($dta['tipfac']==17 || $dta['tipfac']==18)){  ?>
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=49&tipfac=<?= $dta['tipfac']; ?>" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="<?= $dta['est']; ?>"></i> 
                                </a>
                            <?php } elseif ($_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 12 OR $_SESSION['idpef'] == 2 OR $_SESSION['idpef'] == 3) { ?>
                                <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="<?= $dta['est']; ?>"></i>
                            <?php }else{ ?>
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=49&tipfac=<?= $dta['tipfac']; ?>" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="<?= $dta['est']; ?>"></i> 
                                </a>
                            <?php }} elseif ($dta["estfac"] == 49) { ?>
                            <span style="font-size: 1px;opacity: 0;">2</span>
                            <?php if ($_SESSION['idpef'] == 2 OR $_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 7 OR $_SESSION['idpef'] == 8 OR $_SESSION['idpef'] == 9 OR $_SESSION['idpef'] == 10 OR $_SESSION['idpef'] == 11 OR $_SESSION['idpef'] == 12 OR $_SESSION['idpef'] == 13) { ?>
                                <i class="fa fa-solid fa-circle-check fa-2x iconi prv" title="<?= $dta['est']; ?>"></i>
                            <?php } else { ?>  
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=50" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-check fa-2x iconi prv" title="<?= $dta['est']; ?>"></i>
                                </a>
                            <?php } 
                        } elseif ($dta["estfac"] == 50) { ?>
                            <span style="font-size: 1px;opacity: 0;">3</span>
                            <?php if ($_SESSION['idpef'] == 3 OR $_SESSION['idpef'] == 12 OR $_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 13) { ?>
                                <i class="fa fa-solid fa-circle-check fa-2x act" title="<?= $dta['est']; ?>"></i>
                            <?php } else { ?>
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=51" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-check fa-2x act" title="<?= $dta['est']; ?>"></i>
                                </a>
                            <?php }
                        } elseif ($dta["estfac"] == 51) { ?>
                            <span style="font-size: 1px;opacity: 0;">4</span>
                            <?php if ($_SESSION['idpef'] == 4 OR $_SESSION['idpef'] == 3 OR $_SESSION['idpef'] == 2 OR $_SESSION['idpef'] == 13) { ?>
                            <i class="fa fa-solid fa-circle-check fa-2x chulo" title="<?= $dta['est']; ?>"></i>
                        <?php } else { ?>
                                <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=est&estfac=52" onclick="return confirmar('<?= $dta['nofac'] . ' - ' . $dta['confac']; ?>');">
                                    <i class="fa fa-solid fa-circle-check fa-2x chulo" title="<?= $dta['est']; ?>"></i>
                                </a>
                            <?php }
                        } elseif ($dta["estfac"] == 52) { ?>
                            <span style="font-size: 1px;opacity: 0;">4</span>
                            <i class="fa fa-solid fa-circle-check fa-2x pagada" title="<?= $dta['est']; ?>"></i>
                            <?php }
                            if ($_SESSION['idpef'] == 4  OR $_SESSION['idpef'] == 12) { ?>
                    <td class="form-group col-md-1" tyle="text-align: right;">
                                        
                        <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=edi">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi" title="Editar"></i>
                        </a>
                        <a href="home.php?pg=<?= $pg; ?>&idfac=<?= $dta['idfac']; ?>&ope=eli" onclick="return eliminar('<?= $dta['nofac']; ?>');">
                            <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                        </a>
                    </td>
                    <?php } ?>
                </tr>
        <?php }
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>No.</th>
            <th>
                <div class="th-content">
                    <span class="left">Datos factura</span>
                    <span class="center">Detalles</span>
                </div>
            </th>
            <th>Estado</th>
            <?php if ($_SESSION['idpef'] == 4  OR $_SESSION['idpef'] == 12) { ?><th></th><?php } ?>


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
    .th-content {
    position: relative;
    width: 100%;
    }

    .left {
        position: absolute;
        left: 0; /* Alinea el texto a la izquierda */
    }

    .center {
        text-align: right;
        display: block;
        width: 95%; /* Esto asegura que el texto centrado ocupe todo el espacio disponible para centrarse */
    }
</style>

