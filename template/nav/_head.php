<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;
$subtitulo0 = (new views())->subtitulo0;
$subtitulo1 = (new views())->subtitulo1;
$subtitulo2 = (new views())->subtitulo2;
$subtitulo3 = (new views())->subtitulo3;
$subtitulo4 = (new views())->subtitulo4;
?>



<div class="head-imagen">
    <div class="col-md-12 cont_menu">
        <div class="cont_icono open-overlay">
            <img src="<?php echo $url_assets?>img/head/menu.png" class="icono_menu">
        </div>
        <div class="cont_icono_logout">
            <a href="index.php?seccion=adm_session&accion=login">
                <img src="<?php echo $url_assets?>../icons/icon_logout.svg" class="icono_menu">
            </a>
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
            <li><a href="#" data-content="<?php echo $subtitulo0?>" id="Home-text-0"></a></li>
            <li><a class="" href="#" data-content="<?php echo $subtitulo1?>" id="Home-text-1" >About</a></li>
            <li><a href="#" data-content="<?php echo $subtitulo2?>" id="Home-text-2">Skills</a></li>
            <li><a href="#" data-content="<?php echo $subtitulo3?>" id="Home-text-3">Works</a></li>
            <li><a href="#" data-content="<?php echo $subtitulo4?>" id="Home-text-4">Contact</a></li>
        </ul>
    </nav>
</div>