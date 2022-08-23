<?php
namespace tests\controllers;

use gamboamartin\errores\errores;
use gamboamartin\test\liberator;
use gamboamartin\test\test;
use stdClass;
use tglobally\template_tg\html;


class htmlTest extends test {
    public errores $errores;
    private stdClass $paths_conf;
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->errores = new errores();

    }

    public function test_alert_success(): void
    {
        errores::$error = false;
        $html = new html();
        //$inicializacion = new liberator($inicializacion);

        $mensaje = 'a';
        $resultado = $html->alert_success($mensaje);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='alert alert-success' role='alert' ><strong>Muy bien!</strong> a.</div>", $resultado);
        errores::$error = false;
    }

    public function test_alert_warning(): void
    {
        errores::$error = false;
        $html = new html();
        //$inicializacion = new liberator($inicializacion);


        $mensaje = 'a';
        $resultado = $html->alert_warning($mensaje);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='alert alert-warning' role='alert' ><strong>Advertencia!</strong> a.</div>", $resultado);
        errores::$error = false;
    }

    public function test_button(): void
    {
        errores::$error = false;
        $html = new html();
        //$inicializacion = new liberator($inicializacion);

        $etiqueta = '';
        $resultado = $html->button($etiqueta);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        errores::$error = false;
    }

    public function test_button_href(): void
    {
        errores::$error = false;
        $html = new html();
        //$inicializacion = new liberator($inicializacion);

        $accion = 'a';
        $etiqueta = 'a';
        $registro_id = '-1';
        $seccion = 'a';
        $style = 'a';
        $_GET['session_id'] = 1;
        $resultado = $html->button_href($accion, $etiqueta, $registro_id, $seccion, $style);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<a role='button' href='index.php?seccion=a&accion=a&registro_id=-1&session_id=1' class='btn btn-a col-sm-12'>a</a>", $resultado);

        errores::$error = false;

        $accion = 'a';
        $etiqueta = 'a';
        $registro_id = '-1';
        $seccion = 'a';
        $style = 'a';
        $_GET['session_id'] = 1;
        $params['x'] = 'z';
        $resultado = $html->button_href($accion, $etiqueta, $registro_id, $seccion, $style, $params);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<a role='button' href='index.php?seccion=a&accion=a&registro_id=-1&session_id=1&x=z' class='btn btn-a col-sm-12'>a</a>", $resultado);

        errores::$error = false;
    }

    public function test_div_control_group_cols_label(): void
    {
        errores::$error = false;
        $html = new html();
        $html = new liberator($html);

        $cols = '1';
        $contenido = '';
        $label = 'a';
        $name = 'a';
        $resultado = $html->div_control_group_cols_label($cols, $contenido, $label, $name);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-1'><label class='control-label' for='a'>a</label></div>", $resultado);

        errores::$error = false;
    }

    public function test_div_controls(): void
    {
        errores::$error = false;
        $html = new html();
        $html = new liberator($html);


        $contenido = 'z';
        $_GET['session_id'] = 1;
        $resultado = $html->div_controls($contenido);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='controls'>z</div>", $resultado);
        errores::$error = false;
    }

    public function test_div_group(): void
    {
        errores::$error = false;
        $html = new html();
        //$html = new liberator($html);


        $cols = 1;
        $html_ = '';
        $resultado = $html->div_group($cols, $html_);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-1'></div>", $resultado);
        errores::$error = false;
    }

    public function test_div_label(): void
    {
        errores::$error = false;
        $html = new html();
        //$html = new liberator($html);


        $label = '';
        $html_ = '';
        $resultado = $html->div_label($html_, $label);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='controls'></div>", $resultado);
        errores::$error = false;
    }

    public function test_div_select(): void
    {
        errores::$error = false;
        $html = new html();
        $html = new liberator($html);


        $name = '';
        $options_html = '';
        $resultado = $html->div_select($name, $options_html);
        $this->assertIsArray($resultado);
        $this->assertTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase("Error name no puede venir vacio", $resultado['mensaje']);

        errores::$error = false;


        $name = 'x';
        $options_html = '';
        $resultado = $html->div_select($name, $options_html);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<select class='form-control selectpicker x' id='x' name='x'  ></select>", $resultado);
        errores::$error = false;
    }


    public function test_label(): void
    {
        errores::$error = false;
        $html = new html();
        //$inicializacion = new liberator($inicializacion);

        $id_css = 'a';
        $place_holder = 'c';
        $resultado = $html->label($id_css, $place_holder);


        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='a'>c</label>", $resultado);


        errores::$error = false;
    }

    public function test_option(): void
    {
        errores::$error = false;
        $html = new html();
        $html = new liberator($html);

        $descripcion = 'z';
        $selected = true;
        $value = 'a';
        $resultado = $html->option($descripcion, $selected, $value);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<option value='a' selected>z</option>", $resultado);

        errores::$error = false;

        $descripcion = 'z';
        $selected = false;
        $value = '-1';
        $resultado = $html->option($descripcion, $selected, $value);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<option value='-1' >z</option>", $resultado);
        errores::$error = false;
    }

    public function test_option_html(): void
    {
        errores::$error = false;
        $html = new html();
        $html = new liberator($html);


        $descripcion_select = 'a';
        $id_selected = '';
        $value = 'x';
        $_GET['session_id'] = 1;
        $resultado = $html->option_html($descripcion_select, $id_selected, $value);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<option value='x' >a</option>", $resultado);
        errores::$error = false;

    }

    public function test_text(): void
    {
        errores::$error = false;
        $html = new html();
        //$inicializacion = new liberator($inicializacion);

        $disabled = false;
        $required = false;
        $id_css = 'b';
        $name = 'a';
        $place_holder = 'c';
        $value = '';
        $resultado = $html->text($disabled, $id_css, $name, $place_holder, $required, $value);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<input type='text' name='a' value='' class='form-control'   id='b' placeholder='c' />", $resultado);

        errores::$error = false;


        $disabled = true;
        $required = true;
        $id_css = 'b';
        $name = 'a';
        $place_holder = 'c';
        $value = '';
        $resultado = $html->text($disabled, $id_css, $name, $place_holder, $required, $value);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<input type='text' name='a' value='' class='form-control' disabled required id='b' placeholder='c' />", $resultado);
        errores::$error = false;

    }


}

