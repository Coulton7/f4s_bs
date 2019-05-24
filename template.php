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
