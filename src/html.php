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
     * @param int $cols Numero de columnas css
     * @param string $contenido Contenido a integrar dentro del div
     * @param string $label Etiqueta a mostrar en div
     * @param string $name Name del input
     * @return string|array
     * @version 0.45.6
     * @verfuncion 0.1.0
     * @author mgamboa
     * @fecha 2022-08-08 16:08
     */
    private function div_control_group_cols_label(int $cols, string $contenido, string $label, string $name): string|array
    {
        $name = trim($name);
        if($name === ''){
            return $this->error->error(mensaje: 'Error el $name esta vacio', data: $name);
        }
        $label = trim($label);
        if($label === ''){
            return $this->error->error(mensaje: 'Error el $label esta vacio', data: $label);
        }
        $valida = (new directivas())->valida_cols(cols:$cols);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar cols', data: $valida);
        }

        $label_html = $this->label(id_css:$name,place_holder: $label);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $label_html);
        }

        $html = $this->div_control_group_cols(cols: $cols,contenido: $label_html.$contenido);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $html);
        }

        return $html;
    }

    /**
     * Genera un div para forms
     * @param string $contenido Contenido en html
     * @return string
     * @version 0.57.8
     */
    private function div_controls(string $contenido): string
    {
        $div_controls_ini = "<div class='controls'>";
        $div_controls_fin = "</div>";

        return $div_controls_ini.$contenido.$div_controls_fin;
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
     * @param string $name
     * @param string $options_html
     * @param bool $disabled
     * @param bool $required
     * @return array|string
     */
    protected function div_select(string $name, string $options_html, bool $disabled = false,
                                  bool $required = false): array|string
    {
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
     */
    public function email(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                          mixed $value): string|array
    {

        $html = parent::email(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }


    /**
     * Genera un input de tipo fecha
     * @param bool $disabled
     * @param string $id_css
     * @param string $name
     * @param string $place_holder
     * @param bool $required
     * @param mixed $value
     * @return string|array
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
     * @param string $descripcion_select Descripcion para se mostrado en un select
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param string $options_html Options previamente cargados
     * @param mixed $value
     * @return array|string
     */
    private function integra_options_html(string $descripcion_select, mixed $id_selected, string $options_html,
                                          mixed $value): array|string
    {
        $option_html = $this->option_html(descripcion_select: $descripcion_select,id_selected: $id_selected,
            value: $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar option', data: $option_html);
        }

        $options_html.=$option_html;

        return $options_html;
    }



    /**
     * @param int $cols Numero de columnas css
     * @param string $label Etiqueta a mostrar en div
     * @param string $name Name del input
     * @param string $options_html
     * @return array|string
     */
    private function select_html(int $cols, string $label, string $name, string $options_html): array|string
    {
        $select = $this->div_select(name: $name,options_html: $options_html);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $select);
        }

        $select = $this->div_controls(contenido: $select);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $select);
        }

        $select = $this->div_control_group_cols_label(cols: $cols,contenido: $select,label: $label,name: $name);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $select);
        }
        return $select;
    }

    /**
     * Genera un label html
     * @version 0.10.0
     * @param string $id_css id de css
     * @param string $place_holder Etiqueta a mostrar
     * @return string|array string Salida html de label
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
     * Genera un option para un select
     * @param string $descripcion descripcion del option
     * @param bool $selected Si selected se anexa selected a option
     * @param mixed $value Value del option
     * @return string|array
     * @version 0.44.5
     */
    PUBLIC function option(string $descripcion, bool $selected, int|string $value): string|array
    {
        $valida = $this->valida_option(descripcion: $descripcion, value: $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar option', data: $valida);
        }
        $selected_html = '';
        if($selected){
            $selected_html = 'selected';
        }
        return "<option value='$value' $selected_html>$descripcion</option>";
    }

    /**
     * Integra un option para un select html
     * @param string $descripcion_select Descripcion para mostrar en select
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param mixed $value Valor para selected
     * @return array|string
     * @version 0.58.8
     */
    private function option_html(string $descripcion_select, mixed $id_selected, int|string|null $value): array|string
    {
        if(is_null($value)){
            $value = '';
        }
        if(is_numeric($value)) {
            $value = (int)$value;
        }
        $selected = $this->selected(value: $value,id_selected: $id_selected);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al verificar selected', data: $selected);
        }

        $option_html = $this->option(descripcion: $descripcion_select,selected:  $selected, value: $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar option', data: $option_html);
        }
        return $option_html;
    }



    /**
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param string $options_html Options previos precargados
     * @param array $values Valores para generacion de options
     * @return array|string
     */
    private function options_html_data(mixed $id_selected, string $options_html, array $values): array|string
    {
        $options_html_ = $options_html;
        foreach ($values as $value=>$descripcion_select){

            $options_html_ = $this->integra_options_html(descripcion_select: $descripcion_select,
                id_selected: $id_selected,options_html: $options_html_,value: $value);
            if(errores::$error){
                return $this->error->error(mensaje: 'Error al generar option', data: $options_html_);
            }
        }
        return $options_html_;
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
