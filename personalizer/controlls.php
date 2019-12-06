<?php

function mazal_register_controlls($wp_customize)
{
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, "mazal_color_chocolate_control", array(
      "label" => "Color Principal",
      "section" => "colors",
      "settings" => "mazal_color_chocolate",
      "priority" => 1
    ))
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, "mazal_color_dorado_control", array(
      "label" => "Color Secundario",
      "section" => "colors",
      "settings" => "mazal_color_dorado",
      "priority" => 1
    ))
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, "mazal_color_yellow_control", array(
      "label" => "Color Texto Dorado",
      "section" => "colors",
      "settings" => "mazal_color_yellow",
      "priority" => 1
    ))
  );
}

add_action("customize_register", "mazal_register_controlls");
