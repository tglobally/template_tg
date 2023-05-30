<?php

use config\generales;
use config\views;

$url = (new generales())->url_base.'vendor/tglobally/template_tg/template/template_1/css/';

?>

    <link rel="stylesheet" href="<?php echo $url?>reset.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://coreui.io/demos/bootstrap/4.3/light-v3/vendors/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="https://coreui.io/demos/bootstrap/4.3/light-v3/css/vendors/simplebar.css" />
    <link rel="stylesheet" href="<?php echo $url?>core.css" />
    <link rel="stylesheet" href="<?php echo $url?>base.css" />

<?php

