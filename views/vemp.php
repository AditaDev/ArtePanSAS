<?php
include('controllers/cemp.php');
?>

    <div style="text-align: right;">
        <i class="fa fa-solid fa-file-import fa-2x imp" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod<?=$pg?>caremp" title="Importar Empresas"></i>
        <?php modalImp("mod", $pg, "Empresas", "caremp", ""); ?>

        <a href="excel/xemp.php" title="Exportar Empresas">
    <i class="fa fa-solid fa-file-export fa-2x exp"></i>
        </a>
    </div>


<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nitemp"><strong>NIT:</strong></label>
            <input type="text" name="nitemp" id="nitemp" class="form-control" value="<?php if ($datOne) echo $datOne[0]['nitemp']; ?>" <?php if ($datOne) echo $datOne[0]['nitemp']; ?> onkeypress="return solonum(event);" required>
        </div>
        <div class="form-group col-md-6">
            <label for="razsoem"><strong>Razón social:</strong></label>
            <input class="form-control" type="text" id="razsoem" name="razsoem" value="<?php if ($datOne) echo $datOne[0]['razsoem']; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="actemp"><strong>Activa:</strong></label>
            <select name="actemp" id="actemp" class="form-control form-select">
                <option value="1" <?php if ($datOne && $datOne[0]['actemp'] == 1) echo " selected "; ?>>Si</option>
                <option value="2" <?php if ($datOne && $datOne[0]['actemp'] == 2) echo " selected "; ?>>No</option>
            </select>
        </div>
    </div>
    <div class="form-group col-md-12" id="boxbtn">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Registrar" id="btns">
        <input type="hidden" name="ope" value="save">
        <input type="hidden" name="idemp" value="<?php if ($datOne) echo $datOne[0]['idemp']; ?>">
    </div>
    </div>
</form>

<table id="mytable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Datos</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($datALL) {
            foreach ($datALL as $dta) { ?>
                <tr>
                    <td>
                        <small>
                            <strong><?= $dta['razsoem']; ?> </strong>
                            <br> NIT: <?= $dta['nitemp']; ?>              
                        </small>
                    </td>
                    <td style="text-align: left;">
                        <?php if ($dta['actemp'] == 1) { ?>
                            <a href="home.php?pg=<?= $pg; ?>&idemp=<?= $dta['idemp']; ?>&ope=act&actemp=2" title="Activo">
                                <i class="fa fa-solid fa-circle-check fa-2x act"></i>
                            </a>
                        <?php } else { ?>
                            <a href="home.php?pg=<?= $pg; ?>&idemp=<?= $dta['idemp']; ?>&ope=act&actemp=1" title="Desactivo">
                                <i class="fa fa-solid fa-circle-xmark fa-2x desact"></i>
                            </a>
                        <?php } ?>
                    </td>
                    <td style="text-align: right;">
                        <a href="home.php?pg=<?= $pg; ?>&idemp=<?= $dta['idemp']; ?>&ope=edi" title="Editar">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi"></i>
                        </a>
                        <a href="home.php?pg=<?= $pg; ?>&idemp=<?= $dta['idemp']; ?>&ope=eli" onclick="return eliminar ('<?= $dta['idemp']; ?>');" title="Eliminar">
                            <i class="fa fa-solid fa-trash-can fa-2x iconi"></i>
                        </a>
                        
                    </td>
                </tr>
        <?php }} ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Datos</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </tfoot>
</table>