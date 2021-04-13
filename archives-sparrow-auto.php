<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Nope nothing here.
}

get_header();

$query = new Search();
$trucks = AutoPost::metaQuery($query->Query());
$gettingTrucks = getXML::get_string("https://clients.automanager.com/0254448e2be24576857eb0d1e26a96bf/inventory.xml?ID=ee30fb1027&VehicleCategory=Passenger&Photos=1");
$xmlQuery = array();

foreach($gettingTrucks["Vehicle"] as $data){
    array_push($xmlQuery, $data['VIN']);
}

$find = new WP_Query(array(
                    'post_type' => 'sparrow-auto',
                    'posts_per_page' => -1,
                    'meta_query' => array(array(
                        'key'     => 'about_the_truck_vin-number',
                        'value'   => "1FVACWT1GHHG3274",
                        'compare' => '=',
                    ))
                ));
echo $find->post_count;
Style::archive();
?>


<main class="site-main" role="main">
    <header class="page-header">
        <h1 class="entry-title">Our Inventory</h1>
    </header>
    <?php Search::renderSearch(); ?>
    <div class="page-content">
        <?php while ( $trucks->have_posts() ) { $trucks->the_post(); 
            $grab = get_post_meta(get_the_ID(), "about_the_truck_vin-number", true);
            $found = array_search($grab, $xmlQuery);
            if($gettingTrucks["Vehicle"][$found]["PhotoURLs"]["PhotoURL"][0] != ""){
        ?>
        
        <article class="post row column-row">
            <div class="col">
                <div class="card">
                    <div class="img-section">
                        <a href="<?php echo get_permalink(); ?>" class="img-link">
                        <img width="800" height="600" src="<?php echo $gettingTrucks["Vehicle"][$found]["PhotoURLs"]["PhotoURL"][0]; ?>" class="attachment-large size-large" alt="">
                       </a>
                    </div>
                    <div class="text-section">

                        <h3 class="entry-title">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a>
                        </h3>
                        <h2><?php echo get_post_meta(get_the_ID(),'about_the_truck_tag-line',true); ?></h2>
                        <div class="elementor-element elementor-element-b0ee951 elementor-widget elementor-widget-heading" data-id="b0ee951" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default">Quick Facts:</h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-a245d8e elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="a245d8e" data-element_type="widget" data-widget_type="icon-list.default">
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items">
                                    <li class="elementor-icon-list-item">
                                        <span class="elementor-icon-list-icon">
                                            <i aria-hidden="true" class="fas fa-road"></i> </span>
                                        <span class="elementor-icon-list-text">Mileage: <?php echo number_format(get_post_meta($post->ID,'about_the_truck_mileage', true), 0, '',','); ?></span>

                                    </li>
                                    <li class="elementor-icon-list-item">
                                        <span class="elementor-icon-list-icon">
                                            <i aria-hidden="true" class="fas fa-cogs"></i> </span>
                                        <span class="elementor-icon-list-text">Transmission: <?php echo get_post_meta($post->ID,'about_the_truck_transmission', true); ?></span>
                                    </li>
                                     <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-gas-pump"></i> </span>
                                                    <span class="elementor-icon-list-text">Fuel: <?php echo get_post_meta($post->ID,'about_the_truck_fuel-type', true); ?></span>
                                                </li>
                                </ul>
                            </div>
                        </div>
                         <div class="elementor-element elementor-element-a245d8e elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="a245d8e" data-element_type="widget" data-widget_type="icon-list.default">
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items">
                                    <li class="elementor-icon-list-item">
                                       <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-truck"></i> </span>
                                                    <span class="elementor-icon-list-text">Engine: <?php echo get_post_meta($post->ID,'about_the_truck_engine', true); ?></span>

                                    </li>
                                    <li class="elementor-icon-list-item">
                                        <span class="elementor-icon-list-icon">
                                            <i aria-hidden="true" class="far fa-newspaper"></i> </span>
                                        <span class="elementor-icon-list-text">Stock #: <?php echo get_post_meta($post->ID,'about_the_truck_stock-number', true); ?></span>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="event-buttons">
                            <div class="price">
                                <h3>Price: $<?php echo number_format(get_post_meta(get_the_ID(),'about_the_truck_internet-price',true), 2, '.',','); ?></h3>
                            </div>
                            <div class="more-wrapper">
                                <a class="btn more-details" href="<?php echo get_permalink(get_the_ID()); ?>">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php }} ?>
    </div>

    <?php wp_link_pages(); ?>

    <?php /*global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav class="pagination" role="navigation">
    
        <div class="nav-previous">
            <?php next_posts_link( sprintf( '%s More', '<span class="meta-nav">&larr;</span>' ) ); ?>
        </div>
        
        <div class="nav-next">
            <?php previous_posts_link( sprintf( 'Previous %s', '<span class="meta-nav">&rarr;</span>' ) ); ?>
        </div>
    </nav>
    <?php endif; */?>

</main>

<?php
get_footer();
