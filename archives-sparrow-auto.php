<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Nope nothing here.
}

get_header();



$trucks = AutoPost::metaQuery();

?>
<style>

    h1{
        font-family: "Rubik", Sans-serif;
        font-size: 35px;
        text-transform: uppercase;
        margin-top: 50px;
        margin-bottom: 50px;
    }    
    
.column-row > .col{
    margin-bottom: 40px;
}

.column-row > .col .card{
    display: flex;
    border-radius: 5px;
    box-shadow: 0px 0px 16px -6px #0006;
}

.column-row > .col .img-section{
    flex: 0 0 40%;
    align-items: center;
}

.column-row > .col .text-section{
    flex: auto;
    padding-left: 20px;
    padding-top: 20px;
    padding-right: 20px;
    
    position: relative;
}

.column-row > .col h3{
    color: #080023;
    
    font-family: "Assistant", Sans-serif;
    font-size: 30px;
    font-weight: 900;
    line-height: 30px;
    
    margin-top: 0;
    margin-bottom: 5px;
}

.column-row > .col .price h3{
    font-size: 20px;
    margin: 0;
    line-height: 50px;
}

.column-row > .col h2{
    color: #080023;
    
    font-family: "Assistant", Sans-serif;
    font-size: 14px;
    font-weight: 900;
    line-height: 18px;
    
    margin-top: 0;
}

.column-row > .col .subtitle{
    color: #474259;
    
    font-family: "Assistant", Sans-serif;
    font-size: 18px;
    font-weight: 600;
    line-height: 18px;
    
    display: inline-block;
    margin-bottom: 20px;
}

.column-row > .col .location{
    color: #474259;
    
    font-family: "Assistant", Sans-serif;
    font-size: 18px;
    line-height: 18px;
    
    display: inline-block;
    margin-bottom: 20px;
}

.column-row > .col img{
    width: 100%;
    height: auto;
    display: block;
    border-radius: 3px 0px 0px 3px;
}

.column-row > .col .event-buttons{
    display: flex;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    padding-left: 20px;
}

.column-row > .col .event-buttons > div{
    flex: 0 0 50%;
}
.column-row > .col div.buy-wrapper{
    margin-right: 50px;
}

.column-row > .col .event-buttons > div > a,
.column-row > .col .buy-wrapper .buy-ticket{
    display: inline-block;
    transition: all .3s;
}

.column-row > .col a.buy-ticket{
    font-family: "Assistant", Sans-serif;
    font-size: 13px;
    font-weight: 900;
    text-transform: uppercase;
    line-height: 50px;
    letter-spacing: 5.2px;
    fill: #1c002b;
    color: #1c002b;
    background-color: #fcf031;
    border-radius: 0px 0px 0px 0px;
    padding: 0px 47px 0px 50px;
}

.column-row > .col a.buy-ticket:hover,
.column-row > .col a.more-details:hover,
.column-row > .col .buy-wrapper .buy-ticket:hover{
    color: #fff;
    background-color: #6087c9;
}

.column-row > .col a.more-details{
    font-family: "Assistant", Sans-serif;
    font-size: 13px;
    font-weight: 900;
    text-transform: uppercase;
    line-height: 50px;
    letter-spacing: 5.2px;
    fill: #ffffff;
    color: #ffffff;
    background-color: #001c38;
    border-radius: 0px 0px 5px 0px;
    padding: 0px 47px 0px 50px;
    width: 100%;
    text-align: center;
}

.column-row > p.detail-img-wrapper{
    text-align: center;
    padding: 20px 50px; 
}

.front-page{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.front-page > .col{
    flex: 0 0 23%;
    
    background-color: #4b4646;
    border-radius: 3px;
    box-shadow: 0 0 10px 0 rgba(0,0,0,.15);
    transition: all .3s ease-out;
}

.front-page > .col h2, 
.front-page > .col .subtitle, 
.front-page > .col .location,
.front-page > .col .buy-wrapper{
    display: none;
}

.front-page > .col img{
    display: block;
    border-radius: 3px 3px 0 0;
}

.front-page > .col .img-section{
    margin-bottom: 40px;
    position: relative;
}

.front-page > .col .img-link::after{
    content: "";
    background-image: linear-gradient(0deg,rgba(0,0,0,.35),transparent 75%);
    bottom: 0;
    height: 100%;
    width: 100%;
    position: absolute;
    transition: all .3s ease-out;
}

.front-page > .col:hover{
    box-shadow: 0 0 30px 0 rgba(0,0,0,.15);
}

.front-page > .col:hover .img-link:after{
    opacity: 0.5;
}

.front-page > .col .title-link{
    color: #fcf031;
    display: block;
    font-family: "Assistant", Sans-serif;
    font-weight: 800;
    margin-bottom: 25px;
    font-size: 21px;
    line-height: 25px;
}

.front-page > .col .text-section{
    padding: 0 30px;
}

.front-page > .col .more-details{
    color: #ffffff;
    font-size: 16px;
    text-transform: uppercase;
    font-family: "Assistant", Sans-serif;
    font-weight: 500;
    margin-bottom: 20px;
    display: inline-block;
}
    
.column-row > .col .elementor-icon-list-items{
    display: flex;
    justify-content: space-between;
}
.column-row > .col .elementor-icon-list-items li{
  
}

    .nav-previous{ float: left; }
    .nav-next { float: right; }

@media screen and (max-width:800px){
    .front-page{
        flex-wrap: wrap;
    }
    
    .front-page > .col{
        flex: 0 0 48%;
        margin-bottom: 40px;
    }
}

@media screen and (max-width:575px){
    .front-page > .col{
        flex: 0 0 100%;
    }
    
    .column-row > .col .card{
        flex-wrap: wrap;
    }
    
    .column-row > .col .text-section,
    .column-row > .col .img-section{
        padding: 0px;
        flex: 0 0 100%;
        margin-bottom: 20px;
    }
    .column-row > .col div.buy-wrapper{
        margin-right: 10px;
    }
    .column-row > .col a.more-details,
    .column-row > .col a.buy-ticket
    {
        padding: 0px 42px 0px 42px ;
    }
    
    .column-row > .col h3{
        font-size: 28px;
        line-height: 30px;
    }
    .column-row > .col .text-section{
        text-align: center;
    }
    .column-row > .col .event-buttons{
        justify-content: center;
    }
}
</style>

<main class="site-main" role="main">


    <header class="page-header">
        <h1 class="entry-title">Our Inventory</h1>
    </header>

    <div class="page-content">
        <?php while ( $trucks->have_posts() ) { $trucks->the_post(); ?>
        <article class="post row column-row">
            <div class="col">
                <div class="card">
                    <div class="img-section">
                        <a href="<?php echo get_permalink(); ?>" class="img-link">
                        <?php
                            $imga = get_post_meta(get_the_ID(),'vdw_gallery_id',true);
                            echo wp_get_attachment_image($imga[0], 'large'); ?>
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
                        <div class="event-buttons">
                            <div class="price">
                                <h3>Price: $<?php echo number_format(get_post_meta(get_the_ID(),'about_the_truck_internet-price',true), 2, '.',','); ?></h3>
                            </div>
                            <div class="more-wrapper">
                                <a class="btn more-details" href="<?php echo get_permalink($data->ID); ?>">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>

    <?php wp_link_pages(); ?>

    <?php global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav class="pagination" role="navigation">
        <?php /* Translators: HTML arrow */ ?>
        <div class="nav-previous">
            <?php next_posts_link( sprintf( '%s More', '<span class="meta-nav">&larr;</span>' ) ); ?>
        </div>
        <?php /* Translators: HTML arrow */ ?>
        <div class="nav-next">
            <?php previous_posts_link( sprintf( 'Previous %s', '<span class="meta-nav">&rarr;</span>' ) ); ?>
        </div>
    </nav>
    <?php endif; ?>

</main>

<?php
get_footer();
