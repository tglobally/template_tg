<?php
use config\views;
$ruta_template_base = (new views())->ruta_template_base;
include $ruta_template_base.'/assets/css/base.php';
?>
<style>
    .container{
        width: 80%;
    }

    .catalogos{
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-gap: 15px;
    }

</style>
