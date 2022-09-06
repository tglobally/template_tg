<?php
namespace tests\controllers;

use gamboamartin\controllers\controlador_adm_seccion;
use gamboamartin\errores\errores;
use gamboamartin\system\system;
use gamboamartin\test\liberator;
use gamboamartin\test\test;
use JetBrains\PhpStorm\NoReturn;
use JsonException;

use stdClass;
use tglobally\template_tg\directivas;
use tglobally\template_tg\html;
use tglobally\template_tg\menu_lateral;


class menu_lateralTest extends test {
    public errores $errores;
    private stdClass $paths_conf;
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->errores = new errores();

        $this->paths_conf = new stdClass();
        $this->paths_conf->generales = '/var/www/html/cat_sat/config/generales.php';
        $this->paths_conf->database = '/var/www/html/cat_sat/config/database.php';
        $this->paths_conf->views = '/var/www/html/cat_sat/config/views.php';

    }



    /**
     */
    #[NoReturn] public function test_color(): void
    {
        errores::$error = false;
        $menu = new menu_lateral();
        $menu = new liberator($menu);


        $i = -1;

        $controlador  = new controlador_adm_seccion(link: $this->link,paths_conf: $this->paths_conf);
        $controlador->number_active = 0;
        $resultado = $menu->color($controlador, $i);

        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("gris", $resultado);

        errores::$error = false;

        $i = 1;

        $controlador  = new controlador_adm_seccion(link: $this->link,paths_conf: $this->paths_conf);
        $controlador->number_active = 0;
        $resultado = $menu->color($controlador, $i);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("gris", $resultado);

        errores::$error = false;

        $i = 1;

        $controlador  = new controlador_adm_seccion(link: $this->link,paths_conf: $this->paths_conf);
        $controlador->number_active = 1;
        $resultado = $menu->color($controlador, $i);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("azul", $resultado);


        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_data_template_section(): void
    {
        errores::$error = false;
        $menu = new menu_lateral();
        $menu = new liberator($menu);

        $controlador   = new controlador_adm_seccion(link: $this->link,paths_conf: $this->paths_conf);
        $i = 1;
        $resultado = $menu->data_template_section($controlador, $i);

        $this->assertIsObject($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("gris", $resultado->color);
        $this->assertEquals("1.gris", $resultado->number);
        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_number(): void
    {
        errores::$error = false;
        $menu = new menu_lateral();
        $menu = new liberator($menu);

        $color = 'x';
        $i = 1;
        $resultado = $menu->number($color, $i);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("1.x", $resultado);

        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_number_head(): void
    {
        errores::$error = false;
        $menu = new menu_lateral();
        //$menu = new liberator($menu);

        $number_active = 1;
        $resultado = $menu->number_head($number_active);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='col-md-4 seccion'><img src='http://localhost/cat_sat/assets/img/numeros/1.svg' class='img-seccion'></div>", $resultado);
        errores::$error = false;
    }




}

