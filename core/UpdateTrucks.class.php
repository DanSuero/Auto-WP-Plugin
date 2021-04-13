<?php

    class UpdateTrucks{
        public static function update_price($list){
            foreach($list as $truck){
                $find = new WP_Query(array(
                    'post_type' => 'sparrow-auto',
                    'posts_per_page' => -1,
                    'meta_query' => array(array(
                        'key'     => 'about_the_truck_vin-number',
                        'value'   => $truck['VIN'],
                        'compare' => '=',
                    ))
                ));
                
                $cur_price = get_post_meta($find->post->ID, 'about_the_truck_internet-price', true);
                
                if($find->post_count != 0){
                 
                        update_post_meta($find->post->ID, 'about_the_truck_internet-price', $truck["InternetPrice"]);
                        //update_post_meta($find->post->ID, 'about_the_truck_showroom-price', $truck["InternetPrice"]);
                }
            }
        }
    }