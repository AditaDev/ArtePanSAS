<?php
require_once('controllers/cdot.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>

<div class="row">
   
        <div class="col-6" style="text-align: right;">
            <i class="fa fa-solid fa-file-import fa-2x imp" title="Importar"></i>
        </div>
    <?php  ?>
</div>

    <form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
        <div class="row">
                <label for="idperrec"><strong>Usuario:</strong></label>
                <select id="combobox1" name="idperrec" class="form-control form-select" <?php if ($datOneA) echo 'disabled'; else echo 'required';?>>
                    <option value="0"></option>
                    <?php if ($datPer) { foreach ($datPer as $dpr) { ?>
                            <option value="<?= $dpr['idper']; ?>" <?php if ($datOneA && $dpr['idper'] == $datOneA[0]['idprec']) echo " selected "; ?>>
                                <?= $dpr['ndper']." - ".$dpr['apeper']." ".$dpr['nomper']; ?>    
                            </option>
                    <?php }} ?>
                </select>
            </div>
                <select id="combobox2" name="idequ" class="form-control form-select" <?php if ($datOneA) echo 'disabled'; else echo 'required';?>>
                    <option value="0"></option>
                    <?php if ($datEqu) { foreach ($datEqu as $deq) { ?>
                            <option value="<?= $deq['idequ']; ?>" <?php if ($datOneA && $deq['idequ'] == $datOneA[0]['idequ']) echo " selected "; ?>>
                                <?= $deq['serialeq']." - ".$deq['marca']." ".$deq['modelo']; ?>    
                            </option>
                    <?php }} ?>
                </select>
            </div>
            <?php ?>
            <div class="form-group col-md-4">
                <label for="fecent"><strong>F. Entrega:</strong></label>
                <input class="form-control" type="date" id="fecent" name="fecent" max=<?php echo $hoy;?> <?php if ($datOneA) echo 'value="'.$datOneA[0]['fecent'].'" disabled'; else echo 'value="'.$hoy.'" required';?>>
            </div>
            <div class="form-group col-md-12"><br></div>
            <?php if($datAcc){ foreach($datAcc as $dac){?>
                <div <?php if($asg=="equ"){ echo 'class="form-group col-md-4"'; } else if($asg=="cel") { echo 'class="form-group col-md-4"'; }?> style="text-align: left !important;">
                    <input type="checkbox" name="idvacc[]" value="<?= $dac['idval'] ?>" <?php if ($datAxE){ foreach($datAxE as $dae){ if($dac['idval'] == $dae['idvacc']) echo " checked ";}} ?>>
                    <label for="idvacc"><strong><?= $dac['nomval'];?></strong></label>
				</div>
            <?php }} ?>
            <div class="form-group col-md-12">
                <br>
                <label for="observ"><strong>Observaciones entrega:</strong></label>
                <textarea class="form-control" type="text" id="observ" name="observ" <?php if ($datOneA) echo 'required';?>><?php if ($datOneA) echo $datOneA[0]['observ']; ?></textarea>
            </div>
            <div class="form-group col-md-12" id="boxbtn">
                <br><br>
                <input class="btn btn-primary" type="submit" value="Registrar">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="asg" value="<?php echo $asg?>">
                <input type="hidden" name="ideqxpr" value="<?php if ($datOneA) echo $datOneA[0]['ideqxpr']; ?>">
            </div>
        </div>
    </form>
    <table id="mytable" class="table table-striped">
        <thead>
            <tr>
                <th>Datos asignados</th>
                <th>Estado</th>
                <?php if($_SESSION['idpef']!=3){ ?><th></th><?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php if ($datAllA) { foreach ($datAllA as $dta) { ?>
                <tr>
                    <td>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <BIG><strong><?= $dta['prec']." - ".$dta['marca']." ".$dta['modelo']; ?></strong></BIG>
                                <small>
                                    <div class="row">
                                        <?php if ($dta['tpe'] && $asg="equ") { ?>
                                            <div class="form-group col-md-6">
                                                <strong>T. Equipo: </strong> <?= $dta['tpe']; ?>
                                            </div>
                                        
                                        <?php } ?>
                                    </div>
                                </small>
                            </div>
                            <div class="form-group col-md-2">
                                <i class="fa fa-solid fa-eye iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbdet<?= $dta['ideqxpr']; ?>" title="Detalles"></i>
                                
                                <i class="fa fa-solid fa-pen-clip iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbfir<?= $dta['ideqxpr']; ?>" title="Firmar"></i>
                                
                                <?php }} ?>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <?php if ($dta['estexp'] == 1) { ?>
                            <span style="font-size: 1px;opacity: 0;">1</span>
                            <i class="fa fa-solid fa-circle-check fa-2x act" title="Asignado"></i>
                        <?php } else if ($dta['estexp'] == 2) { ?>
                            <span style="font-size: 1px;">2</span>
                            <i class="fa fa-solid fa-circle-xmark fa-2x desact" title="Devuelto"></i>
                        <?php } ?>
                    </td>
                    <?php if($_SESSION['idpef']!=3){ ?>
                        <td style="text-align: right;">
                            <span style="font-size: 1px;opacity: 0;"><?= $dta['fecent']; ?></span>
                            <?php if ($dta['estexp'] != 2) { ?>
                                <i class="fa fa-solid fa-arrows-turn-to-dots fa-2x iconi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcbdev<?= $dta['ideqxpr']; ?>" title="Devolver"></i>
                                
                                <a href="home.php?pg=<?= $pg; ?>&ideqxpr=<?= $dta['ideqxpr']; ?>&ope=edi&asg=<?= $asg; ?>" title="Editar">
                                    <i class="fa fa-solid fa-pen-to-square fa-2x iconi"></i>
                                </a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Datos asignados</th>
                <th>Estado</th>
                <?php if($_SESSION['idpef']!=3){ ?><th></th><?php } ?>
            </tr>
        </tfoot>
    </table>
<?php  ?>
<style>
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
</style>