<?php
require_once('controllers/calm.php');
?>

    <div style="text-align: right;">
    <?php if ($datMod) {
        foreach ($datMod as $dta) { ?>
        <i class="fa-solid fa-list-check fa-2x btn btn-primary"  title="PEDIDOS"></i>

        <?php
        $malm->setIdalm($dta['idalm']);
        $info = $malm->infoPed();
        modalnpedper("mnpp", $dta['idalm'], "PEDIDOS ",  $info);?>
        <?php }
        } ?> 
    </div> 



    <?php if ($datPed){ ?>

        <div class="contenido-login">
    	        <div class="row">
                    <div class="text form-group col-md-10">
                        <h1><strong></strong>Genial, ya hiciste tu pedido</strong></h1>
                    </div>
                

    <?php if ($datAllPed){ ?>
        <?php foreach ($datAllPed as $dta){ ?>
            <div class="text form-group col-md-2">
                <a href="home.php?pg=<?= ($pg); ?>&idped=<?= ($dta['idped']); ?>&ope=eli" 
                   onclick="return confirmarEliminar('<?= ($dta['idped']); ?>');">
                    <i class="fa fa-solid fa-trash-can fa-2x iconi" title="Eliminar"></i>
                </a>
            </div>
        </div>
        <?php }?> 
    


<?php }}elseif ($datOneAlmF) { ?>
    <?php foreach ($datOneAlmF as $dta) { ?>
        <form action="home.php?pg=<?= $pg; ?>" method="post" name="pedido">
        <div class="row">  
            <div class="card"><br>
                    <h4 class="h2"><strong>Almuerzo del día &nbsp; <?= $dta['fecalm']; ?></strong></h4><br>
                <div class="col">
                        <h6><strong>Plato principal: </strong> <?= $dta['ppalm']; ?></h6>
                </div>
                <div class="col">
                    <?php if (!empty($dta['spalm'])): ?>
                        <h6><strong>Sopa: </strong> <?= $dta['spalm']; ?></h6>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <?php if (!empty($dta['jgalm'])): ?>
                        <h6><strong>Jugo: </strong> <?= $dta['jgalm']; ?></h6>
                    <?php endif; ?>
                </div>
            <div class="row">
                <div class="col-5">
                    <label for="canalm"><strong>Cantidad:</strong></label>
                    <input type="number" value="<?php if ($datOne) echo $datOne[0]['canalm']; ?>" id="canalm" name="canalm" min="1" max="2" placeholder="   #" required>
                </div>
                <div class="form-group col-6">  
                    
                        <select name="tipalm" id="tipalm" class="form-control form-select" required>
                            <option value="1" <?php if ($datOne && $datOne[0]['tipalm'] == 1) echo " selected "; ?>>Almuerzo completo</option>
                            <option value="2" <?php if ($datOne && $datOne[0]['tipalm'] == 2) echo " selected "; ?>>Seco</option>
                            <option value="3" <?php if ($datOne && $datOne[0]['tipalm'] == 3) echo " selected "; ?>>Sopa</option>  
                        </select>
                </div>
                <div class="form-group col-6">
                    <label for="obser"><strong>Observación:</strong></label>
                    <textarea class="form-control" type="text" id="obser" name="obser" <?php if ($datOne); ?>><?php if ($datOne) echo $datOne[0]['obser']; ?></textarea>
                </div>
            </div>  
            <div class="col-12">
            <input class="btn btn-primary" type="submit" value="Pedir">
                            <input type="hidden" name="idalm" value="<?= $dta['idalm'] ?>">
                            <input type="hidden" name="idped" value="<?php if ($datOne) echo $datOne[0]['idped']; ?>">
                            <input type="hidden" name="ope" value="savePed">
            </div>
            <br>
            
                
        </div>
    </form>
<?php }}?>

    <style>
        .card {
            border: 4px solid #073663;
            border-radius: 1.5rem;
            width: 40%;
            box-sizing: border-box;
            text-align: center;
            margin: auto;
            background-color: #07366345;
            color: #000;
        }

        .h2 {
            text-shadow:  1px 1px 2px white;
            border-radius: 5rem;
        }
        .imagen{
            width: 300px;  /* Ancho*/
            max-width: 100%; /* Para que la imagen no desborde el contenedor */
            height: auto;
        }
        .contenido-login {
        background-color: rgba(255, 255, 255);
        padding: 40px;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        box-shadow: 6px 10px 20px 0 rgba(0, 0, 0, 0.4);
        margin: 0 auto;
        position: relative;
        width: 50%;
	}   
    .text{
        padding: 10px 20px;
        display: flex;
        align-items: flex-start;
        flex-direction: column;
        flex-wrap: nowrap;
        justify-content: center;
    }
    </style>












