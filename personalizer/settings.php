<?php

function mazal_register_settings($wp_customize)
{

  $wp_customize->add_setting("mazal_color_chocolate", array(
    "default" => "#201818",
    "transport" => "postMessage"
  ));
  $wp_customize->add_setting("mazal_color_dorado", array(
    "default" => "#8c7d6c",

    "transport" => "postMessage"
  ));
  $wp_customize->add_setting("mazal_color_yellow", array(
    "default" => "#dab27c",

    "transport" => "postMessage"
  ));
}

add_action("customize_register", "mazal_register_settings");
