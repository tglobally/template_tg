<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;

if (isset((new views())->template)):?>

    <div class="container-fluid p-0 d-flex flex-column align-items-center">

        <img src="<?php echo $url_assets?>img/head/completo_6.png" class="img-fluid w-100"  id="header_completo">

        <div class="col-md-12 text-center position-absolute">
            <img src="<?php echo $url_assets?>img/head/tg_logo.png" class="img-fluid h_logo">
        </div>
    </div>
<?php else: ?>
    <div class="head-imagen">
        <img src="<?php echo $url_assets?>img/head/completo_6.svg" id="header_completo">
        <div class="col-md-12 tg-logo">
            <img src="<?php echo $url_assets?>img/head/tg_logo.png" id="h_logo">
        </div>
    </div>
<?php endif; ?>
