<!-- formulario 2 -->
<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins" class="forone" enctype="multipart/form-data">
<div class="row">   
    <div class="form-wrapper">     
        <!-- <div class="form-header">
            <h2>Formulario de Evaluación</h2>
            <p>Por favor complete todos los campos.</p>
        </div> -->

        
        <div class="form-section personal-info">
            <h3>Orientación al logro</h3>
            <div class="row">
            <div class="col-md-12">

                    <label for="pre1">¿Cómo calificaría su desempeño?</label>
                    <select name="pre1" id="pre1" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre1']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>

    
                    <label for="pre2">¿Cómo calificaría su desempeño?</label>
                    <select name="pre2" id="pre2" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre2']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                    <label for="pre3">¿Cómo calificaría su desempeño?</label>
                    <select name="pre3" id="pre3" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre3']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                </div>
            </div>
        </div>

        <div class="form-section contact-info">
            <h3>Trabajo en equipo</h3>
            <div class="row">
            <div class="col-md-12">
                    <label for="pre4">¿Cómo calificaría su desempeño?</label>
                    <select name="pre4" id="pre4" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre4']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                    <label for="pre5">¿Cómo calificaría su desempeño?</label>
                    <select name="pre5" id="pre5" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre5']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                    <label for="pre6">¿Cómo calificaría su desempeño?</label>
                    <select name="pre6" id="pre6" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre6']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                </div>
            </div>
        </div>

 
        <div class="form-section evaluation">
            <h3>Actitud de servicio</h3>
            <div class="row">
                <div class="col-md-12">
                    <label for="pre7">¿Cómo calificaría su desempeño?</label>
                    <select name="pre7" id="pre7" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre7']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                    <label for="pre8">¿Cómo calificaría su desempeño?</label>
                    <select name="pre8" id="pre8" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre8']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                    <label for="pre9">¿Cómo calificaría su desempeño?</label>
                    <select name="pre9" id="pre9" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre9']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                </div>
            </div>
        </div>

        <!-- Sección 4: Comentarios -->
        <div class="form-section comments">
            <h3>Atención al detalle</h3>
            <div class="row">
            <div class="col-md-12">
                    <label for="pre10">¿Cómo calificaría su desempeño?</label>
                    <select name="pre10" id="pre10" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre10']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                    <label for="pre11">¿Cómo calificaría su desempeño?</label>
                    <select name="pre11" id="pre11" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre11']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                    <label for="pre12">¿Cómo calificaría su desempeño?</label>
                    <select name="pre12" id="pre12" class="form-control form-select" required>
                    <?php foreach ($datcal as $dte) { ?>
                        <option value="<?= $dte['idval']; ?>" <?php if ($datOne && $dte['idval'] == $datOne[0]['pre12']) echo " selected "; ?>>
                            <?= $dte['nomval']; ?>
                        </option>
                    <?php } ?>
                </select>
                </div>
            </div>
        </div>
        </div>
        <!-- Botón de Enviar -->
        <div class="form-group col-md-12" id="boxbtn">
                <br><br>
                <input class="btn btn-primary" type="submit" value="Registrar">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="tipeva" value="2">
                <input type="hidden" name="idres" value="<?php if ($datOne) echo $datOne[0]['idres']; ?>">
            </div>

    </div>
</form>