<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;
?>
<div class="top-box" data-toggle="sticky-onscroll">
    <img src="<?php echo $url_assets; ?>img/head/rojo.jpeg" id="h_rojo">
</div>
