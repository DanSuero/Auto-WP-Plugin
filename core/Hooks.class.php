<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Nope nothing here.
}

class Hooks{
    public static function trucksMeta($atts = ''){
        global $post;
        
        $val = shortcode_atts(array(
            'show' => 'default',
        ), $atts);
        
        $grab = 'about_the_truck_'.$val["show"];
        $results = get_post_meta($post->ID, $grab, true);
        
        if($val['show'] == 'default' || $results == ''){
            $results = "!";
        }
        
        return $results;
    }
}