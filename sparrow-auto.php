<?php
/*
Plugin Name: Routemaster Auto
Description: Xml importer and Inventory add on.
Version: 0.1
Author: Danny Suero - Sparrow Websites
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Nope nothing here.
}



//Auto Class Loader
include_once "autoloader.php";

if(!function_exists( 'start_sparrow_auto' )){
    //Post Type to work.
    add_action("init", array('AutoPost','truck_post_type'));
    add_action("admin_head-edit.php", array('ImportXML', 'add_import_btn'));
    add_filter( 'single_template', array('AutoPost','load_custom_single_pages'));
    add_filter( 'template_include', array('AutoPost','load_custom_archives_pages'));
    
    //To add metaboxes to custom post type.
    add_action( 'add_meta_boxes', array( 'AutoMeta', 'add_meta_boxes' ));
    add_action( 'save_post', array( 'AutoMeta', 'save_post' ) );
}