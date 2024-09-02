<?php
// require_once("models/mper.php");

//------------Titulos-----------
function titulo($ico, $tit, $mos, $pg)
{
	$txt = '';
	$txt .= '<div class="titu">';
		$txt .= '<div class="titaju">';
			$txt .= '<i class="' . $ico . '"></i>';
			$txt .= ' ' . $tit;
			$txt .= '<hr class="hrtitu">';
		$txt .= '</div>';
		if ($mos == 1 && $pg!=62 and $pg!=63) {
			$txt .= '<div class="titaju" style="float: right;">';
				$txt .= '<i class="fa-solid fa-circle-plus" id="mas" onclick="ocul(' . $mos . ',1);"></i>';
				$txt .= '<i class="fa-solid fa-circle-minus" id="menos" onclick="ocul(' . $mos . ');"></i>';
			$txt .= '</div>';
		}
	$txt .= '</div>';
	echo $txt;
}

//------------Errores try-catch-----------
function ManejoError($e)
{
	if (strpos($e->getMessage(), '1451')) {
		echo '<script>err("No se puede eliminar este registro. Por que se encuentra relacionado en otra opción.");</script>';
	} elseif (strpos($e->getMessage(), '1062')) {
		echo '<script>err("Registro duplicado. Intente nuevamente con otro número de identificación ó comuníquese con el administrador del sistema.");</script>';
	} else {
		echo '<script>err("Se generó un error comuníquese con el administrador del sistema.");</script>';
	}
}
//------------Modal vpef, pagxpef-----------
function modalChk($nm, $id, $tit, $mt, $pg, $dms)
{
	$txt = '';
	$txt .= '<div class="modal fade" id="' . $nm . $id . '" tabindex="-1" aria-labelledby="" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<div class="modal-content">';
				$txt .= '<div class="modal-header">';
					$txt .= '<h1 class="modal-title fs-5" id="" style="color: #000;font-weight: bold !important;"><strong>Páginas - ' . $tit . '</strong></h1>';
					$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
				$txt .= '</div>';
				$txt .= '<form action="home.php?pg=' . $pg . '" method="POST">';
					$txt .= '<div class="modal-body">';
						$txt .= '<input type="hidden" value="' . $id . '" name="idpef">';
						$txt .= '<div class="row">';
							if ($mt) { foreach ($mt as $tm) {
									$txt .= '<div class="form-group col-md-6" style="text-align: left !important;">';
										$pos = strpos($dms, $tm['idpag']);
										$txt .= '<input type="checkbox" name="chk[]" value="' . $tm['idpag'] . '"';
										if ($pos > -1) $txt .= " checked ";
										$txt .= '> ';
										$txt .= $tm['nompag'] . " ";
										$txt .= '<i class="' . $tm['icono'] . '" style="color: #000;"></i>';
									$txt .= '</div>';
							}}
						$txt .= '</div>';
					$txt .= '</div>';
					$txt .= '<div class="modal-footer">';
						$txt .= '<input type="hidden" value="savepxp" name="ope">';
						$txt .= '<input type="submit" class="btn btn-primary btnmd" value="Guardar">';
						$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
					$txt .= '</div>';
				$txt .= '</form>';
			$txt .= '</div>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}

//------------Modal vdot, firma-----------
function modalFir($nm, $id, $det, $pg) {
    $prs = NULL;
    $est = NULL;
    $txt = '';
    $txt .= '<div class="modal fade" id="' . $nm . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
        $txt .= '<div class="modal-dialog">';
            $txt .= '<form id="signature-form' . $id . '" action="home.php?pg=' . $pg .'" method="POST">';
                $txt .= '<div class="modal-content">';
                    $txt .= '<div class="modal-header">';
                        $txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>';
                        if (!$det[0]['firpent']) {
                            $txt .= $det[0]['nomprec'];
                            $est = 1;
                            $prs = "asg";
                        } elseif ($det[0]['firpent']) {
                            $txt .= $det[0]['nompentd'];
                            $est = "2";
                            $prs = "dev";
                        }
                        $txt .= '</strong></h1>';
                        $txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    $txt .= '</div>';
                    $txt .= '<div class="modal-body" style="text-align: left;">';
                        $txt .= '<div class="fir" style="text-align: center;">';
                            $txt .= '<canvas id="signature-pad' . $id . '"></canvas>';
                        $txt .= '</div>';
                        $txt .= '<div style="text-align: left;">';
                            $txt .= '<small><small><br>*Al firmar, acepto la entrega de la dotación anteriormente detallada. Me comprometo a su correcto uso y a seguir las políticas de la empresa en cuanto al cuidado del mismo. Reconozco que soy responsable de esta dotación.</small></small>';
                        $txt .= '</div>';
                    $txt .= '</div>';
                    $txt .= '<div class="modal-footer">';
                        $txt .= '<input type="hidden" name="ident" value="' . $det[0]['ident'] . '">';
                        $txt .= '<input type="hidden" name="nomfir" value="' . ($det[0]['firpent'] ? $det[0]['nompentd'] : $det[0]['nomprec']) . '">';
                        $txt .= '<input type="hidden" name="prs" value="' . $prs . '">';
                        $txt .= '<input type="hidden" name="est" value="' . $est . '">';
                        $txt .= '<input type="hidden" name="ope" value="firmar">';
                        $txt .= '<input type="hidden" name="firma" id="firma-input' . $id . '">';
                        $txt .= '<button type="button" id="save-button' . $id . '" class="btn btn-primary btnmd">Guardar</button>';
                        $txt .= '<button type="button" id="clear-button' . $id . '" class="btn btn-primary btnmd">Limpiar</button>';
                        $txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
                    $txt .= '</div>';
                $txt .= '</div>';
            $txt .= '</form>';
        $txt .= '</div>';
    $txt .= '</div>';
    $txt .= '<style>
                .fir {
                    border: 1px solid #4F4F4F;
                    border-radius: 3px;
                    width: 100%;
                    height: 200px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                #signature-pad' . $id . ' {
                    border-bottom: 1px solid #000;
                    width: 80%;
                    height: 170px;
                }
            </style>';
    $txt .= '<script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#' . $nm . $id . '").on("shown.bs.modal", function () {
                const canvas = document.getElementById("signature-pad' . $id . '");
                const context = canvas.getContext("2d");
				context.lineWidth = 2;
                const signatureInput = document.getElementById("firma-input' . $id . '");
                const clearButton = document.getElementById("clear-button' . $id . '");
                const saveButton = document.getElementById("save-button' . $id . '");
                let drawing = false;

                const getMousePos = (canvas, evt) => {
                    const rect = canvas.getBoundingClientRect();
                    return {
                        x: (evt.clientX - rect.left) * (canvas.width / rect.width),
                        y: (evt.clientY - rect.top) * (canvas.height / rect.height)
                    };
                };

                const getTouchPos = (canvas, evt) => {
                    const rect = canvas.getBoundingClientRect();
                    return {
                        x: (evt.touches[0].clientX - rect.left) * (canvas.width / rect.width),
                        y: (evt.touches[0].clientY - rect.top) * (canvas.height / rect.height)
                    };
                };

                const draw = (pos) => {
                    if (drawing) {
                        context.lineTo(pos.x, pos.y);
                        context.stroke();
                    }
                };

                const startDrawing = (pos) => {
                    drawing = true;
                    context.beginPath();
                    context.moveTo(pos.x, pos.y);
                };

                const stopDrawing = () => {
                    drawing = false;
                    context.closePath();
                };

                canvas.addEventListener("mousedown", function(e) {
                    startDrawing(getMousePos(canvas, e));
                });

                canvas.addEventListener("mousemove", function(e) {
                    if (drawing) {
                        draw(getMousePos(canvas, e));
                    }
                });

                canvas.addEventListener("mouseup", stopDrawing);
                document.addEventListener("mouseup", stopDrawing);

                canvas.addEventListener("touchstart", function(e) {
                    e.preventDefault();
                    startDrawing(getTouchPos(canvas, e));
                });

                canvas.addEventListener("touchmove", function(e) {
                    e.preventDefault();
                    draw(getTouchPos(canvas, e));
                });

                canvas.addEventListener("touchend", stopDrawing);
                canvas.addEventListener("touchcancel", stopDrawing);

                clearButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    context.clearRect(0, 0, canvas.width, canvas.height);
                });

                saveButton.addEventListener("click", function(event) {
                    if (context.getImageData(0, 0, canvas.width, canvas.height).data.every(pixel => pixel === 0)) {
                        alert("Por favor, dibuja tu firma.");
                        event.preventDefault();
                    } else {
                        const dataURL = canvas.toDataURL("image/png");
                        signatureInput.value = dataURL;
                        document.getElementById("signature-form' . $id . '").submit();
                    }
                });

                $("#' . $nm . $id . '").on("hidden.bs.modal", function () {
                    context.clearRect(0, 0, canvas.width, canvas.height);
                });
            });
        });
    </script>';
    echo $txt;
}



//-------------Modal estado de novedad y factura-----------
function modalNov($nm, $id, $pg, $info, $nmfl){
	$hoy = date("Y-m-d");
	$txt = '';
	$txt .= '<div class="modal fade" id="'.$nm.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<form action="home.php?pg=' . $pg . '" method="POST">';
				$txt .= '<div class="modal-content">';
					$txt .= '<div class="modal-header">';
						$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Factura en novedad</strong></h1>';
						$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>';
					$txt .= '</div>';
					$txt .= '<div class="modal-body" style="margin: 0px 25px; text-align: left;">';
						$txt .= '<div class="row">';
						$txt .= '<div class="modal-body" style="margin: 0px 25px;">';
						$txt .= '<div class="row"';
							$txt .= '<div">';
								$txt .= '<table>';
									$txt .= '<tr><td><strong>Empresa: </strong></td><td class="inffac">'.$info[0]['razsoem'].'</td></tr>';	
									$txt .= '<tr><td><strong>Fecha de emisión: </strong></td><td class="inffac">'.$info[0]['fefac'].'</td></tr>';
									$txt .= '<tr><td><strong>Fecha de vencimiento: </strong></td><td class="inffac">'.$info[0]['fvfac'].'</td></tr>';
									$txt .= '<tr><td><strong>Forma de pago: </strong></td><td class="inffac">'.$info[0]['fpag'].'</td></tr>';
									$txt .= '<tr><td><strong>Tipo: </strong></td><td class="inffac">'.$info[0]['tip'].'</td></tr>';
									$txt .= '<tr><td><strong><hr>Registro: </strong></td><td class="inffac"><br><hr>'.$info[0]['nompcre'].'<br>' .$info[0]['fifac'].'</td></tr>';
									if($info[0]['prev'])$txt .= '<tr><td><strong>Primer revisión: </strong></td><td class="inffac">'.$info[0]['nomprev'].'<br>'.$info[0]['fprfac'].'</td></tr>';
									if($info[0]['papr'])$txt .= '<tr><td><strong>Aprobada: </strong></td><td class="inffac">'.$info[0]['nompapr'].'<br>'.$info[0]['faprfac'].'</td></tr>';
									if($info[0]['pent'])$txt .= '<tr><td><strong>Entregada: </strong></td><td class="inffac">'.$info[0]['nompent'].'<br>'.$info[0]['fffac'].'</td></tr>';
									if($info[0]['ppag'])$txt .= '<tr><td><strong>Pagada: </strong></td><td class="inffac">'.$info[0]['nomppag'].'<br>'.$info[0]['fpagfac'].'</td></tr>';
								$txt .= '</table>';
								$txt .= '<strong><br>Novedad:</strong><hr>';
							$txt .= '<div class="form-group col-md-6">';
								$txt .= '<label for="fnov" class="titulo"><strong>Fecha aviso: </strong></label>';
								$txt .= '<input class="form-control" max='.$nmfl.' type="datetime-local" id="fnov" name="fnov" value="'.$nmfl.'" required>';
							$txt .= '</div>';
							$txt .= '<div class="form-group col-md-12">';
								$txt .= '<label for="obsnov" class="titulo"><strong>Observaciones: </strong></label>';
								$txt .= '<textarea class="form-control" type="text" id="obsnov" name="obsnov" required></textarea>';
							$txt .= '</div>';
						$txt .= '</div>';
					$txt .= '</div>';
							$txt .= '</div>';
						$txt .= '</div>';
					$txt .= '<br><div class="modal-footer">';
						$txt .= '<input type="hidden" value="'.$info[0]['pnov'].'">';
						$txt .= '<input type="hidden" value="'.$info[0]['idfac'].'" name="idfac">';
						$txt .= '<input type="hidden" value="nov" name="ope">';
						$txt .= '<button type="submit" class="btn btn-primary btnmd">Guardar</button>';	
						$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
					$txt .= '</div>';
				$txt .= '</div>';
			$txt .= '</form>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}


//------------Modal vasg, devolucion-----------
function modalDev($nm, $id, $acc, $det, $pg, $nmfl){
	$hoy = date("Y-m-d");
	$txt = '';
	$txt .= '<div class="modal fade" id="'.$nm.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<form action="home.php?pg=' . $pg . '" method="POST">';
				$txt .= '<div class="modal-content">';
					$txt .= '<div class="modal-header">';
						$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Datos Asignación</strong></h1>';
						$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>';
					$txt .= '</div>';
					$txt .= '<div class="modal-body" style="margin: 0px 25px; text-align: left;">';
						$txt .= '<div class="row">';
							$txt .= '<strong>Entrega:</strong><hr>';
							$txt .= '<div class="form-group col-md-4"><strong>Persona:</strong></div>';
							$txt .= '<div class="form-group col-md-8">'.$det[0]['nompent'].' - '.$det[0]['area'].'</div>';
							if($acc){
								$txt .= '<strong><br>Elementos:</strong><hr>';
								foreach($acc AS $ac){
									$txt .= '<div class="form-group col-md-6">- '.$ac['nomvdot'].'</div>';
									$txt .= '<div class="form-group col-md-6">- '.$ac['nomvtal'].'</div>';
								}}
							$txt .= '<strong><br>Devolución:</strong><hr>';
							$txt .= '<div class="form-group col-md-6">';
								$txt .= '<label for="fecdev" class="titulo"><strong>F. Devolución: </strong></label>';
								$txt .= '<input class="form-control" max='.$nmfl.' type="datetime-local" id="fecdev" name="fecdev" value="'.$nmfl.'" required>';
							$txt .= '</div>';
							$txt .= '<div class="form-group col-md-12">';
								$txt .= '<label for="observd" class="titulo"><strong>Observaciones: </strong></label>';
								$txt .= '<textarea class="form-control" type="text" id="observd" name="observd" required></textarea>';
							$txt .= '</div>';
						$txt .= '</div>';
					$txt .= '</div>';
					$txt .= '<br><div class="modal-footer">';
						$txt .= '<input type="hidden" value="'.$det[0]['prec'].'" name="idperentd">';
						$txt .= '<input type="hidden" value="'.$det[0]['ident'].'" name="ident">';
						$txt .= '<input type="hidden" value="dev" name="ope">';
						$txt .= '<input type="hidden" value="2" name="estent">';
						$txt .= '<button type="submit" class="btn btn-primary btnmd">Guardar</button>';	
						$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
					$txt .= '</div>';
				$txt .= '</div>';
			$txt .= '</form>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}

//modal info dotacion
function modalInfAsg($nm, $id, $acc, $det, $cxc){		
	$txt = '';
	$txt .= '<div class="modal fade" id="' . $nm . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<div class="modal-content">';
				$txt .= '<div class="modal-header">';
					$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>'.$det[0]['fecent']." - ".$det[0]['nomprec'].' - '.$det[0]['area'].'</strong></h1>';
					$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>';
				$txt .= '</div>';
				$txt .= '<div class="modal-body" style="margin: 0px 25px;">';
					$txt .= '<div class="row">';
						if($acc){
							$txt .= '<big><strong>Elementos</strong></big><hr>';
							foreach($acc AS $ac){
								$txt .= '<div class="form-group col-md-6"><strong>+</strong> '.$ac['nomvdot'].'</div>';
								$txt .= '<div class="form-group col-md-6"><strong>+</strong> '.$ac['nomvtal'].'</div>';
							}}

						if($cxc){
							$txt .= '<big><strong>Horario de camiseta: </strong></big><hr>';
							foreach($cxc AS $cc){
								$txt .= '<div class="form-group col-md-6"><strong></strong> '.$cc['nomvdia'].'</div>';
								$txt .= '<div class="form-group col-md-6"><strong>-</strong> '.$cc['nomvcol'].'</div>';
								}}

						$txt .= '<big><br><strong>Asignación</strong></big><hr>';
						$txt .= '<div class="form-group col-md-4"><strong>Entrega: </strong></div>';
						$txt .= '<div class="form-group col-md-8">'.$det[0]["nompent"].'</div>';
						$txt .= '<div class="form-group col-md-4"><strong>Recibe: </strong></div>';
						$txt .= '<div class="form-group col-md-8">'.$det[0]["nomprec"].'</div>';
						if($det[0]["observ"]) $txt .= '<div class="form-group col-md-12"><br><strong>Observación: </strong><br>'.$det[0]["observ"].'</div>';
						if($det[0]["pentd"] && $det[0]["precd"]){
							$txt .= '<big><br><strong>Devolución</strong></big><hr>';
							$txt .= '<div class="form-group col-md-4"><strong>Entrega: </strong></div>';
							$txt .= '<div class="form-group col-md-8">'.$det[0]["nompentd"].'</div>';
							$txt .= '<div class="form-group col-md-4"><strong>Recibe: </strong></div>';
							$txt .= '<div class="form-group col-md-8">'.$det[0]["nomprecd"].'</div>';
							if($det[0]["observd"]) $txt .= '<div class="form-group col-md-12"><br><strong>Observación: </strong><br>'.$det[0]["observd"].'</div>';
						}
					$txt .= '</div>';
				$txt .= '</div>';
				$txt .= '<br><div class="modal-footer">';
					$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
				$txt .= '</div>';
			$txt .= '</div>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}

function modalCmb($nm, $id, $tit, $idmod, $pg, $dms)
{
	$mper = new Mper();
	$txt = '';
	$txt .= '<div class="modal fade" id="' . $nm . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<form action="home.php?pg=' . $pg . '" method="POST">';
				$txt .= '<div class="modal-content">';
					$txt .= '<div class="modal-header">';
						$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Perfiles - ' . $tit . '</strong></h1>';
						$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
					$txt .= '</div>';
					$txt .= '<div class="modal-body">';
						$txt .= '<input type="hidden" value="' . $id . '" name="idper">';
						$txt .= '<div class="row">';
							if ($idmod) { foreach ($idmod as $dt) {
								$dtpg = $mper->getOnePef($dt['idmod']);
								$txt .= '<div class="form-group col-md-6" style="text-align: left;">';
									$txt .= '<label for="idpef" class="titulo"><strong>' . $dt['nommod'] . ':</strong></label>';
									$txt .= '<input type="hidden" name="idmod[]" value="' . $dt['idmod'] . '">';
									$txt .= '<select name="idpef[]" id="idpef" class="form form-select">';
										$txt .= '<option value="0">Sin perfil</option>';
											if ($dtpg){ foreach ($dtpg as $td) {
												$pos = strpos($dms, $td['idpef']);
												$txt .= '<option value="' . $td['idpef'] . '"';
												if ($pos > -1) $txt .= " selected ";
												$txt .= '>' . $td['nompef'] . '</option>';
											}}
									$txt .= '</select>';
								$txt .= '</div>';
							}}
						$txt .= '</div>';
					$txt .= '</div>';
					$txt .= '<div class="modal-footer">';
						$txt .= '<input type="hidden" value="savepxf" name="ope">';
						$txt .= '<button type="submit" class="btn btn-primary btnmd">Guardar</button>';
						$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
					$txt .= '</div>';
				$txt .= '</div>';
			$txt .= '</form>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}



//------------Modal vfac, info facturas-----------
function modalDet($nom, $id, $titulo, $info){
	$txt = '';
	$txt .= '<div class="modal fade" id="' . $nom . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<div class="modal-content">';
				$txt .= '<div class="modal-header">';
					$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>'.$titulo.'</strong></h1>';
					$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>';
				$txt .= '</div>';
				$txt .= '<div class="modal-body" style="margin: 0px 25px;">';
				$txt .= '<div class="row"';
					$txt .= '<div">';
						$txt .= '<table>';
							$txt .= '<tr><td><strong>Empresa: </strong></td><td class="inffac">'.$info[0]['razsoem'].'</td></tr>';	
							$txt .= '<tr><td><strong>Fecha de emisión: </strong></td><td class="inffac">'.$info[0]['fefac'].'</td></tr>';
							$txt .= '<tr><td><strong>Fecha de vencimiento: </strong></td><td class="inffac">'.$info[0]['fvfac'].'</td></tr>';
							$txt .= '<tr><td><strong>Forma de pago: </strong></td><td class="inffac">'.$info[0]['fpag'].'</td></tr>';
							$txt .= '<tr><td><strong>Tipo: </strong></td><td class="inffac">'.$info[0]['tip'].'</td></tr>';
							$txt .= '<tr><td><strong><hr>Registro: </strong></td><td class="inffac"><br><hr>'.$info[0]['nompcre'].'<br>' .$info[0]['fifac'].'</td></tr>';
							if($info[0]['prev'])$txt .= '<tr><td><strong>Primer revisión: </strong></td><td class="inffac">'.$info[0]['nomprev'].'<br>'.$info[0]['fprfac'].'</td></tr>';
							if($info[0]['papr'])$txt .= '<tr><td><strong>Aprobada: </strong></td><td class="inffac">'.$info[0]['nompapr'].'<br>'.$info[0]['faprfac'].'</td></tr>';
							if($info[0]['pent'])$txt .= '<tr><td><strong>Entregada: </strong></td><td class="inffac">'.$info[0]['nompent'].'<br>'.$info[0]['fffac'].'</td></tr>';
							if($info[0]['ppag'])$txt .= '<tr><td><strong>Pagada: </strong></td><td class="inffac">'.$info[0]['nomppag'].'<br>'.$info[0]['fpagfac'].'</td></tr>';
							$txt .= '<tr><td><hr></td><td><hr>';
							if($info[0]['pnov']){
							$txt .= '<tr><td style="text-align: right;"><strong>Novedad</strong></td><td><br><br>';
							$txt .= '<tr><td><strong>Aviso:</strong></td><td class="inffac">'.$info[0]['nompnov'].'</td></tr>';
							$txt .= '<tr><td><strong>Fecha:</strong></td><td class="inffac">'.$info[0]['fnov'].'</td></tr>';
							$txt .= '<tr><td><strong>Observación: </td><td class="inffac">'.$info[0]['obsnov'].'</td><td class="inffac"></td></tr>';
							}
						$txt .= '</table>';
					$txt .= '</div>';
				$txt .= '</div>';
				$txt .= '<div class="modal-footer">';
					$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
				$txt .= '</div>';
			$txt .= '</div>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}

//modal numero de personas
function modalnper($nom, $id, $titulo, $info){
	$txt = '';
	$txt .= '<div class="modal fade" id="' . $nom . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<div class="modal-content">';
				$txt .= '<div class="modal-header">';
					$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>'.$titulo.'</strong></h1>';
					$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>';
				$txt .= '</div>';
				$txt .= '<div class="modal-body row" style="margin: 0px 25px;">';
					if($info){ foreach($info AS $if)
						$txt .= '<div class="form-group col-md-6" style="text-align: left;">'.$if['nomper'].' ('.$if['canalm'].')</div>'; 
					}
				$txt .= '</div>';
				$txt .= '<div class="modal-footer">';
					$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
				$txt .= '</div>';
			$txt .= '</div>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}

//modal info novedad

function modalinfonov($nom, $id, $titulo, $info){
	$txt = '';
	$txt .= '<div class="modal fade" id="' . $nom . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
		$txt .= '<div class="modal-dialog">';
			$txt .= '<div class="modal-content">';
				$txt .= '<div class="modal-header">';
					$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>'.$titulo.'</strong></h1>';
					$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>';
				$txt .= '</div>';
				$txt .= '<div class="modal-body" style="margin: 0px 25px;">';
				$txt .= '<div class="row"';
					$txt .= '<div">';
						$txt .= '<table>';
							$txt .= '<tr><td><strong>Fecha de permiso: </strong></td><td class="innov">'.$info[0]['fecinov'].'<strong> al </strong>'.$info[0]['fecfnov'].'</td></tr>';
							$txt .= '<tr><td><strong>Tipo: </strong></td><td class="innov">'.$info[0]['tip'].'</td></tr>';	
							$txt .= '<tr><td><strong>Area: </strong></td><td class="innov">'.$info[0]['area'].'</td></tr>';
							$txt .= '<tr><td><strong>Observación: </strong></td><td class="innov">'.$info[0]['obsnov'].'</td></tr>';
							$txt .= '<tr><td><strong><hr>Registro: </strong></td><td class="innov"><hr>'.$info[0]['nomperc'].'</td></tr>';
							if($info[0]['prev'])$txt .= '<tr><td><strong>Revisada: </strong></td><td class="innov">'.$info[0]['nomprev'].' <br> '.$info[0]['fecrev'].'</td></tr>';
							

							// if($info[0]['papr'])$txt .= '<tr><td><strong>Aprobada: </strong></td><td class="innov">'.$info[0]['nompapr'].'<br>'.$info[0]['faprfac'].'</td></tr>';
						$txt .= '</table>';
					$txt .= '</div>';
				$txt .= '</div>';
				$txt .= '<div class="modal-footer">';
					$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
				$txt .= '</div>';
			$txt .= '</div>';
		$txt .= '</div>';
	$txt .= '</div>';
	echo $txt;
}




// ------------Modal vequ, prgxequi-----------
// function modalPxE($nm, $id, $tit, $dom, $pg, $dms, $dga)
// {
// 	$mequ = new Mequ();
// 	$i = 0;
// 	$txt = '';
// 	$txt .= '<div class="modal fade" id="' . $nm . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
// 		$txt .= '<div class="modal-dialog">';
// 			$txt .= '<form action="home.php?pg=' . $pg . '" method="POST">';
// 				$txt .= '<div class="modal-content">';
// 					$txt .= '<div class="modal-header">';
// 						$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>' . $tit . '</strong></h1>';
// 						$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
// 					$txt .= '</div>';
// 					$txt .= '<div class="modal-body">';
// 						$txt .= '<input type="hidden" value="' . $id . '" name="idper">';
// 						$txt .= '<div class="row">';
// 							if ($dom) { foreach ($dom as $dom) {
// 								$dtpg = $mequ->getOnePrg($dom['iddom']);
// 								$txt .= '<div class="form-group col-md-6" style="text-align: left;">';
// 									$txt .= '<label for="idvprg" class="titulo"><strong>' . $dom['nomdom'] . ':</strong></label>';
// 									$txt .= '<input type="hidden" name="idequ" value="' . $id . '">';
// 									$txt .= '<select name="idvprg[]" id="idvprg" class="form form-select">';
// 										$txt .= '<option value="0">Sin licencia</option>';
// 											if ($dtpg){ foreach ($dtpg as $td) {
// 												$pos = strpos($dms, $td['idval']);
// 												$txt .= '<option value="' . $td['idval'] . '"';
// 												if ($pos > -1) $txt .= " selected ";
// 												$txt .= '>' . $td['nomval'] . '</option>';
// 											}}
// 									$txt .= '</select>';
// 								$txt .= '</div>';
// 								$txt .= '<div class="form-group col-md-6" style="text-align: left;">';
// 									$txt .= '<label for="verprg" class="titulo"><strong>Versión:</strong></label>';
// 									$txt .= '<input class="form-control" type="text" id="verprg" name="verprg[]" ';
// 										if ($dga){ 
// 											$txt .= 'value="' . $dga[$i]['verprg'] . '"';
// 											$i++;
// 										}
// 									$txt .= 'onkeypress="return solonum(event);" required>';
// 								$txt .= '</div> ';
// 							}}
// 						$txt .= '</div>';
// 					$txt .= '</div>';
// 					$txt .= '<div class="modal-footer">';
// 						$txt .= '<input type="hidden" value="savepxe" name="ope">';
// 						$txt .= '<button type="submit" class="btn btn-primary btnmd">Guardar</button>';
// 						$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
// 					$txt .= '</div>';
// 				$txt .= '</div>';
// 			$txt .= '</form>';
// 		$txt .= '</div>';
// 	$txt .= '</div>';
// 	echo $txt;
// }

// ------------Modal vper, tajxper-----------
// function modalTj($nm, $id, $perent, $pg)
// {
// 	$mper = new Mper();
// 	$dtj = NULL;
// 	$dtj = $mper->getOneTaj($id);
// 	$hoy = date("Y-m-d");
// 	$txt = '';
// 	$txt .= '<div class="modal fade" id="' . $nm . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
// 		$txt .= '<div class="modal-dialog">';
// 			$txt .= '<form action="home.php?pg=' . $pg . '" method="POST">';
// 				$txt .= '<div class="modal-content">';
// 					$txt .= '<div class="modal-header">';
// 						$txt .= '<h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Asignar tarjetas</strong></h1>';
// 						$txt .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
// 					$txt .= '</div>';
// 					$txt .= '<div class="modal-body">';
// 						$txt .= '<div class="row">';
// 							$txt .= '<div class="form-group col-md-6" style="text-align: left;">';
// 								$txt .= '<label for="numtajpar" class="titulo"><strong>N° T. Parque:</strong></label>';
// 								$txt .= '<input class="form-control" type="text" id="numtajpar" name="numtajpar"';
// 								if ($dtj && $dtj[0]['numtajpar']) $txt .= ' value="'.$dtj[0]['numtajpar'].'" disabled';
// 								$txt .= '>';
// 							$txt .= '</div> ';
// 							$txt .= '<div class="form-group col-md-6" style="text-align: left;">';
// 								$txt .= '<label for="numtajofi" class="titulo"><strong>N° T. Bodega:</strong></label>';
// 								$txt .= '<input class="form-control" type="text" id="numtajofi" name="numtajofi"';
// 									if ($dtj && $dtj[0]['numtajofi']) $txt .= ' value="'.$dtj[0]['numtajofi'].'" disabled';
// 								$txt .= '>';
// 							$txt .= '</div> ';
// 							$txt .= '<div class="form-group col-md-6" style="text-align: left;">';
// 								$txt .= '<label for="fecent" class="titulo"><strong>F. Entrega</strong></label>';
// 								$txt .= '<input class="form-control" max='.$hoy.' type="date" id="fecent" name="fecent"';
// 									if ($dtj && $dtj[0]['fecent']) $txt .= ' value="'.$dtj[0]['fecent'].'" disabled';
// 									else $txt .= ' required';
// 								$txt .= '>';
// 							$txt .= '</div> ';
// 							$txt .= '<div class="form-group col-md-6" style="text-align: left;">';
// 								$txt .= '<label for="fecent" class="titulo"><strong>F. Devolución</strong></label>';
// 								$txt .= '<input class="form-control" min='.$hoy.' type="date" id="fecdev" name="fecdev"';
// 									(!$dtj) ? $txt .= ' disabled' : $txt .= ' required';
// 								$txt .= '>';
// 							$txt .= '</div> ';
// 						$txt .= '</div>';
// 					$txt .= '</div>';
// 					$txt .= '<div class="modal-footer">';
// 						if (!$dtj){
// 							$txt .= '<input type="hidden" value="savetxp" name="ope">';
// 							$txt .= '<input type="hidden" value="'.$perent.'" name="idperent">';
// 							$txt .= '<input type="hidden" value="'.$id.'" name="idperrec">';
// 							$txt .= '<input type="hidden" value="1" name="esttaj">';
// 						}else{
// 							$txt .= '<input type="hidden" value="updtxp" name="ope">';
// 							$txt .= '<input type="hidden" value="'.$id.'" name="idperentd">';
// 							$txt .= '<input type="hidden" value="'.$perent.'" name="idperrecd">';
// 							$txt .= '<input type="hidden" value="'.$dtj[0]['idtaj'].'" name="idtaj">';
// 							$txt .= '<input type="hidden" value="2" name="esttaj">';
// 						}
// 						$txt .= '<button type="submit" class="btn btn-primary btnmd">Guardar</button>';
// 						$txt .= '<button type="button" class="btn btn-secondary btnmd" data-bs-dismiss="modal">Cerrar</button>';
// 					$txt .= '</div>';
// 				$txt .= '</div>';
// 			$txt .= '</form>';
// 		$txt .= '</div>';
// 	$txt .= '</div>';
// 	echo $txt;
// }

//------------Array-string vpef, pagxpef-----------
function arrstr($dt)
{
	$txt = "";
	if ($dt) {
		foreach ($dt as $d) {
			$txt .= $d['idpag'] . ",";
		}
	}
	return $txt;
}

//------------Array-string vequ, prgxequi-----------
function arrstrprg($dt)
{
	$txt = "";
	if ($dt) {
		foreach ($dt as $d) {
			$txt .= $d['prg'] . ",";
		}
	}
	return $txt;
}

function arremp($dt)
{
	$txt = "";
	if ($dt) {
		foreach ($dt as $d) {
			$txt .= $d['idemp'] . ",";
		}
	}
	return $txt;
}

