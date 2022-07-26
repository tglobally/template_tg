<?php /** @var gamboamartin\controllers\controlador_adm_session $controlador */

use config\views;
$url_assets = (new views())->url_assets;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="cont_text_inicio">
                <h1 class="h-side-title page-title page-title-big text-color-primary">Hola, Nombre Completo</h1>
                <h1 class="h-side-title page-title text-color-primary">Da click en la sección que deseas utilizar</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-2">
                <a href="./index.php?seccion=org_empresa&accion=alta&session_id=<?php echo $controlador->session_id?>">
                    <div class="cont_imagen_accion">
                        <img src="<?php echo $url_assets?>img/inicio/imagen_1.jpg">
                    </div>
                    <div class="cont_text_accion">
                        <h4 class="text_seccion">Empresas</h4>
                        <h4 class="text_accion">Alta</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
