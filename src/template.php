<?php
namespace tglobally\template_tg;
use base\controller\controler;
use config\views;

class template{

    
    public function sidebar(controler $controlador)
    {
        echo "<div class='col-md-3 secciones'>";
        echo "<div class='col-md-12 int_secciones'>";
        echo "<div class='col-md-8'>";
        echo $this->sidebar_titulo(controlador : $controlador);
        echo $this->sidebar_menu_items($controlador);
        echo "</div></div></div>";
    }

    private function sidebar_titulo(controler $controlador): string{
        return "<h3> {$controlador->sidebar[$controlador->sidebar['seccion']]['titulo']}</h3>";
    }

    private function sidebar_menu_items(controler $controlador): string{
        $items = "";
        foreach ($controlador->sidebar[$controlador->sidebar['seccion']]['menu'] as $item => $menu_item){
            $items .= "<hr class='hr-menu-lateral'>";
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
        $button = "<button class='btn btn-default menu-lateral '$is_active>";
        $button .= "<img src='$url' class='numero'>";
        $button .= "<span class='texto-menu-lateral'>{$menu_item["menu_item"]}</span>";
        $button .= "</button>";
        
        return $button;
    }
        
      

}