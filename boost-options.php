<?php
/**
 * Plugin Name: Boost Options
 * Plugin URI: https://github.com/kr3wangel/Boost-Options.git
 * Description: Adds custom functions to add a new user role, hide itself from the plugin menu, 
 * Author: Angel Herrera
 * Author URI: http://boostability.com
 * Version: 1.0
 */	

/* Create new user */	
$result = add_role( 'dexadmin', __('Dex Admin' ),
 
array(
 
'read' => true, 
'edit_posts' => true, 
'edit_pages' => true, 
'edit_others_posts' => true, 
'create_posts' => true, 
'manage_categories' => true, 
'publish_posts' => true, 
'activate_plugins' => true, 
'activate_plugins' => true, 
'delete_others_pages' => true, 
'delete_others_posts' => true, 
'delete_pages' => true, 
'delete_posts' => true, 
'delete_private_pages' => true, 
'delete_private_posts' => true, 
'delete_published_pages' => true, 
'delete_published_posts' => true, 
'edit_dashboard' => true, 
'edit_others_pages' => true, 
'edit_others_posts' => true, 
'edit_pages' => true, 
'edit_posts' => true, 
'edit_private_pages' => true, 
'edit_private_posts' => true, 
'edit_published_pages' => true, 
'edit_published_posts' => true, 
'edit_theme_options' => true, 
'export' => true, 
'import' => true, 
'list_users' => true, 
'manage_categories' => true, 
'manage_links' => true, 
'manage_options' => true, 
'moderate_comments' => true, 
'promote_users' => true, 
'publish_pages' => true, 
'publish_posts' => true, 
'read_private_pages' => true, 
'read_private_posts' => true, 
'read' => true, 
'remove_users' => true, 
'switch_themes' => true, 
'upload_files' => true, 
'update_core' => true, 
'update_plugins' => true, 
'update_themes' => true, 
'install_plugins' => true, 
'install_themes' => true, 
'delete_themes' => true, 
'delete_plugins' => true, 
'edit_plugins' => true, 
'edit_themes' => true, 
'edit_files' => true, 
'edit_users' => true, 
'create_users' => true, 
'view_stream' => false,
'stream_options' => false,
 
)
);


/* Add Stream Cap to Admin role */
function add_capability() {
    // gets the author role
    $role = get_role( 'administrator' );
    // This only works, because it accesses the class instance.
    $role->add_cap( 'stream_options' ); 
}
add_action( 'admin_init', 'add_capability');



/* Hide Stream and Boost-WP from plugin library */
function hide_plugin_boosttricks() {
  global $wp_list_table;
  $hidearr = array('stream/stream.php','boost-wp/boost-wp.php');
  $myplugins = $wp_list_table->items;
  foreach ($myplugins as $key => $val) {
    if (in_array($key,$hidearr)) {
      unset($wp_list_table->items[$key]);
    }
  }
}
add_action('pre_current_active_plugins', 'hide_plugin_boosttricks');

?>