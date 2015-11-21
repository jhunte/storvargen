<?php

/**
* theme_menu_link()
*/
function storvargen_menu_link(array $variables) {

  //dpm($variables);

  $title_class = strtolower($variables['element']['#title']);
  $title_class = str_replace(' ', '-' , $title_class);
//add class for li
   $variables['element']['#attributes']['class'][] = 'menu-' . $variables['element']['#original_link']['mlid'];
   $variables['element']['#attributes']['class'][] = $title_class;
//add class for a
   $variables['element']['#localized_options']['attributes']['class'][] = 'menu-' . $variables['element']['#original_link']['mlid'];
   $variables['element']['#localized_options']['attributes']['class'][] = $title_class.'-link';
//dvm($variables['element']);
  return theme_menu_link($variables);
}