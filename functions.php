<?php 

include "includes/functions-post-types.php";

function printcode($code){
  echo "<pre>" . print_r($code, true) . "</pre>";
}

/**
 * Verificar si la actual página es "arquitectura"
 */
function mazal_is_arquitectura_page( ){
  return is_page(11) || is_page(30) ;
}


/**
 * Verificar si la actual página es "mobiliario"
 */
function mazal_is_hogar_page()
{
  return is_page(9);
}

/**
 * Verificar si la actual página es "Corporativo"
 */
function mazal_is_corporativo_page()
{
  return is_page(25);
}