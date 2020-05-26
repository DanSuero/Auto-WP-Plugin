<?php

class AddTrucks{
   public static function grabVIN($vin){
        $grabber = new WP_Query(array(
            'post_type' => 'sparrow-auto',
            'meta_query' => array(array(
                'key'     => 'about_the_truck_vin-number',
                'value'   => $vin,
                'compare' => '=',
            )),
        ));
        
        return $grabber->post_count;
    }
    
    public static function import_trucks($import){
        set_time_limit(1800);
        foreach($import as $item){
            if(self::grabVIN($item['VIN']) == 0){    
                $currentTitle = $item["Year"] ." ". $item["Make"] ." ". $item["Model"] ." ".$item["ModelNum"];

                $currentMeta = array(
                    'about_the_truck_stock-number' => $item["StockNum"],
                    'about_the_truck_vin-number' => $item["VIN"],
                    'about_the_truck_condition' => $item["Type"],
                    'about_the_truck_body-type' => $item["VehicleCategory"],
                    'about_the_truck_year' => $item["Year"],
                    'about_the_truck_make' => $item["Make"],
                    'about_the_truck_model' => $item["Model"],
                    'about_the_truck_sub-model' => $item["ModelNum"],
                    'about_the_truck_body-style' => $item["Style"],
                    'about_the_truck_doors' => $item["Doors"],
                    'about_the_truck_transmission' => $item["Transmission"],
                    'about_the_truck_engine' => $item["Engine"],
                    'about_the_truck_sale-status' => $item["SaleStatus"],
                    'about_the_truck_cylinders' => $item["Cylinders"],
                    'about_the_truck_drivetrain' => $item["Drivetrain"],
                    'about_the_truck_fuel-type' => $item["Fuel"],
                    'about_the_truck_mileage' => $item["Mileage"],
                    'about_the_truck_mpg-city' => $item["MpgCity"],
                    'about_the_truck_mpg-highway' => $item["MpgHighway"],
                    'about_the_truck_exterior-color' => $item["ExtColor"],
                    'about_the_truck_interior-color' => $item["IntColor"],
                    'about_the_truck_vehicle-title' => $item["Title"],
                    'about_the_truck_monthly-payment' => $item["MonthlyPayment"],
                    'about_the_truck_showroom-price' => $item["ShowroomPrice"],
                    'about_the_truck_internet-price' => $item["InternetPrice"],
                    'about_the_truck_youtube-url' => $item["YouTubeUrl"],
                    'about_the_truck_tag-line' => $item["Tagline"],
                    'about_the_truck_description' => $item["Description"],
                    'about_the_truck_address' => $item["Addr"],
                    'about_the_truck_city' => $item["City"].", ".$item["State"],
                    'about_the_truck_zip' => $item["Zip"],
                    'about_the_truck_kilometers' => $item["Kilometers"]   
                );

                $newPost = array(
                    'post_type' => 'sparrow-auto',
                    'post_title' => $currentTitle,
                    'post_status' => 'publish',
                    'meta_input' => $currentMeta
                );
                
                wp_insert_post($newPost);
            }
        }
    }
}
