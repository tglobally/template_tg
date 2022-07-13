<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;
?>

<div class="head-imagen">
    <img src="<?php echo $url_assets?>img/head/completo_4.svg" id="header_completo">
    <div class="col-md-12 tg-logo">
        <img src="<?php echo $url_assets?>img/head/tg_logo.png" id="h_logo">
    </div>
</div>
