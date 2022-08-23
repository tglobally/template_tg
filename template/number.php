<?php
/** @var string $number */
use config\views;

$url_assets = (new views())->url_assets; ?>
<img src="<?php echo $url_assets."img/numeros/$number.svg"; ?>" class="numero">
