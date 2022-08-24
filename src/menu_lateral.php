<?php
namespace tglobally\template_tg;
use base\controller\controler;
use config\generales;
use config\views;
use gamboamartin\errores\errores;
use gamboamartin\system\system;
use gamboamartin\validacion\validacion;
use stdClass;

class menu_lateral{

    /**
     * Obtiene el color para el numero asignable en el item del link del menu lateral
     * @param controler $controlador Controlador en ejecucion
     * @param int $i Contador de items
     * @return string|array
     * @version 1.3.0
     */
    private function color(controler $controlador, int $i): string|array
    {
        $keys = array('number_active');
        $valida = (new validacion())->valida_existencia_keys(keys:$keys, registro: $controlador);
        if(errores::$error){
            return (new errores())->error(mensaje: 'Error al validar controlador include', data: $valida);
        }
        $color = 'gris';
        if($i===$controlador->number_active){
            $color = 'azul';
        }
        return $color;
    }

    /**
     * @param bool $aplica_link si aplica link se habilita link ejecutable para accion
     * @param system $controlador controlador en ejecucion
     * @param string $titulo
     * @return array
     */
    public function contenido_menu_lateral(bool $aplica_link, system $controlador,string $titulo): array
    {
        echo "<div class='col-md-8'>";
        echo "<h3>$titulo</h3>";
        $data_template = $this->include_items(aplica_link:$aplica_link, controlador:$controlador);
        if(errores::$error){
            return (new errores())->error(mensaje: 'Error al integrar include', data: $data_template);
        }
        echo "</div>";
        return $data_template;

    }

    /**
     * @param system $controlador controlador en ejecucion
     * @param int $i Contador de items
     * @return array|stdClass
     */
    private function data_template_section(system $controlador, int $i): array|stdClass
    {
        $color = $this->color(controlador:$controlador, i:$i);
        if(errores::$error){
            return (new errores())->error(mensaje: 'Error al obtener color', data: $color);
        }
        $number = $this->number(color: $color, i: $i);
        if(errores::$error){
            return (new errores())->error(mensaje: 'Error al obtener number', data: $number);
        }

        $data = new stdClass();
        $data->color = $color;
        $data->number = $number;

        return $data;
    }

    /**
     * @param bool $aplica_link
     * @param system $controlador controlador en ejecucion
     * @param int $i Contador de items
     * @return array|stdClass
     */
    private function include_item(bool $aplica_link, system $controlador, int $i): array|stdClass
    {
        $session_id = (new generales())->session_id;
        $data_template = $this->init_data_template(aplica_link:$aplica_link, controlador:$controlador,i:$i);
        if(errores::$error){
            return (new errores())->error(mensaje: 'Error al obtener datos', data: $data_template);
        }


        $number = $data_template->number;

        include $data_template->include;
        return $data_template;
    }

    /**
     * @param bool $aplica_link si aplica link se habilita link ejecutable para accion
     * @param system $controlador controlador en ejecucion
     * @return array
     */
    private function include_items(bool $aplica_link, system $controlador): array
    {
        $i = 1;
        $data_html = array();
        while($i<=$controlador->total_items_sections){ ?>
            <hr class="hr-menu-lateral">
            <?php
            $data_template = $this->include_item(aplica_link:$aplica_link, controlador:  $controlador,i:$i);
            if(errores::$error){
                return (new errores())->error(mensaje: 'Error al integrar include', data: $data_template);
            }
            $data_html[] = $data_template;
            $i++;
        }
        return $data_html;
    }


    private function include_number(bool $aplica_link, string $color, system $controlador, int $i): string
    {
        if($aplica_link) {
            if ($color === 'azul') {
                $include = "templates/$controlador->seccion/_base/buttons/number.$color.php";
            } else {
                $include = "templates/$controlador->seccion/_base/links/$i.php";
            }
        }
        else{
            $include  = "templates/$controlador->seccion/_base/buttons/number.gris.php";
        }

        return $include;
    }

    /**
     * @param bool $aplica_link
     * @param system $controlador controlador en ejecucion
     * @param int $i Contador de items
     * @return array|stdClass
     */
    private function init_data_template(bool $aplica_link, system $controlador, int $i): array|stdClass
    {
        $data_template = $this->data_template_section(controlador: $controlador, i:$i);
        if(errores::$error){
            return (new errores())->error(mensaje: 'Error al obtener datos', data: $data_template);
        }
        $include  = $this->include_number(aplica_link:$aplica_link,color: $data_template->color,
            controlador:$controlador,i: $i);
        if(errores::$error){
            return (new errores())->error(mensaje: 'Error al obtener include', data: $include);
        }
        $data_template->include = $include;
        return $data_template;
    }


    /**
     * Genera el color y el numero para obtencion de boton
     * @param string $color Color de link azul active gris liga
     * @param int $i Contador de items
     * @return string|array
     * @version 1.4.0
     */
    private function number( string $color, int $i): string|array
    {
        if($i<0){
            return (new errores())->error(mensaje: 'Error i debe ser mayor a 0', data: $i);
        }
        $color = trim($color);
        if($color === ''){
            return (new errores())->error(mensaje: 'Error color esta vacio', data: $color);
        }
        return "$i.$color";
    }

    public function number_head(int $number_active): string
    {
        $url_assets = (new views())->url_assets;

        $ruta = $url_assets."img/numeros/$number_active.svg";

        return "<div class='col-md-4 seccion'><img src='$ruta' class='img-seccion'></div>";
    }
}
