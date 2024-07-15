<?php
 require_once ('controllers/calm.php'); ?>


<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="ppalm"><strong>Plato principal:</strong></label>
            <input type="text" name="ppalm" id="ppalm" class="form-control" value="<?php if ($datOne) echo $datOne[0]['ppalm']; ?>" <?php if ($datOne) echo $datOne[0]['ppalm']; ?> required>
        </div>
        <div class="form-group col-md-4">
            <label for="spalm"><strong>Sopa:</strong></label>
            <input class="form-control" type="text" id="spalm" name="spalm" value="<?php if ($datOne) echo $datOne[0]['spalm']; ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="jgalm"><strong>Jugo:</strong></label>
            <input type="text" name="jgalm" id="jgalm" class="form-control" value="<?php if ($datOne) echo $datOne[0]['jgalm']; ?>" <?php if ($datOne) echo $datOne[0]['jgalm']; ?> required>
        </div>
    </div>
    <div class="form-group col-md-12" id="boxbtn">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Registrar" id="btns">
        <input type="hidden" name="ope" value="save">
        <input type="hidden" name="idalm" value="<?php if ($datOne) echo $datOne[0]['idalm'];?>">
    </div>
    </div>
</form>

<table id="mytable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Datos</th>
            <th>No. de personas</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) {
            foreach ($datAll as $dta) { ?>
                <tr>
                    <td>
                        <small>
                            <strong><?= $dta['fecalm']; ?> </strong><br>
                            <strong>Plato principal: </strong><?= $dta['ppalm']; ?><br>
                            <strong>Sopa: </strong> <?= $dta['spalm']; ?><br>
                            <strong>Jugo: </strong> <?= $dta['jgalm']; ?><br>

                        </small>
                    </td>
                    <td style="text-align: left;">
                    <i class="fa-solid fa-rectangle-list fa-2x iconi" title="Detalle almuerzo"></i>


                    </td>
                    <td style="text-align: right;">
                        <a href="home.php?pg=<?= $pg; ?>&idalm=<?= $dta['idalm']; ?>&ope=edi" title="Editar">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi"></i>
                        </a>
                        <a href="home.php?pg=<?= $pg; ?>&idalm=<?= $dta['idalm']; ?>&ope=eli" onclick="return eliminar ('<?= $dta['idalm']; ?>');">
                            <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                        </a>
                    </td>
                </tr>
        <?php }} ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Datos</th>
            <th>No. de personas</th>
            <th></th>
        </tr>
    </tfoot>
</table>