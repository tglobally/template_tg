<?php

use config\views;

/** @var stdClass $data */
/** @var base\controller\ $controlador */

$views = new views();
$heads = $views->heads;

$path_base_template = $views->ruta_templates;

?>

<div class="sidebar sidebar-light sidebar-fixed" id="sidebar">

    <div class="sidebar-brand d-none d-md-flex text-center">
        <a class="w-100"
           href="./index.php?seccion=adm_session&accion=inicio&session_id=<?php echo $controlador->session_id ?>">
            <img src="<?php echo (new views())->url_assets ?>img/head/tg_logo.svg" class="svg-logo">
        </a>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                         style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <?php echo $controlador->html_categorias ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 264px; height: 942px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                 style="height: 158px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </ul>
</div>
