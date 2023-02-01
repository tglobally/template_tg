<?php
namespace tglobally\template_tg;
use gamboamartin\errores\errores;
use stdClass;

class directivas extends \gamboamartin\template\directivas {

    public function __construct(){
        $html = new html();
        parent::__construct(html: $html);

    }

}
