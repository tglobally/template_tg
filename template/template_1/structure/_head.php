<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
/** @var base\controller\controler $controlador Controlador en ejecucion  */
use config\views;

$path_base_template = (new views())->ruta_templates;
$url_assets = (new views())->url_assets;

?>

<nav class="top-nav navbar navbar-expand-md navbar-light fixed-top bg-light">


    <div class="container-fluid px-4">
        <!-- Drawer toggle button
        <button class="btn btn-lg btn-icon order-1 order-lg-0 mdc-ripple-upgraded" id="drawerToggle" href="javascript:void(0);" style="--mdc-ripple-fg-size: 28px; --mdc-ripple-fg-scale: 2.7815089640681627; --mdc-ripple-fg-translate-start: 6px, 22px; --mdc-ripple-fg-translate-end: 10px, 10px;"><i class="bi bi-list"></i></button>
       Navbar brand-->

        <a class="navbar-brand me-auto" href="./index.php?seccion=adm_session&accion=inicio&session_id=<?php echo $controlador->session_id?>">
            <div class="">
                <img src="<?php echo $url_assets?>img/head/tg_logo.svg" class="svg-color-blue">
            </div>
        </a>

        <!-- Navbar items-->
        <div class="d-flex align-items-center mx-3 me-lg-0">
            <!-- Navbar-->
            <!-- Navbar buttons-->
            <div class="d-flex">
                <!-- Messages dropdown-->
                <!-- Notifications and alerts dropdown-->
                <!-- User profile dropdown-->
                <div class="dropdown">
                    <button class="btn btn-lg btn-icon dropdown-toggle mdc-ripple-upgraded" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></button>
                    <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuProfile">
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item perfil-item" href="index.php?seccion=adm_session&accion=login">
                                <i class="bi bi-box-arrow-right"></i>
                                <div class="me-3">Salir</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>