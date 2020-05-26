<?php
class DeleteTrucks{
    public static function remove($list){
        $xmlQuery = array();
        $postsVin = array();
        $postQuery = new WP_Query(array(
            'post_type' => 'sparrow-auto',
            'posts_per_page' => -1
        ));
        
        foreach($list as $item){
            array_push($xmlQuery, $item['VIN']);
        }
        
        foreach($postQuery->posts as $post){
            $vin = get_post_meta($post->ID,'about_the_truck_vin-number', true);
            array_push($postsVin, $vin);
        }
        
        foreach($postsVin as $curTruck){
            $truckExists = array_search($curTruck, $xmlQuery);
            
            if($truckExists == ""){
                $curTruckID = new WP_Query(array(
                    'post_type' => 'sparrow-auto',
                    'posts_per_page' => -1,
                    'meta_query' => array(array(
                        'key'     => 'about_the_truck_vin-number',
                        'value'   => "$curTruck",
                        'compare' => '=',
                    ))
                ));
                wp_trash_post($curTruckID->posts[0]->ID);
            }
        }
        
    }
}