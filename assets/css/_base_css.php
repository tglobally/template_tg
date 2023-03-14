<?php
use config\views;
$ruta_template_base = (new views())->ruta_template_base;
include $ruta_template_base.'/assets/css/base.php';
?>
<style>
    .catalogos{
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 15px;
    }
</style>
