<?php


/**
 * Agregar argumentos a un nuevo post Type 
 * @param string $name Nombre general de el nuevo post-type,
 * @param string $icon Icono que se agregará a el post type
 * @param boolean $isMale Se ajusta en revisar si es un elemento masculino/femenino. Se ajusta en campos como <Ver todos los elementos> o <Ver todas las páginas>
 * @param array $supports Todos los soportes que tiene el post type, por defecto será <<title, editor, thumbnail>>
 * @return array Lista de args que se pasarán a un nuevo post type.
 * */
function __mazal_register_post_type($name, $icon, $isMale = true, $supports = array())
{

  $theName = ucfirst($name);
  $genre = ($isMale) ? "o" : "a";
  if (empty($supports)) {
    $supports = array(
      'title', 'editor', 'thumbnail'
    );
  }
  $labels = array(
    'name'                  => $theName . 's',
    'singular_name'         => $theName,
    'menu_name'             => $theName . 's',
    'name_admin_bar'        => $theName,
    'add_new'               => 'Añadir nuev' . $genre,
    'add_new_item'          => "Añadir nuev" . $genre . ' ' . $name,
    'new_item'              => 'Nuev' . $genre . ' ' . $name,
    'edit_item'             => 'Editar ' . $name,
    'view_item'             => 'Ver ' . $name,
    'all_items'             => 'Tod' . $genre . 's l' . $genre . 's ' . $name . 's', //Tod@s l@s *Nombre de Post*
    'search_items'          => "Buscar {$name}",
    'not_found'             => "No se han encontrado {$name}s.",
    'not_found_in_trash'    => "No se ha encontrado {$name}s en la papelera."
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'          => $icon,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => strtolower($name)),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'supports'           => $supports,
  );

  return $args;
}

/**
 * Agregar una nueva taxonomía completa.
 * @param String $name Nombre singular de la Taxonomía.
 * @param Boolean $is_male Si es true, este se tomará como taxonomia masculina. Por ejemplo, la taxonomía es "Escritor", si se asigna true a esta variable, será "El Escritor"; en caso contrario será "La Escritor"
 * @param Boolean $asTag ¿Será una taxonomía donde se permitan taxonomias/categorías hijas?
 * @param Array $otherArgs Este será definido para ajustes de esta taxonomía. La clave "Labels" Se ajustarán y no podrán sobreescribrse.
 * @see https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function __mazal_register_taxonomy($name, $is_male = true, $asTag = false, $otherArgs = array())
{
  $theName = ucfirst($name);
  $pluralName = $theName . "s";
  $genre = ($is_male) ? "o" : "a";
  $labels = array(
    'name'                       => $pluralName,
    'singular_name'              => $theName,
    'search_items'               => "Buscar {$pluralName}",
    'popular_items'              => "{$pluralName} Populares",
    'all_items'                  => "Tod{$genre}s l{$genre}s {$pluralName}",
    'edit_item'                  => "Editar {$theName}",
    'update_item'                => "Actualizar {$theName}",
    'add_new_item'               => "Añadir {$theName}",
    'new_item_name'              => "Nuevo nombre de {$theName}",
    'add_or_remove_items'        => "Añadir o Eliminar {$theName}",
    'not_found'                  => "No se ha encontrado ${$pluralName}",
    'menu_name'                  => $pluralName,
  );

  if (empty($otherArgs)) {
    $args = array(
      'show_ui'               => true,
      'show_admin_column'     => true,
      'query_var'             => true,
      'rewrite'               => array('slug' => $theName),
    );
  } else {
    $args = $otherArgs;
  }
  if ($asTag) {
    $args["hierarchical"] = false;
  } else {
    $args["hierarchical"] = true;
  }
  $args["labels"] = $labels;
  return $args;
}

function mazal_register_the_posts_types(){

  $postTypes = array(
    "menu"   => __mazal_register_post_type("menu", "dashicons-images-alt2"),
  );

  foreach ($postTypes as $ptkey => $ptvalue) {
    register_post_type($ptkey, $ptvalue);
  }
  
}

add_action("init", "mazal_register_the_posts_types");