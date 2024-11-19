<?php
require_once('controllers/calm.php');
?>


    <div style="text-align: right;">
    <?php 
        $malm->setIdper($_SESSION['idper']);
        $info = $malm->getInfoAll();
        if ($info) {
            modalnpedper("mnpp", $_SESSION['idper'], "PEDIDOS - ". $info[0]['nomper'],  $info);?>
            <i class="fa-solid fa-list-check fa-2x" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mnpp<?= $_SESSION['idper']; ?>" title="PEDIDOS"></i>
        <?php } ?> 
    </div> 


    <?php if ($_SESSION['idpef'] == 7 OR $_SESSION['idpef'] == 1) { ?>


    <?php if ($datOneAlmF) { ?>
        <?php foreach ($datOneAlmF as $dat) { ?>
    <form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-md-4">

                <label for="ppalm"><strong>Persona:</strong></label>
                <select id="combobox1" name="idper" class="form-control form-select" <?php if ($datOne) echo 'disabled'; else echo 'required';?>>
                    <option value="0"></option>
                    <?php if ($datPer) {
                        foreach ($datPer as $dep) { ?>
                            <option value='<?= $dep['idper']; ?>' <?php if ($datOne && $dep['idper'] == $datOne[0]['idper']) echo " selected "; ?>>
                                <?= $dep['ndper'] . " - " . $dep['nomper'] . "  " . $dep['apeper']; ?>
                            </option>
                    <?php }
                    } ?>
                </select>
                </div>
                <div class="form-group col-md-4">
                <label for="jgalm"><strong>Tipo almuerzo:</strong></label>
                <select name="tipalm" id="tipalm" class="form-control form-select" required>
                    <option value="1" <?php if ($datOne && $datOne[0]['tipalm'] == 1) echo " selected "; ?>>Almuerzo completo</option>
                    <option value="2" <?php if ($datOne && $datOne[0]['tipalm'] == 2) echo " selected "; ?>>Seco</option>
                    <option value="3" <?php if ($datOne && $datOne[0]['tipalm'] == 3) echo " selected "; ?>>Sopa</option>  
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="canalm"><strong>Cantidad:</strong></label>
                <input type="number" value="<?php if ($datOne) echo $datOne[0]['canalm']; ?>"  min="1" max="2" placeholder="   #" required>
            </div>
            <div class="form-group col-md-6">
            <label for="obser"><strong>Observación:</strong></label>
            <textarea class="form-control" type="text" id="obser" name="observ" <?php if ($datOne) echo 'required'; ?>><?php if ($datOne) echo $datOne[0]['obser']; ?></textarea>
        </div>
    </div>
    <div class="form-group col-md-12" id="boxbtn">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Pedir">
        <input type="hidden" name="idalm" value="<?= $dat['idalm'] ?>">
        <input type="hidden" name="idped" value="<?php if ($datOne) echo $datOne[0]['idped']; ?>">
        <input type="hidden" name="ope" value="savePed">

    </div> 
</form> 
<?php }}}?>



    <?php if ($datAllPed){ ?>
        <div class="orden">
                    <div class="texto-animado">
                    <span>G</span><span>E</span><span>N</span><span>I</span><span>A</span><span>L</span><span>,</span><span>Y</span><span>A</span>&nbsp;<span>H</span><span>I</span><span>C</span><span>I</span><span>S</span><span>T</span><span>E</span>&nbsp;<span>T</span><span>U</span>&nbsp;<span>P</span><span>E</span><span>D</span><span>I</span><span>D</span><span>O</span>
                    </div>

    <?php if ($datAllPed){ 
        foreach ($datAllPed as $dta){ ?>
            <div id="eliminar" class="text form-group col-md-12 d-flex justify-content-center align-items-center">
                <a href="home.php?pg=<?= ($pg); ?>&idped=<?= ($dta['idped']); ?>&ope=eli" 
                   onclick="return confirmarEliminar('<?= ($dta['idped']); ?>');">
                    <i class="fa fa-solid fa-trash-can fa-2x iconi"  title="Eliminar"></i>
                </a>
            </div>
        </div>
        <?php }?> 
    


<?php }}elseif ($datOneAlmF) { ?>
    <?php foreach ($datOneAlmF as $dta) { ?>
        <form action="home.php?pg=<?= $pg; ?>" method="post" name="pedido">
        <div class="row">  
            <div class="card"><br>
                <div class="texto-animado">
                    <span>A</span><span>L</span><span>M</span><span>U</span><span>E</span><span>Z</span><span>O</span>&nbsp;<span>D</span><span>E</span><span>L</span>&nbsp;<span>D</span><span>I</span><span>A</span><span>&nbsp;<?= $dta['fecalm']; ?></span>
                    </div>
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
                </div><br>
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
                <div class="form-group col-12">
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
        .orden {
            background-color: rgba(255, 255, 255);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 6px 10px 20px 0 rgba(0, 0, 0, 0.4);
            margin: 0 auto;
            position: relative;
            width: 60%;
	    }   
        .text{
            padding: 10px 20px;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
        }

        .custom-combobox1,
        .custom-combobox2-input {
            position: relative;
            display: inline-block;
            width: 100%;
            text-align: left;
        }
    
        .custom-combobox1-toggle,
        .custom-combobox2-toggle {
            position: absolute;
            top: 0;
            bottom: 0;
            margin-left: -1px;
            padding: 0;
        }
    
        .custom-combobox1-input,
        .custom-combobox2-input {
            margin: 0;
            padding: 5px 10px;
            width: 100%;
            text-align: left;
            border-radius: 5px;
            border: 1px solid #ced4da;
            background-color: #fff;
        }
    
        @media(max-width: 459px) {
        
        .card, .orden{
            width: 90%;
            text-align: center;
        }
        #eliminar{
            width: 40%;
            margin: 0 auto; 
        } 
}   
        .texto-animado {
            font-size: 2rem;
            font-weight: bold;
            color: #073663;
            text-align: center;
        }
    
        .texto-animado span {
            display: inline-block;
            animation: mover-letra 1s ease-in-out infinite;
        }
        @keyframes mover-letra {
          50% { transform: translateY(-10px); }
        }
    
        .texto-animado span:nth-child(odd) { animation-delay: 0.2s; }
        .texto-animado span:nth-child(even) { animation-delay: 0.4s; }
