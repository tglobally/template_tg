<?php include $path_base_template . 'template_1/structure/_sidebar.php'; ?>
<div class="wrapper d-flex flex-column min-vh-100 bg-light dark:bg-transparent">

    <?php include $path_base_template . 'template_1/structure/_head.php'; ?>

    <div class="body flex-grow-1 px-3 d-flex">
        <div class="container-lg">

            <?php if ($controlador->accion != 'inicio') : ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">
                            <a href="./index.php?seccion=adm_session&accion=inicio&session_id=<?php echo $controlador->session_id ?>">Inicio</a>
                        </li>

                        <?php if ($controlador->accion === 'lista') : ?>
                            <li class="breadcrumb-item active" aria-current="page">Lista</li>
                        <?php else:; ?>
                            <li class="breadcrumb-item"><a href="<?php echo $controlador->link_lista ?>">Lista</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page"><?php echo $controlador->accion_titulo ?></li>
                        <?php endif; ?>
                    </ol>
                </nav>
            <?php endif; ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-body p-4">

                            <?php if ($controlador->accion != 'inicio') : ?>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-title fs-2 fw-semibold"><?php echo $controlador->titulo_accion ?></div>
                                    </div>
                                    <div class="col-auto ms-auto">
                                        <button class="btn btn-secondary btn-sm" type="button"
                                                data-coreui-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-list-task icon me-2"></i>
                                            Acciones
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <?php echo $controlador->html_acciones_menu ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php include($data->include_action); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

