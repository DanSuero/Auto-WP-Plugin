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
    //add_action("admin_head-edit.php", array('ImportXML', 'add_import_btn'));
    add_filter( 'single_template', array('AutoPost','load_custom_single_pages'));
    add_filter( 'template_include', array('AutoPost','load_custom_archives_pages'));
    add_filter( 'manage_edit-sparrow-auto_columns', array("AutoPost","column_head"));
    
    
    //To add metaboxes to custom post type.
    add_action( 'add_meta_boxes', array( 'AutoMeta', 'add_meta_boxes' ));
    add_action( 'save_post', array( 'AutoMeta', 'save_post' ) );

    
    //shortcodes
    add_shortcode("trucks", array("Hooks","trucksMeta"));
    add_action( 'manage_sparrow-auto_posts_custom_column', array("AutoPost","column_data"), 10, 2 );
    
    
    //Cron
    if(!wp_next_scheduled( 'auto_hourly' )){    
        wp_schedule_event( time(), 'hourly', 'auto_hourly' );
    }
    add_action("auto_hourly", "autoXMLUpdater");
    function autoXMLUpdater(){
        //Getting all trucks in current inventory
        $postQuery = AutoPost::metaQuery();
        
        //Creating a new truck object
        $trucks = new ImportXML();
        
        //Setting XML URL
        $trucks->set_xml_URL("https://clients.automanager.com/0254448e2be24576857eb0d1e26a96bf/inventory.xml?ID=ee30fb1027&VehicleCategory=Passenger&Photos=1&Features=1");
        
        $xmlQuery = array();

        foreach(ImportXML::$converted_xml->Vehicle as $data){
            array_push($xmlQuery, "$data->VIN");
        }
        
        if(count(ImportXML::$converted_xml->Vehicle) > 0){
            set_time_limit(2700);
            foreach($postQuery->posts as $post){
                $currentPostVin = get_post_meta($post->ID, 'about_the_truck_vin-number', true);
                $currentPostPrice = get_post_meta($post->ID, 'about_the_truck_internet-price', true);
                $searchingVin = array_search($currentPostVin, $xmlQuery);

                $newPrice = ImportXML::$converted_xml->Vehicle[$searchingVin]->InternetPrice;

                if($currentPostPrice != "$newPrice"){
                    update_post_meta($post->ID, 'about_the_truck_internet-price', "$newPrice");
                }

                if(ImportXML::$converted_xml->Vehicle[$searchingVin]->SaleStatus == "Sold"){
                    wp_trash_post($post->ID);
                }elseif($searchingVin == ''){
                    wp_trash_post($post->ID);
                }

            }
        }
        
        
        
        ImportXML::inserting_trucks("true");
    }
}