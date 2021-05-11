<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

function f4s_bs_preprocess_page(&$vars) {
    // template files called page--contenttype.tpl.php
    if (isset($vars['node']->type)) {
        $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    }

  drupal_add_js(drupal_get_path('theme', 'aesbs337').'/js/contact-icon.js');
  drupal_add_js(drupal_get_path('theme', 'f4s_bs').'/js/sticky-scroll.js');
}

function f4s_bs_css_alter(&$css){
  $css['sites/all/themes/f4s_bs/bootstrap/css/bootstrap.min.css']['weight']=11;
  $css['sites/all/themes/f4s_bs/bootstrap/css/bootstrap-theme.min.css']['weight']=12;
  $css['sites/all/themes/aesbs337/css/fonts-style.css']['weight']=13;
  $css['sites/all/themes/aesbs337/css/regions-style.css']['weight']=14;
  $css['sites/all/themes/aesbs337/css/block-style.css']['weight']=15;
  $css['sites/all/themes/aesbs337/css/field-style.css']['weight']=16;
  $css['sites/all/themes/aesbs337/css/jquery.scrolling-tabs.min.css']['weight']=17;
  $css['sites/all/themes/f4s_bs/css/f4sfonts-style.css']['weight']=18;
  $css['sites/all/themes/f4s_bs/css/f4sregions-style.css']['weight']=19;
  $css['sites/all/themes/f4s_bs/css/f4sblock-style.css']['weight']=20;
  $css['sites/all/themes/f4s_bs/css/f4sfield-style.css']['weight']=21;
}

function f4s_bs_theme(){
	$items=array();

	$items['user_login']=array(
	'render element' => 'form',
	'path'=> drupal_get_path('theme', 'f4s_bs').'/templates',
	'template'=>'user_login',
	'preprocess functions'=>array(
	'f4s_bs_preprocess_user_login'
	),
	);
	return $items;
}

function f4s_bs_preprocess_maintenance_page(&$variables) {
  if (isset($variables['db_is_active']) && !$variables['db_is_active']) {
// Template suggestion for offline site
    $variables['theme_hook_suggestion'] = 'maintenance_page__offline';
  }
else {
// Template suggestion for live site (in maintenance mode)
    $variables['theme_hook_suggestion'] = 'maintenance_page';
 }
}
