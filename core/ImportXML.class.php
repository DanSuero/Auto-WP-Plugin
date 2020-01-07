<?php

include_once dirname(__FILE__).'/../../../../wp-load.php';

class ImportXML{
    private $xml;
    private static $converted_xml;
    
    public function set_xml_URL($url){
        $this->xml = $url;
        return $this->coverting_xml();
    }
    
    public function get_xml_URL(){
        return $this->xml;
    }
    
    public function coverting_xml (){
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $this->get_xml_URL());

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // $output contains the output string
        $xmlString = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        
        return self::$converted_xml = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);
    }
    
    public static function add_import_btn(){
        
        
        if ($_GET["post_type"] != "sparrow-auto") {
            return;
        }?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $($(".wrap .page-title-action")[0]).after("<a class='add-new-h2 xml-import'>Import XML</a>");
                $('.xml-import').on('click', function(e){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url:'<?php echo home_url('/wp-content/plugins/sparrow-auto/importer.php'); ?>',
                        data: {import: true},
                    }).done(function(data){
                        var textContent = data.toString();
                        if (textContent == "true"){
                            location.reload();
                        }else{
                            alert(data);
                        }
                    });
                });
            });
        </script>
    <?php
    }
    
    public static function inserting_trucks($import){
        if($import != true){
            exit; //yep lets stop.
        }
        set_time_limit(3600);
        foreach(self::$converted_xml as $item){
            
            $currentTitle = $item->Year ." ". $item->Make ." ". $item->Model ." ".$item->ModelNum ;
            $inserter = array();
            $grabPhotos = array();
             
            foreach($item->PhotoURLs->PhotoURL as $link){
                array_push($inserter, Upload::crb_insert_attachment_from_url($link));
            }
            $grabPhotos = $inserter;
            
            $currentMeta = array(
                'about_the_truck_stock-number' => "$item->StockNum",
                'about_the_truck_vin-number' => "$item->VIN",
                'about_the_truck_condition' => "$item->Type",
                'about_the_truck_body-type' => "$item->VehicleCategory",
                'about_the_truck_year' => "$item->Year",
                'about_the_truck_make' => "$item->Make",
                'about_the_truck_model' => "$item->Model",
                'about_the_truck_sub-model' => "$item->ModelNum",
                'about_the_truck_body-style' => "$item->Style",
                'about_the_truck_doors' => "$item->Doors",
                'about_the_truck_transmission' => "$item->Transmission",
                'about_the_truck_engine' => "$item->Engine",
                'about_the_truck_sale-status' => "$item->SaleStatus",
                'about_the_truck_cylinders' => "$item->Cylinders",
                'about_the_truck_drivetrain' => "$item->Drivetrain",
                'about_the_truck_fuel-type' => "$item->Fuel",
                'about_the_truck_mileage' => "$item->Mileage",
                'about_the_truck_mpg-city' => "$item->MpgCity",
                'about_the_truck_mpg-highway' => "$item->MpgHighway",
                'about_the_truck_exterior-color' => "$item->ExtColor",
                'about_the_truck_interior-color' => "$item->IntColor",
                'about_the_truck_vehicle-title' => "$item->Title",
                'about_the_truck_monthly-payment' => "$item->MonthlyPayment",
                'about_the_truck_showroom-price' => "$item->ShowroomPrice",
                'about_the_truck_internet-price' => "$item->InternetPrice",
                'about_the_truck_youtube-url' => "$item->YouTubeUrl",
                'about_the_truck_tag-line' => "$item->Tagline",
                'about_the_truck_description' => "$item->Description",
                'about_the_truck_address' => "$item->Addr",
                'about_the_truck_city' => $item->City.", ".$item->State,
                'about_the_truck_zip' => "$item->Zip",
                'about_the_truck_kilometers' => "$item->Kilometers",
                'vdw_gallery_id' => $grabPhotos          
            );
            
            $newPost = array(
                'post_type' => 'sparrow-auto',
                'post_title' => $currentTitle,
                'post_status' => 'publish',
                'meta_input' => $currentMeta
            );
            
            
            wp_insert_post($newPost);
            
        }
        echo "true";
    }
}
