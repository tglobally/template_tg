<?php
namespace tglobally\template_tg;
use base\controller\controler;
use config\views;

class template{


    public function sidebar(controler $controlador, int $seccion_step = 1)
    {
        if (array_key_exists($controlador->accion,$controlador->sidebar)){
            echo "<div class='col-md-2 secciones'>";
            echo "<div class='col-md-12 int_secciones'>";
            echo $this->sidebar_stepper($controlador, seccion_step:$seccion_step);
            echo "<div class='col-md-8'>";
            echo $this->sidebar_titulo(controlador : $controlador);
            echo $this->sidebar_menu_items($controlador);
            echo "</div></div></div>";
        }
    }

    private function sidebar_titulo(controler $controlador): string{

        if (array_key_exists("titulo",$controlador->sidebar[$controlador->accion])){
            return "<h3> {$controlador->sidebar[$controlador->accion]['titulo']}</h3>";
        }

        return "<h3> {$controlador->accion}</h3>";
    }

    private function sidebar_stepper(controler $controlador, string $seccion_step): string{

        $stepper = "";

        if (array_key_exists("stepper_active",$controlador->sidebar[$controlador->accion])){
            $ruta_step = (new views())->url_assets."img/stepper/{$seccion_step}.svg";

            if ($controlador->sidebar[$controlador->accion]['stepper_active']){
                $stepper .= "<div class='col-md-4 seccion'>";
                $stepper .= "<img src='$ruta_step' class='img-seccion'>";
                $stepper .= "</div>";
            }
        }

        return $stepper;
    }

    private function sidebar_menu_items(controler $controlador): string{
        $items = "";
        foreach ($controlador->sidebar[$controlador->accion]['menu'] as $item => $menu_item){
            if ($item > 0){
                $items .= "<hr class='hr-menu-lateral'>";
            }
            if ($menu_item['menu_seccion_active']){
                $items .=  "<a href='{$menu_item['link']}'>";
                $items .= $this->sidebar_menu_item_button(item: $item,menu_item: $menu_item);
                $items .=  "</a>";
            } else {
                $items .= $this->sidebar_menu_item_button(item: $item,menu_item: $menu_item);
            }
        }
        return $items;
    }

    private function sidebar_menu_item_button(int $item, array $menu_item): string{

        $estado = ($menu_item["menu_lateral_active"])? ".azul.svg": ".gris.svg";
        $numero = ($item + 1);
        $url = (new views())->url_assets.'img/stepper/'.$numero.$estado;

        $is_active = "";

        if ($menu_item["menu_lateral_active"]){
            $is_active = "menu-lateral-active";
        }
        $button = "<button class='btn btn-default menu-lateral {$is_active} '>";
        $button .= "<img src='$url' class='numero'>";
        $button .= "<span class='texto-menu-lateral'>{$menu_item["menu_item"]}</span>";
        $button .= "</button>";

        return $button;
    }
        
      

}