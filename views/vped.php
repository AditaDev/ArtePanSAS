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
        text-align: center;
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

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    flex-wrap: wrap;
    z-index: 1;
}

.container .card {
    position: relative;
    width: 280px;
    height: 400px;
    margin: 30px;
    box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    border-top: 1px solid rgba(255, 255, 255, 0.5);
    border-left: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(5px);
}

.container .card .content {
    padding: 20px;
    text-align: center;
    transform: translateY(100px);
    opacity: 0;
    transition: 0.5s;
    
}

.container .card:hover .content {
    transform: translateY(0px);
    opacity: 1;
}

.container .card .content a {
    position: relative;
    display: inline-block;
    padding: 8px 20px;
    margin-top: 15px;
    color: #000;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 500;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
} 
.pedido img {
  width: 40px;
  height: 40px;
}
.pedido {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}
body{
    flex-direction: row-reverse;
    align-content: flex-start;
}

</style>


<?php if ($datPed){ ?>


    <img src="img/orders.png" class="pedido">
    
    <?php if ($datAllPed){ ?>
    <?php foreach ($datAllPed as $dta){ ?>
        <div>
            <a href="home.php?pg=<?= ($pg); ?>&idped=<?= ($dta['idped']); ?>&ope=eli" 
               onclick="return confirmarEliminar('<?= ($dta['idped']); ?>');">
                <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
            </a>
        </div>
    <?php }?>




<?php }}else{ if ($datOneAlmF) { ?>
    <div>
        <?php foreach ($datOneAlmF as $dta) { ?>
            <form action="home.php?pg=<?= $pg; ?>" method="post" name="pedido">
                <div class="tarjeta" tyle="text-align: center;">
                    <div class="row">
                        <div  class="titulo">Almuerzo del día</div>
                            <div class="cuerpo">
                                <div class="form-group col-md-11">
                                <strong>Plato principal: </strong> <?= $dta['ppalm']; ?><br>
                                </div>
                                <div class="form-group col-md-12">
                                <?php if (!empty($dta['spalm'])): ?>
                                <strong>Sopa: </strong> <?= $dta['spalm']; ?><br>
                                <?php endif; ?>
                                </div>
                                <div class="form-group col-md-11">
                                <?php if (!empty($dta['jgalm'])): ?>
                                <strong>Jugo: </strong> <?= $dta['jgalm']; ?><br>
                                <?php endif; ?>
                                </div>
                                <div class="form-group col-md-10">
                                <label for="canalm"><strong>Cantidad:</strong></label>
                                <input type="number" value="<?php if ($datOne) echo $datOne[0]['canalm']; ?>" id="canalm" name="canalm" min="1" max="10" placeholder=" #" required>
                                
                                </div>
                                <div class="form-group col-md-12">
                                <label for="sopa"><strong>Sopa:</strong></label>
                                <input type="radio" name="sopa" id="sopa_yes" value="1" <?php if ($datOne && $datOne[0]['sopa'] == 1) echo " checked "; ?>>
                                    <label class="form-check-label" class="form-group col-md-2" for="sopa_yes">
                                    Sí
                                </label>
                                    <input type="radio" name="sopa" id="sopa_no" value="2" <?php if ($datOne && $datOne[0]['sopa'] == 2) echo " checked "; ?>>
                                <label class="form-check-label" class="form-group col-md-2" for="sopa_no">
                                    No
                                </label>
                                </div>
                                <br>
                                <div class="form-group col-md-12">
                                    <strong>Fecha: <?= $dta['fecalm']; ?></strong>
                                </div>
                            </div>
                    </div>
                            <div class="pie" id="boxbtn">
                                <input class="btn btn-primary" type="submit" value="Pedir">
                                <input type="hidden" name="idalm" value="<?= $dta['idalm'] ?>">
                                <input type="hidden" name="idped" value="<?php if ($datOne) echo $datOne[0]['idped']; ?>">
                                <input type="hidden" name="ope" value="savePed">
                            </div>
                </div>
            </form>

        <?php } ?>
    </div>
<?php }} ?>