<?php
require_once('controllers/cfacpr.php');
$hoy = date("Y-m-d");
$mañana = date("Y-m-d", strtotime($hoy . ' +1 day'));
?>
