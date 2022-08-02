<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;
?>



<div class="head-imagen">
    <div class="col-md-12 cont_menu">
        <div class="cont_icono open-overlay">
            <img src="<?php echo $url_assets?>img/head/menu.png" class="icono_menu">
        </div>
    </div>

    <a href="./index.php?seccion=adm_session&accion=inicio&session_id=<?php echo $controlador->session_id?>">
        <div class="col-md-12 tg-logo">
            <img src="<?php echo $url_assets?>img/head/tg_logo.png" id="h_logo">
        </div>
    </a>

</div>



<div class="overlay-navigation">
    <nav role="navigation">
        <ul>
            <li><a href="#" data-content="The beginning">Home</a></li>
            <li><a class="" href="#" data-content="Curious?">About</a></li>
            <li><a href="#" data-content="I got game">Skills</a></li>
            <li><a href="#" data-content="Only the finest">Works</a></li>
            <li><a href="#" data-content="Don't hesitate">Contact</a></li>
        </ul>
    </nav>
</div>



