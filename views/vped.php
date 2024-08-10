<?php
require_once('controllers/calm.php');
?>

<style>
    .tarjeta {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 500px;
        text-align: center;
        border: 1px solid lightgray;
        box-shadow: 2px 2px 8px 4px #d3d3d3d1;
        border-radius: 15px;
    }

    .titulo {
        font-size: 28px;
        padding: 10px 20px 0 20px;
    }

    .cuerpo {
        padding: 10px;
    }

    .pie {
        background: #073663;
        border-radius: 0 0 15px 15px;
        padding: 1px;
        text-align: center;
    }

    .pie a {
        text-decoration: none;
        color: white;
    }

    .btn {
        margin-top: 10px;
    }

    #canalm {
        width: 2em;
    }
</style>


<?php if ($datOne) { ?>
    ya pidio hueva
<?php }else{ if ($datOneAlmF) { ?>
    <div>
        <?php foreach ($datOneAlmF as $dta) { ?>
            <form action="home.php?pg=<?= $pg; ?>" method="post" name="pedido">
                <div class="tarjeta" tyle="text-align: center;">
                    <div class="titulo">Almuerzo del día</div>
                    <div class="cuerpo">
                        <div>
                            <strong>Fecha: </strong><?= $dta['fecalm']; ?>
                        </div>
                        <div>
                            <strong>Plato principal: </strong><?= $dta['ppalm']; ?>
                        </div>
                        <div>
                            <strong>Sopa: </strong><?= $dta['spalm']; ?>
                        </div>
                        <div>
                            <strong>Jugo: </strong><?= $dta['jgalm']; ?>
                        </div>
                        <div>
                            <label for="canalm">Cantidad :</label>
                            <input type="number" value="<?php if ($datOne) echo $datOne[0]['canalm']; ?>" id="canalm" name="canalm" min="1" max="10" placeholder=" #" required>
                        </div>
                    </div>
                        <div class="pie" id="boxbtn">
                            <input class="btn btn-primary" type="submit" value="Pedir">
                            <input type="hidden" name="idalm" value="<?= $dta['idalm'] ?>">
                            <input type="hidden" name="idped" value="<?php if ($datOne) echo $datOne[0]['idped']; ?>">
                            <input type="hidden" name="ope" value="savePed">
                        </div>
            </form>

        <?php } ?>
    </div>
<?php }} ?>