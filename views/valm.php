<?php
 require_once ('controllers/calm.php'); ?>

    <div style="text-align: right;">
        <a href="excel/xalm.php" title="Exportar Almuerzos">
            <i class="fa fa-solid fa-file-export fa-2x exp"></i>
        </a>
    </div>


<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="ppalm"><strong>Plato principal:</strong></label>
            <input type="text" name="ppalm" id="ppalm" class="form-control" value="<?php if ($datOne) echo $datOne[0]['ppalm']; ?>" required>

        </div>
        <div class="form-group col-md-4">
            <label for="spalm"><strong>Sopa:</strong></label>
            <input class="form-control" type="text" id="spalm" name="spalm" value="<?php if ($datOne) echo $datOne[0]['spalm']; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="jgalm"><strong>Jugo:</strong></label>
            <input type="text" name="jgalm" id="jgalm" class="form-control" value="<?php if ($datOne) echo $datOne[0]['jgalm']; ?>">
        </div>
    </div>
    <div class="form-group col-md-12" id="boxbtn">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Registrar" id="btns">
        <input type="hidden" name="idalm" value="<?php if ($datOne) echo $datOne[0]['idalm'];?>"> 
        <input type="hidden" name="ope" value="save">
    </div> 
</form> 


<table id="mytable" class="table table-striped" tyle="width:100%">
    <thead>
        <tr>
            <th>Datos</th>
            <th>No. de personas</th>
            <th>Acciones</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) {
            foreach ($datAll as $dta) { ?>
                <tr>
                    <td tyle="text-align: left;">
                        <small>
                        
                        <strong><?= $dta['fecalm']; ?> </strong><br>

                        <strong>Plato principal: </strong> <?= $dta['ppalm']; ?>&#160;
                        <?php if (!empty($dta['spalm'])): ?>
                        <strong>Sopa:</strong> <?=($dta['spalm']); ?>&#160;
                        <?php endif; ?>
                        <?php if (!empty($dta['jgalm'])): ?>
                        <strong>Jugo: </strong> <?= $dta['jgalm']; ?>
                        <?php endif; ?>
                        </small>
                    </td>
                    <td tyle="text-align: half;">
                        <i class="fa-solid fa-rectangle-list fa-2x iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mtlp<?= $dta['idalm']; ?>" title="Detalle almuerzo"></i>              
                        <?php
                        $malm->setIdalm($dta['idalm']);
                        $info = $malm->getAllDatPed();
                        modalnper("mtlp", $dta['idalm'], $dta['fecalm'], $info);?>
                    </td>
                    <td tyle="text-align: right;">
                        
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
            <th>Acciones</th>
        </tr>
        </tr>
    </tfoot>
</table>