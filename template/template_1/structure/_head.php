<?php
/** @var base\controller\controler $controlador Controlador en ejecucion  */
?>

<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="bi bi-list"></i>
        </button>
        <h4><?php echo $controlador->seccion_titulo?></h4>

        <ul class="header-nav me-4">
            <li class="nav-item dropdown d-flex align-items-center" style="border-radius: 100%">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false" style="border-radius: 100%">
                    <i class="bi bi-person-bounding-box"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end pt-0">

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="index.php?seccion=adm_session&accion=login">
                        <i class="bi bi-box-arrow-left " style="margin-right: 5px"></i>
                        Salir</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <h5 class="active" style="color: #c9cdd4"><?php echo $controlador->seccion_titulo?></h5>
    </div>
</header>


