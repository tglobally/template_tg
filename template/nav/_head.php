<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;
?>

<div class="head-imagen">
    <img src="<?php echo $url_assets?>img/head/azul.png" id="h_azul">
    <img src="<?php echo $url_assets?>img/head/rojo.png" id="h_rojo">
    <img src="<?php echo $url_assets?>img/head/azul_fuerte.png" id="h_azul_fuerte">
    <div class="col-md-12 tg-logo">
        <img src="<?php echo $url_assets?>img/head/tg_logo.png" id="h_logo">
    </div>
</div>
