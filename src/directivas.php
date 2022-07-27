<?php
namespace tglobally\template_tg;
use gamboamartin\errores\errores;
use stdClass;

class directivas extends \gamboamartin\template\directivas {

    public function __construct(){
        $html = new html();
        parent::__construct(html: $html);

    }


    /**
     * Genera un input de tipo codigo
     * @param int $cols Numero de columnas boostrap
     * @version 0.32.4
     * @param stdClass $row_upd Registro obtenido para actualizar
     * @param bool $value_vacio Para altas en caso de que sea vacio o no existe el key
     * @return array|string
     */
    public function input_codigo(int $cols, stdClass $row_upd, bool $value_vacio): array|string
    {

        $valida = $this->valida_cols(cols: $cols);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar columnas ', data: $valida);
        }


        $html =$this->input_text_required(disable: false,name: 'codigo',place_holder: 'Codigo',row_upd: $row_upd,
            value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }

        $div = $this->html->div_group(cols: $cols,html:  $html);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al integrar div', data: $div);
        }

        return $div;
    }

}
