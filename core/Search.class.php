<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Nope nothing here.
}

class Search {
    private $query;
    
    public function Query(){
        if(empty($_GET)){
            return;
        }
        
        foreach($_GET as $name => $value){
            $clean[esc_textarea($name)] = esc_textarea($value);
        }
        
        $this->$query = array(
            'post_type' => 'sparrow-auto',
            'posts_per_page' => -1,
        );
        
        if(!empty($clean['s'])){
            $this->$query["s"] = $clean['s'];
        }
        
        
        $push = array();
        if(!empty($clean['sort'])){
            switch($clean['sort']){
                case "year_low_to_high":
                    $this->$query["meta_key"] = "about_the_truck_year";
                    $this->$query['orderby'] = 'meta_value_num';
                    $this->$query['order'] = 'ASC';
                break;
                case "year_high_to_low":
                    $this->$query["meta_key"] = "about_the_truck_year";
                    $this->$query['orderby'] = 'meta_value_num';
                    $this->$query['order'] = 'DESC';
                break;
                case "make":
                    $this->$query["meta_key"] = "about_the_truck_make";
                    $this->$query['orderby'] = 'meta_value';
                break;
                case "model":
                    $this->$query["meta_key"] = "about_the_truck_model";
                    $this->$query['orderby'] = 'meta_value';
                break;
                case "miles_low_to_high":
                    $this->$query["meta_key"] = "about_the_truck_mileage";
                    $this->$query['orderby'] = 'meta_value_num';
                    $this->$query['order'] = 'ASC';
                break;
                case "miles_high_to_low":
                    $this->$query["meta_key"] = "about_the_truck_mileage";
                    $this->$query['orderby'] = 'meta_value_num';
                    $this->$query['order'] = 'DESC';
                break;
                case "stock":
                    $this->$query["meta_key"] = "about_the_truck_stock-number";
                    $this->$query['orderby'] = 'meta_value';
                break;
                case "price_low_to_high":
                    $this->$query["meta_key"] = "about_the_truck_internet-price";
                    $this->$query['orderby'] = 'meta_value_num';
                    $this->$query['order'] = 'ASC';
                break;
                case "price_high_to_low":
                    $this->$query["meta_key"] = "about_the_truck_internet-price";
                    $this->$query['orderby'] = 'meta_value_num';
                    $this->$query['order'] = 'DESC';
                break;
                default:
                break;
            }
           
        }
        
        
        if(!empty($clean['fuel'])){
            $put = array(
                "key" => "about_the_truck_fuel-type",
                "value" => $clean['fuel'],
                'compare' => 'Like'
            );
            array_push($push,$put);
        }
        
        if(!empty($clean['make'])){
            $put = array(
                "key" => "about_the_truck_make",
                "value" => $clean['make'],
                "compare" => 'Like'
            );
            array_push($push,$put);
        }
        
        if(!empty($clean['yr'])){
            $put = array(
                "key" => "about_the_truck_year",
                "value" => $clean['yr'],
                'compare' => 'Like'
            );
            array_push($push,$put);
        }
        
        if(!empty($clean['price'])){
            $put = array(
                "key" => "about_the_truck_internet-price",
                "value" => $clean['price'],
                'compare' => '<',
                'type' => 'NUMERIC'
            );
            array_push($push,$put);
        }
        
        if(!empty($clean['miles'])){
            $put = array(
                "key" => "about_the_truck_mileage",
                "value" => $clean['miles'],
                'compare' => '<',
                'type' => 'NUMERIC'
            );
            array_push($push,$put);
        }
        
        if(count($push) != 0){
            $this->$query["meta_query"] = $push;
        }
        
        return $this->$query;
    }
    
    private static function getData($get = ''){
        
        switch($get){
            case 'fuel':
                $grab = 'about_the_truck_fuel-type';
            break;
            case 'make':
                $grab = 'about_the_truck_make';
            break;
            case 'year':
                $grab = 'about_the_truck_year';
            break;
            default:
            break;
        }
        
        $query = new WP_Query(array(
            'post_type' => 'sparrow-auto',
            'posts_per_page' => -1,
        ));
        
        foreach($query->posts as $a ){
            $dirtyArray[] .= get_post_meta($a->ID,$grab,true); 
        }
        
        $giveback = array_unique($dirtyArray);
        
        return $giveback;
    }
    
    public static function renderSearch(){
        $sort = array( '','year_low_to_high', 'year_high_to_low', 'miles_low_to_high', 'miles_high_to_low', 'price_low_to_high', 'price_high_to_low', 'make', 'model', 'stock');
        $price = array('','5000', '10000', '15000', '20000', '25000', '50000', '100000', '150000', '200000', '300000');
        $fuel = self::getData('fuel');
        $make = self::getData('make');
        $year = self::getData('year');
        arsort($year);
        asort($make);
        ?>
        <section class="search-box">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="search-container">
                        <input id="search" class="search-input" type="text" placeholder="Search" <?php echo ($_GET["s"] == "")?"":"value='".$_GET["s"]."'"; ?> />
                        <button class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row justify-center">
                        <div class="col">
                            <label for="fuel" class="sort">Fuel:</label>
                            <select id="fuel" class="sort">
                                <option value=""></option>
                                <?php
                                    $select_val = esc_textarea($_GET['fuel']);
                                    foreach($fuel as $a){
                                        $selected = ($select_val == $a)? "selected" : "";
                                        echo sprintf('<option value="%s" %s>%s</option>',$a,$selected,ucfirst($a));
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="make" class="sort">Make:</label>
                            <select id="make" class="sort">
                                <option value=""></option>
                                <?php
                                    $select_val = esc_textarea($_GET['make']);
                                    foreach($make as $a){
                                        $selected = ($select_val == $a)? "selected" : "";
                                        echo sprintf('<option value="%s" %s>%s</option>',$a,$selected,ucfirst($a));
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="yr" class="sort">Year:</label>
                            <select id="yr" class="sort">
                                <option value=""></option>
                                <?php
                                    $select_val = esc_textarea($_GET['yr']);
                                    foreach($year as $a){
                                        $selected = ($select_val == $a)? "selected" : "";
                                        echo sprintf('<option value="%s" %s>%s</option>',$a,$selected,ucfirst($a));
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="price" class="sort">Price:</label>
                            <select id="price" class="sort">
                                <?php
                                    $select_val = esc_textarea($_GET['price']);
                                    foreach($price as $a){
                                        $selected = ($select_val == $a)? "selected" : "";
                                        echo sprintf('<option value="%s" %s>%s</option>',$a, $selected, ($a == '')?'':'$'.number_format($a, 0, '',','));
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="miles" class="sort">Miles:</label>
                            <select id="miles" class="sort">
                                <?php
                                    $select_val = esc_textarea($_GET['miles']);
                                    foreach($price as $a){
                                        $selected = ($select_val == $a)? "selected" : "";
                                        echo sprintf('<option value="%s" %s>%s</option>',$a, $selected,number_format($a, 0, '',','));
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="sort" class="sort">Sort by:</label>
                            <select id="sort" class="sort">
                                <?php 
                                    $select_val = esc_textarea($_GET['sort']);
                                    foreach($sort as $a){
                                        $selected = ($select_val == $a)? "selected" : "";
                                        echo sprintf('<option value="%s" %s>%s</option>',$a,$selected,str_replace("_"," ",ucfirst($a)));
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="application/javascript">
            jQuery(document).ready(function($){
                var url = window.location.href,
                    new_url,
                    get_Data,
                    get_param;
                
                function paramChecker(name){
                    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                    return results[1] || 0;
                }
                
                function getParameterByName(name, url) {
                    if (!url) url = window.location.href;
                    name = name.replace(/[\[\]]/g, '\\$&');
                    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                        results = regex.exec(url);
                    if (!results) return null;
                    if (!results[2]) return '';
                    return decodeURIComponent(results[2].replace(/\+/g, ' '));
                }
                
                function updateURLParameter(url, param, paramVal){
                    var TheAnchor = null;
                    var newAdditionalURL = "";
                    var tempArray = url.split("?");
                    var baseURL = tempArray[0];
                    var additionalURL = tempArray[1];
                    var temp = "";

                    if (additionalURL) 
                    {
                        var tmpAnchor = additionalURL.split("#");
                        var TheParams = tmpAnchor[0];
                            TheAnchor = tmpAnchor[1];
                        if(TheAnchor)
                            additionalURL = TheParams;

                        tempArray = additionalURL.split("&");

                        for (var i=0; i<tempArray.length; i++)
                        {
                            if(tempArray[i].split('=')[0] != param)
                            {
                                newAdditionalURL += temp + tempArray[i];
                                temp = "&";
                            }
                        }        
                    }
                    else
                    {
                        var tmpAnchor = baseURL.split("#");
                        var TheParams = tmpAnchor[0];
                            TheAnchor  = tmpAnchor[1];

                        if(TheParams)
                            baseURL = TheParams;
                    }

                    if(TheAnchor)
                        paramVal += "#" + TheAnchor;

                    var rows_txt = temp + "" + param + "=" + paramVal;
                    return baseURL + "?" + newAdditionalURL + rows_txt;
                }
                
                function searchInput(){
                    var input_data = $('.search-input').val();
                    if(input_data != ""){
                        if(window.location.search == ""){
                            window.location.href = url + "?s=" + input_data;        
                        }else{
                            if(getParameterByName("s") == undefined ){
                                window.location.href = url + "&s=" + input_data;
                            }else if(getParameterByName("s")!= input_data){
                                window.location.href = updateURLParameter(url,"s",input_data);
                            }
                        }
                    }
                }
                
                $(".sort").on("change", function(){
                    if(window.location.search == ""){
                        get_param = $(this).attr("id");
                        get_Data = $(this).val();
                        
                        window.location.href = url + "?" + get_param + "=" + get_Data;        
                    }else{
                        get_param = $(this).attr("id");
                        get_Data = $(this).val();
                        
                        if(getParameterByName(get_param) == undefined ){
                            window.location.href = url + "&" + get_param + "=" + get_Data;
                        }else if(getParameterByName(get_param)!= get_Data){
                            window.location.href = updateURLParameter(url,get_param,get_Data);
                        }
                    }
                });
                
                $(".search-btn").on("click",function(){
                   searchInput();
                });
                $('.search-input').on('keypress',function(e){
                    if($('.search-input').is(":focus")){
                        if(e.which == 13){
                            searchInput();
                        }
                    }
                });
             });
        </script>
        <?php
    }
}