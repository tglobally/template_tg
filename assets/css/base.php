<?php
use config\views;
$url_template = (new views())->url_assets;
$url_template .= 'css/';
?>
<style>
    @import "<?php echo $url_template; ?>secciones.css";
    @import "<?php echo $url_template; ?>forms.css";
    @import "<?php echo $url_template; ?>botones.css";
</style>
