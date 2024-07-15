
<?php
require_once('controllers/cped.php');
require_once('controllers/calm.php');
?>

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
    </style>
    
    <?php if ($datAll) {foreach ($datAll as $dta) { ?>
    <div class="tarjeta" tyle= "text-align: center;">
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
            <button type="button"  class="btn btn-primary" title="Pedir">  PEDIR  </button>
</div>



<?php }}?>
