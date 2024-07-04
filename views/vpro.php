<?php
require_once('controllers/cpro.php');
?>

<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nompro"><strong>Nombre:</strong></label>
            <input class="form-control" type="text" id="nompro" name="nompro" value="<?php if ($datOne)
                echo $datOne[0]['nompro']; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="iddom" class="titulo"><strong>Dominio:</strong></label>
            <select name="iddom" id="iddom" class="form form-select">
                <?php if ($datDom) {
                    foreach ($datDom as $ddo) { ?>
                        <option value="<?= $ddo['iddom']; ?>" <?php if ($datOne && $ddo['iddom'] == $datOne[0]['iddom']) echo "selected"; ?>>
                            <?= $ddo['iddom']." - ". $ddo['nomdom']; ?>
                        </option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="form-group col-md-12" id="boxbtn">
            <br>
            <input class="btn btn-primary" type="submit" value="Registrar" id="btns">
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="idpro" value="<?php if ($datOne) echo $datOne[0]['idpro']; ?>">
        </div>
    </div>
</form>

<table id="mytable" class="table table-striped">
    <thead>
        <tr>
            <th>Producto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) {
            foreach ($datAll as $dta) { ?>
                <tr>
                    <td>
                    <strong> <?= $dta['nompro']; ?></strong><br>
                    <strong>Dominio: </strong><?= $dta['nomdom']; ?><br>
                    </td>
                    <td style="text-align: right;">
                        <a href="home.php?pg=<?= $pg; ?>&idpro=<?= $dta['idpro']; ?>&ope=edi">
                            <i class="fa fa-solid fa-pen-to-square fa-2x iconi"  title="Editar"></i>
                        </a>
                        
                            <a href="home.php?pg=<?= $pg; ?>&idpro=<?= $dta['idpro']; ?>&ope=eli" onclick="return eliminar('<?= $dta['nompro']; ?>');">
                                <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Producto</th>
            <th></th>
        </tr>
    </tfoot>
</table>
