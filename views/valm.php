<?php
 require_once ('controllers/calm.php'); ?>
 
   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">  

<!-- <body>  
  
<div class="container">  
    <strong>Seleccione los productos:</strong>  
    <select id="multiple-checkboxes" multiple="multiple">  
        <option value="php">PHP</option>  
        <option value="javascript">JavaScript</option>  
        <option value="java">Java</option>  
        <option value="sql">SQL</option>  
        <option value="jquery">Jquery</option>  
        <option value=".net">.Net</option>  
    </select>  
</div>  
  
<script type="text/javascript">  
    $(document).ready(function() {  
        $('#multiple-checkboxes').multiselect();  
    });  
</script>  
  
</body>   -->

<form action="home.php?pg=<?= $pg; ?>" method="POST" id="frmins">
    <div class="row">
        <div class="form-group col-md-6 container">  
            <strong>Seleccione los productos:</strong>  
            <select id="multiple-checkboxes" multiple="multiple">  
                <option value="php">hola</option>  
                <option value="javascript">te</option>  
                <option value="java">amo</option>  
                <option value="sql">mucho</option>  
                <option value="jquery">bay</option>  
                <option value=".net">.Net</option>  
            </select>  
        </div>  
            <script type="text/javascript">  
                    $(document).ready(function() {  
                    $('#multiple-checkboxes').multiselect();  
                    });  
            </script>

    </div>
    <div class="form-group col-md-12" id="boxbtn">
        <br><br>
        <input class="btn btn-primary" type="submit" value="Registrar" id="btns">
        <input type="hidden" name="ope" value="save">
        <input type="hidden" name="idalm" value="<?php if ($datOne) echo $datOne[0]['idalm'];?>">
    </div>
    </div>
</form>

<table id="mytable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Datos</th>
            <th>No. de personas</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($datAll) {
            foreach ($datAll as $dta) { ?>
                <tr>
                    <td>
                        <small>
                            <strong><?= $dta['fecalm']; ?> </strong><br>
                            <strong>Plato principal: </strong><?= $dta['ppalm']; ?><br>
                            <strong>Sopa: </strong> <?= $dta['spalm']; ?><br>
                            <strong>Jugo: </strong> <?= $dta['jgalm']; ?><br>
                                    
                        </small>
                    </td>
                    <td style="text-align: left;">
                    <i class="fa-solid fa-rectangle-list fa-2x iconi" title="Detalle almuerzo"></i>
                        
                       
                    </td>
                    <td style="text-align: right;">
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
            <th></th>
        </tr>
    </tfoot>
</table>