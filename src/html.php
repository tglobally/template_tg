<?php
namespace tglobally\template_tg;

use base\frontend\params_inputs;
use gamboamartin\errores\errores;


class html extends \gamboamartin\template\html {
    /**
     * Genera un alert html boostrap con un mensaje incluido
     * @version 0.11.0
     * @param string $mensaje Mensaje a mostrar
     * @return string|array Resultado en un html
     */
    public function alert_success(string $mensaje): string|array
    {
        $mensaje = trim($mensaje);
        if($mensaje === ''){
            return $this->error->error(mensaje: 'Error mensaje esta vacio', data: $mensaje);
        }
        return "<div class='alert alert-success' role='alert' ><strong>Muy bien!</strong> $mensaje.</div>";
    }

    /**
     * Genera un alert de tipo warning
     * @version 1.17.1
     * @param string $mensaje Mensaje a mostrar en el warning
     * @return string|array
     */
    public function alert_warning(string $mensaje): string|array
    {
        $mensaje = trim($mensaje);
        if($mensaje === ''){
            return $this->error->error(mensaje: 'Error mensaje esta vacio', data: $mensaje);
        }
        return "<div class='alert alert-warning' role='alert' ><strong>Advertencia!</strong> $mensaje.</div>";
    }

    /**
     * Genera un boton
     * @version 0.44.5
     * @verfuncion 0.1.0
     * @author mgamboa
     * @fecha 2022-07-27 10:36
     * @param string $etiqueta Etiqueta a mostrar en el boton
     * @return string
     */
    public function button(string $etiqueta): string
    {
        return "<button type='button' class='btn btn-info col-sm-12'>$etiqueta</button>";
    }

    /**
     * Funcion que genera un boton de tipo link con href
     * @param string $accion Accion a ejecutar
     * @param string $etiqueta Etiqueta de boton
     * @param int $registro_id Registro a mandar transaccion
     * @param string $seccion Seccion a ejecutar
     * @param string $style Estilo del boton info,danger,warning etc
     * @param array $params Conjunto de parametros para botones
     * @return string|array
     * @version 0.32.3
     */
    public function button_href(string $accion, string $etiqueta, int $registro_id, string $seccion,
                                string $style, array $params = array()): string|array
    {

        $html = parent::button_href(accion: $accion,etiqueta:  $etiqueta,registro_id:  $registro_id,
            seccion:  $seccion, style: $style, params: $params);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar boton', data: $html);
        }

        return str_replace(array('|role|', '|class|'), array("role='button'",
            "class='btn btn-$style col-sm-12'"), $html);
    }

    /**
     * Genera un div group
     * @param int $cols N columnas css
     * @param string $html Html
     * @return string|array
     * @version 0.60.8
     */
    public function div_group(int $cols, string $html): string|array
    {
        $valida = (new directivas())->valida_cols(cols: $cols);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar cols', data: $valida);
        }
        $html_r = parent::div_group(cols: $cols,html:  $html);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar div', data: $html_r);
        }

        return str_replace(array('|class|'), array("class='control-group col-sm-$cols'"), $html_r);
    }

    /**
     * Genera un div con label
     * @param string $html Contenido html
     * @param string $label Etiqueta
     * @return string
     * @version 0.62.8
     */
    public function div_label(string $html, string $label): string
    {
        $html = parent::div_label(html: $html,label:  $label);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar div', data: $html);
        }
        
        return str_replace('|class|', "class='controls'", $html);

    }

    /**
     * Genera un div con un select
     * @param string $name Name del input a integrar
     * @param string $options_html Conjunto de options para select
     * @param bool $disabled Si disabled atributo disabled se incrusta en select
     * @param bool $required si required atributo required se integra a select
     * @return array|string
     * @version 0.69.8
     */
    protected function div_select(string $name, string $options_html, bool $disabled = false,
                                  bool $required = false): array|string
    {
        $name = trim($name);
        if($name === ''){
            return $this->error->error(mensaje: 'Error name no puede venir vacio', data: $name);
        }
        $required_html = (new params_inputs())->required_html(required: $required);
        if(errores::$error){
            return $this->error->error(mensaje: 'La asignacion de required es incorrecta', data: $required_html);
        }
        $disabled_html = (new params_inputs())->disabled_html(disabled: $disabled);
        if(errores::$error){
            return $this->error->error(mensaje: 'La asignacion de disabled es incorrecta', data: $disabled_html);
        }

        $select_in = "<select class='form-control selectpicker $name' id='$name' name='$name' $required_html $disabled_html>";
        $select_fin = '</select>';
        return $select_in.$options_html.$select_fin;
    }


    /**
     * Se genera un input de tipo email
     * @param bool $disabled Si disabled retorna text disabled
     * @param string $id_css Identificador de tipo css
     * @param string $name Nombre del input
     * @param string $place_holder Contenido a mostrar previo a la captura del input
     * @param bool $required Si required aplica required en html
     * @param mixed $value Valor de input
     * @return string|array
     * @version 0.70.8
     */
    public function email(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                          mixed $value): string|array
    {

        $valida = $this->valida_params_txt(id_css: $id_css,name:  $name,place_holder:  $place_holder);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
        }

        $html = parent::email(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }


    /**
     * Genera un input de tipo fecha
     * @param bool $disabled si disabled se integra atributo disabled
     * @param string $id_css id css
     * @param string $name nombre del input
     * @param string $place_holder etiqueta a mostrar dentro de input
     * @param bool $required si required se integra atributo required
     * @param mixed $value Valor de input fecha
     * @return string|array
     * @version 0.91.4
     */
    public function fecha(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                         mixed $value): string|array
    {

        $html = parent::fecha(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }


    /**
     * Genera un label html
     * @version 0.10.0
     * @param string $id_css id de css
     * @param string $place_holder Etiqueta a mostrar
     * @return string|array string Salida html de label
     *
     */
    public function label(string $id_css, string $place_holder): string|array
    {
        $id_css = trim($id_css);
        if($id_css === ''){
            return $this->error->error(mensaje: 'Error el $id_css esta vacio', data: $id_css);
        }
        $place_holder = trim($place_holder);
        if($place_holder === ''){
            return $this->error->error(mensaje: 'Error el $place_holder esta vacio', data: $place_holder);
        }
        $r_label = parent::label(id_css:$id_css,place_holder:  $place_holder);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $r_label);
        }

        return "<label class='control-label' for='$id_css'>$place_holder</label>";
    }

    /**
     * Genera um input text basado en los parametros enviados
     * @param bool $disabled Si disabled retorna text disabled
     * @param string $id_css Identificador css
     * @param string $name Name input html
     * @param string $place_holder Muestra elemento en input
     * @param bool $required indica si es requerido o no
     * @param mixed $value Valor en caso de que exista
     * @return string|array Html en forma de input text
     * @version 0.15.1
     */
    public function text(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                         mixed $value): string|array
    {

        $html = parent::text(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }

}
