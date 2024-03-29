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

<?php
$seccion_en_ejecucion = $data->controlador->tabla;
$accion_en_ejecucion = 'login';
if (isset($_GET['accion'])) {
    $accion_en_ejecucion = $_GET['accion'];
}

if (isset($heads->$seccion_en_ejecucion->$accion_en_ejecucion) && $heads->$seccion_en_ejecucion->$accion_en_ejecucion !== '') {
    include $heads->adm_session->login;
    include($data->include_action);
} else {
    include $path_base_template . 'template_1/structure/_main.php';
}
?>

<?php include $path_base_template . 'template_1/java.php'; ?>
<?php echo $data->js_view; ?>
<?php if (isset($controlador->datatables)):?>
    <?php foreach ($controlador->datatables as $datatable) {
        if ($datatable['type'] === "datatable"){
            $objeto = json_encode($datatable);
            print_r("<script> datatable($objeto.identificador, $objeto.columns,$objeto.columnDefs,$objeto.data,$objeto.in) </script>");
        }
    } ?>
<?php endif;?>

</body>
</html>
