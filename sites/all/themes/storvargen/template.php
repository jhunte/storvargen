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

function storvargen_preprocess_block(&$vars) {
	if($vars['block']->module == 'block') {
		$info = block_custom_block_get($vars['block']->delta);

		$description = seoUrl($info['info']);

		$vars['classes_array'][] = $description;
	}

}

function storvargen_preprocess_page(&$variables) {
  if (isset(views_get_page_view())) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    $variables['theme_hook_suggestions'][] = 'page__view';
  }
}

function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}