<?php
require_once('controllers/cper.php');
?>

<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="nomper"><strong>Nombre:</strong></label>
            <input class="form-control" type="text" id="nomper" name="nomper" value="<?php if ($datOne) echo $datOne[0]['nomper']; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="apeper"><strong>Apellido:</strong></label>
            <input class="form-control" type="text" id="apeper" name="apeper" value="<?php if ($datOne) echo $datOne[0]['apeper']; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="ndper"><strong>N° Documento:</strong></label>
            <input class="form-control" type="text" id="ndper" name="ndper" value="<?php if ($datOne) echo $datOne[0]['ndper']; ?>" onkeypress="return solonum(event);" required>
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
            <label for="apeper"><strong>Correo Electrónico:</strong></label>
            <input class="form-control" type="email" id="emaper" name="emaper" value="<?php if ($datOne) echo $datOne[0]['emaper']; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="apeper"><strong>N° telefono:</strong></label>
            <input class="form-control" type="text" id="telper" name="telper" value="<?php if ($datOne) echo $datOne[0]['telper']; ?>" onkeypress="return solonum(event);" required>
        </div>
        <?php if ($_SESSION['idpef'] != 3) { ?>
            <div class="form-group col-md-4">
                <label for="actper" class="titulo"><strong>Activo:</strong></label>
                <select name="actper" id="actper" class="form-control form-select" required>
                    <option value="1" <?php if ($datOne && $datOne[0]['actper'] == 1) echo " selected "; ?>>Si</option>
                    <option value="2" <?php if ($datOne && $datOne[0]['actper'] == 2) echo " selected "; ?>>No</option>
                </select>
            </div>
        <?php } if (!$datOne && $_SESSION['idpef'] == 5) { ?>
                <div class="form-group col-md-4">
                    <label for="pasper"><strong>Contraseña:</strong></label>
                    <input class="form-control" type="password" id="pasper" name="pasper" required>
                </div>
        <?php } ?>
        <div class="form-group col-md-12" id="boxbtn">
            <br><br>
            <input class="btn btn-primary" type="submit" value="Registrar">
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="idper" value="<?php if ($datOne) echo $datOne[0]['idper']; ?>">
        </div>
    </div>
</form>


<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>Datos personales</th>
            <?php if ($_SESSION['idpef'] != 3) { ?>
                <th>Estado</th>
            <?php } ?>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) { foreach ($datAll as $dta) { ?>
            <tr>
                <td>
                    <BIG><strong> <?= $dta['ndper']; ?> - <?= $dta['nomper']; ?> <?= $dta['apeper']; ?></strong></BIG>
                    <small>
                        <div class="row">
                            <?php if ($dta['emaper']) { ?>
                                <div class="form-group col-md-12">
                                    <strong>Email: </strong> <?= $dta['emaper']; ?>
                                </div>
                            <!-- <?php } if ($dta['']) { ?>
                                <div class="form-group col-md-12">
                                    <strong>Cargo: </strong> <?= $dta['cargo']; ?>
                                </div>
                            <?php } if ($dta['usured']) { ?>
                                <div class="form-group col-md-12">
                                    <strong>Red: </strong> <?= $dta['usured']; ?>
                                </div>
                            <?php } ?>  -->
                        </div>
                    </small>
                </td>
                <?php if ($_SESSION['idpef'] != 3) { ?>
                    <td style="text-align: left;">
                        <?php if ($dta['actper'] == 1) { ?>
                            <span style="font-size: 1px;opacity: 0;">+</span>
                            <a href="home.php?pg=<?= $pg; ?>&idper=<?= $dta['idper']; ?>&actper=2&ope=act" title="Activa">
                                <i class="fa fa-solid fa-circle-check fa-2x act"></i>
                            </a>
                        <?php } else { ?>
                            <span style="font-size: 1px;">--</span>
                            <a href="home.php?pg=<?= $pg; ?>&idper=<?= $dta['idper']; ?>&actper=1&ope=act" title="Inactiva">
                                <i class="fa fa-solid fa-circle-xmark fa-2x desact"></i>
                            </a>
                        <?php } ?>
                <?php } ?>
                <td style="text-align: right;">
                    <a href="home.php?pg=<?= $pg; ?>&idper=<?= $dta['idper']; ?>&ope=edi" title="Editar">
                        <i class="fa fa-solid fa-pen-to-square fa-2x iconi"></i>
                    </a>
                    <?php if ($_SESSION['idpef'] != 3) { ?>
                        <i class="fa fa-solid fa-id-card-clip fa-2x iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcb<?= $dta['idper']; ?>" title="Asignar perfil"></i>
                        <?php
                        $mper->setIdper($dta['idper']);
                        $dga = $mper->getOnePxF();
                        $dm = arrstr($dga);
                        modalCmb("mcb", $dta['idper'], $dta['nomper']." ".$dta['apeper'], $idmod, $pg, $dm);
                        // $pe = $mper->getExPE($dta['idper']);
                        // $pr = $mper->getExPR($dta['idper']);
                        $pf = $mper->getPFxP($dta['idper']);
                        // if ($pe && $pr && $pf && $pe[0]['can'] == 0 && $pr[0]['can'] == 0 && $pf[0]['can'] == 0) { ?>
                            <a href="home.php?pg=<?= $pg; ?>&idper=<?= $dta['idper']; ?>&ope=eli" onclick="return eliminar('<?= $dta['nomper'].' '.$dta['apeper']; ?>');" title="Eliminar">
                                <i class="fa fa-solid fa-trash-can fa-2x iconi"></i>
                            </a>
                    <?php }} ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Datos personales</th>
            <?php if ($pg == 102) { ?>
                <th>Estado</th>
            <?php } ?>
            <th></th>
        </tr>
    </tfoot>
</table>