<?php

/**
 * Este archivo es usado para modificar y personalizar el header menú
 * Wordpress envía en formato de wp_nav_menu poco modificable, permitiendo crear una clase para modificar dicho menú.
 * @see https://codex.wordpress.org/Class_Reference/Walker
 */
class Mazal_Walker_Menu extends Walker
{

  // var $db_fields = array(
  //   'parent' => 'menu_item_parent',
  //   'id'     => 'db_id'
  // );


  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $itemSection = str_replace("#", "", $item->url);
    ob_start();
    ?>
    <li class="<?php echo $itemSection ?>" data-dynamic="">
      <a class="text-white" data-scroll="<?php echo $itemSection ?>"><?php echo $item->title ?></a>
    </li>
<?php
    $output .= ob_get_clean();
  }
}
