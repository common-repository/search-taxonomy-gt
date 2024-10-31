<?php
/*
Plugin Name: Search Taxonomy GT
Plugin URI: http://www.gtplugins.com
Description: Adds a search functionality to your taxonomy metabox in the backend
Author: Gabriel Tavares
Author URI: http://www.gtplugins.com
Version: 1.2
Text Domain: searchTaxonomyGT
*/
/*
	This file is part of searchTaxonomyGT.

    searchTaxonomyGT is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    searchTaxonomyGT is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with searchTaxonomyGT.  If not, see <http://www.gnu.org/licenses/>.
*/
 
global $wpdb;
global $searchTaxonomyGT_version;
$searchTaxonomyGT_version = "1.2";

define( 'PLUGIN_DIR', dirname(__FILE__).'/' );  


function searchTaxonomyGT_install() {

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    add_option( "searchTaxonomyGT_version", $searchTaxonomyGT_version );
	$args=array(
	  'public'   => true,
	  '_builtin' => false
	);	
	
}
register_activation_hook( __FILE__, 'searchTaxonomyGT_install' );

function searchTaxonomyGT_unistall(){
	//delete_option('searchTaxonomyGT_options');
}
register_deactivation_hook( __FILE__, 'searchTaxonomyGT_unistall' );

add_action( 'admin_init', 'my_plugin_admin_init' );
   
   function searchTaxonomyGT_admin_init() {
       /* Register our stylesheet. */
      wp_register_style( 'searchTaxonomyGT_css', plugins_url('/css/searchTaxonomyGT.css', __FILE__));
	  wp_enqueue_style( 'searchTaxonomyGT_css' ); 
   }
function searchTaxonomyGT_enqueue_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_media();
	wp_register_script( 'searchTaxonomyGT_js', plugins_url('/js/searchTaxonomyGT.js', __FILE__), array('jquery') );
	wp_enqueue_script( 'searchTaxonomyGT_js' );
	 
}
add_action( 'admin_enqueue_scripts', 'searchTaxonomyGT_enqueue_admin_scripts' );
?>