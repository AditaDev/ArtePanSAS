
<?php
require_once('controllers/cped.php');
?>

<!-- 
<form name="pedido" action="home.php?pg=<?= $pg; ?>" method="POST">
    <div class="tarj" style="display: block; text-align: center;" class="row">
         <?php if ($datAll) { foreach ($datAll as $dta) { ?>
        <div class="col">
            <div class="tarj">
            <strong>Fecha: </strong><?= $dta['fecalm']; ?><br>
            <strong>Plato principal: </strong><?= $dta['ppalm']; ?><br>
            <strong>Sopa: </strong><?= $dta['spalm']; ?><br>
            <strong>Jugo: </strong><?= $dta['jgalm']; ?><br>

            </div>
            <?php }} ?>
        </div>
        <div style="width: 100%;text-align: center" id="boxbtn";>
            <input type="hidden" name="opera" value="save">
            <br>
            <input type="submit" value="  PEDIR  " class="btn btn-primary" style="width:50%;">
        </div>
        </div>
         
</form> -->
<style>

.tarjeta{
    display: flex;
    flex-direction:column;
    justify-content:space-between;
    width:600px;
    border: 1px solid lightgray;
    box-shadow: 2px 2px 8px 4px #d3d3d3d1;
    border-radius:15px;
}
.titulo{
    font-size: 28px;
    padding: 10px 20px 0 20px;
}
.cuerpo{
    padding: 10px;
}
.pie{
    background: #073663;
    border-radius:0 0 15px 15px;
    padding: 10px;
    text-align:center;
}
.pie a{
    text-decoration: none;
    color: white;
}

<<<<<<< HEAD
    </style>
        <div class="tarjeta" style= "text-align: center;">
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
    </div>
    <div class="pie">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        PEDIR
        </button>
    </div>
    </div>
  </div>
</div>



<?php

       

