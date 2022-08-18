<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
/** @var base\controller\controler $controlador Controlador en ejecucion  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;

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
        <ul class="nav-container">
            <li class="nav-container-element" ><a class="nav-element" href="#" data-content="<?php echo $controlador->subtitulos_menu[0]; ?>" id="Home-text-0"></a></li>
            <li class="nav-container-element" ><a class="nav-element" href="#" data-content="<?php echo $controlador->subtitulos_menu[1]; ?>" id="Home-text-1" >About</a></li>
            <li class="nav-container-element" ><a class="nav-element" href="#" data-content="<?php echo $controlador->subtitulos_menu[2]; ?>" id="Home-text-2">Skills</a></li>
            <li class="nav-container-element" ><a class="nav-element" href="#" data-content="<?php echo $controlador->subtitulos_menu[3]; ?>" id="Home-text-3">Works</a></li>
            <li class="nav-container-element" ><a class="nav-element" href="#" data-content="<?php echo $controlador->subtitulos_menu[4]; ?>" id="Home-text-4">Contact</a></li>
        </ul>
    </nav>
</div>