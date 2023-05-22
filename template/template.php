<?php

use config\views;

/** @var stdClass $data */
/** @var base\controller\ $controlador */

$views = new views();
$heads = $views->heads;

$path_base_template = $views->ruta_templates;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title><?php echo $controlador->titulo_pagina; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <?php include $path_base_template . 'template_1/css.php'; ?>

    <?php
    if ($data->css_custom->existe_php) {
        include $data->css_custom->css;
    } elseif ($data->css_custom->existe_css) {
        echo $data->css_custom->css;
    }
    ?>
</head>
<body>

<div class="container-fluid p-0">

    <?php
    $seccion_en_ejecucion = $data->controlador->tabla;
    $accion_en_ejecucion = 'login';
    if (isset($_GET['accion'])) {
        $accion_en_ejecucion = $_GET['accion'];
    }

    if (isset($heads->$seccion_en_ejecucion->$accion_en_ejecucion) && $heads->$seccion_en_ejecucion->$accion_en_ejecucion !== '') {
        include $heads->adm_session->login;
    } else {
        include $path_base_template . 'template_1/structure/_head.php';
        include $path_base_template . 'template_1/structure/_sidebar.php';
    }
    ?>


    <main class="d-flex align-items-center text-center">
        <?php   include($data->include_action); ?>
    </main>

    <a class="btn btn-scoll-up color-secondary" id="btn-scroll-up"></a>

    <?php include $path_base_template.'template_1/java.php'; ?>

</div>

</body>
</html>
