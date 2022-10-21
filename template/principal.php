<?php /** @var stdClass $data */
use config\views;
use gamboamartin\system\links_menu;
/** @var base\controller\ $controlador */

$views = new views();


$path_base_template = $views->ruta_templates;
if(!isset($views->heads)){
    $error = (new gamboamartin\errores\errores())->error(mensaje: 'Error no existe heads en views', data:$views);
    print_r($error);
    exit;
}
$heads = $views->heads;
$links_menu = (new links_menu(registro_id: -1))->links;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Empresas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <?php include $path_base_template.'css.php'; ?>
    <?php
    if($data->css_custom->existe_php){
        include $data->css_custom->css;
    }
    elseif($data->css_custom->existe_css){
        echo $data->css_custom->css;
    }

    ?>

</head>

<body class="login-body">
<div id="fb-root"></div>
<div class="container container-wrapper">
    <header class="header">
        <?php
        $seccion_en_ejecucion = $data->controlador->tabla;
        $accion_en_ejecucion = 'login';
        if(isset($_GET['accion'])){
            $accion_en_ejecucion = $_GET['accion'];
        }

        if (isset($heads->$seccion_en_ejecucion->$accion_en_ejecucion) && $heads->$seccion_en_ejecucion->$accion_en_ejecucion !== '') {
            include $heads->adm_session->login;
        }else {
            include $path_base_template . 'nav/_head.php';
        }
        ?>
    </header><!-- /.header-->
    <main class="main section-color-primary login-main">
        <?php  include($data->include_action); ?>
    </main><!-- /.main-part-->
    <a class="btn btn-scoll-up color-secondary" id="btn-scroll-up"></a>

    <?php include $path_base_template.'java.php'; ?>
    <?php echo $data->js_view; ?>
    <?php if (isset($controlador->datatables)):?>
        <?php foreach ($controlador->datatables as $datatable) {
            $objeto = json_encode($datatable);
            print_r("<script> datatable($objeto.identificador, $objeto.columns, $objeto.columnDefs, $objeto.data) </script>");
        } ?>
    <?php endif;?>
</div>
</body>
</html>
