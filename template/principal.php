<?php /** @var stdClass $data */
use config\views;
use gamboamartin\system\links_menu;


$path_base_template = (new views())->ruta_templates;
$links_menu = (new links_menu(registro_id: -1))->links;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Catalogos SAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <?php include $path_base_template.'css.php'; ?>
    <?php echo $data->css_custom; ?>

</head>

<body class="login-body">
<div id="fb-root"></div>
<div class="container container-wrapper">
    <header class="header">
        <?php include $path_base_template.'nav/_head.php'?>
    </header><!-- /.header-->
    <main class="main section-color-primary login-main">
        <?php  include($data->include_action); ?>
    </main><!-- /.main-part-->
    <a class="btn btn-scoll-up color-secondary" id="btn-scroll-up"></a>

    <?php include $path_base_template.'java.php'; ?>
    <?php echo $data->js_view; ?>
</div>
</body>
</html>
