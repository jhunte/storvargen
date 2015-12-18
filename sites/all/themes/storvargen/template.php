<?php

/**
* theme_menu_link()
*/
function storvargen_menu_link(array $variables) {

  //dpm($variables);

  $title_class = strtolower($variables['element']['#title']);
  $title_class = str_replace(' ', '-' , $title_class);

  $theme_path = drupal_get_path('theme', 'storvargen');

  $banners = array(
  	"home" => theme('image', array('path' => $theme_path . '/images/storvargen_nav_banner.png')),
  	"gallery" => theme('image', array('path' => $theme_path . '/images/storvargen_nav_gallery.png')),
  	"contact-us" => theme('image', array('path' => $theme_path . '/images/storvargen_nav_contact-us.png')),
  	"encyclopedia" => theme('image', array('path' => $theme_path . '/images/storvargen_nav_encyclopedia.png')),
  	"library" => theme('image', array('path' => $theme_path . '/images/storvargen_nav_library.png')),
  	"archive" => theme('image', array('path' => $theme_path . '/images/storvargen_nav_archive.png')),
  );

//add class for li
   $variables['element']['#attributes']['class'][] = 'menu-' . $variables['element']['#original_link']['mlid'];
   $variables['element']['#attributes']['class'][] = $title_class;
//add class for a
   $variables['element']['#localized_options']['attributes']['class'][] = 'menu-' . $variables['element']['#original_link']['mlid'];
   $variables['element']['#localized_options']['attributes']['class'][] = $title_class.'-link';

   if(array_key_exists($title_class, $banners)) {
   		$variables['element']['#title'] = $banners[$title_class];
   		$variables['element']['#localized_options']['html'] = TRUE;
   }

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
	$view = views_get_page_view();
  	if (isset($view)) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    	$variables['theme_hook_suggestions'][] = 'page__view';
  	}
  	if (isset($variables['node']->type)) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
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