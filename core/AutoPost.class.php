<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Nope nothing here.
}

class AutoPost {
    private static $labels; 
    private static $args;
    public static $query = array(
        'post_type' => 'sparrow-auto',
        //'posts_per_page' => -1,
        'meta_query' => array(array(
            'key'     => 'about_the_truck_sale-status',
            'value'   => 'Sold',
            'compare' => '!=',
        )),
    );
    
    public static function get_labels(){
        return self::$labels = array(
		'name'                  => 'Trucks',
		'singular_name'         => 'Truck',
		'menu_name'             => 'Trucks',
		'name_admin_bar'        => 'Trucks',
		'archives'              => 'Truck Archives',
		'attributes'            => 'Truck Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Trucks',
		'add_new_item'          => 'Add New Truck',
		'add_new'               => 'Add New',
		'new_item'              => 'New Truck',
		'edit_item'             => 'Edit Truck',
		'update_item'           => 'Update Truck',
		'view_item'             => 'View Truck',
		'view_items'            => 'View Trucks',
		'search_items'          => 'Search Truck',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into truck',
		'uploaded_to_this_item' => 'Uploaded to this truck',
		'items_list'            => 'Trucks list',
		'items_list_navigation' => 'Trucks list navigation',
		'filter_items_list'     => 'Filter Truck list',
	   );
    }
    
    public static function get_args(){
        return self::$args = array(
		'label'                 => 'Truck',
		'description'           => 'Truck Inventory',
		'labels'                => self::$labels,
		'supports'              => array( 'title', 'thumbnail', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
        'rewrite'               => array('slug' => 'trucks')
	   );
    }
    
    public static function truck_post_type() {
        self::get_labels();
        self::get_args();
        register_post_type( 'sparrow-auto', self::$args );
        flush_rewrite_rules();
    }
    
    public static function load_custom_single_pages($single_template){
        global $post;

        if ($post->post_type != 'post' ) {
          $single_template = dirname( __FILE__ ) . '/../single-'.$post->post_type.'.php';
        }
        
        return $single_template;
    }
    
    public static function load_custom_archives_pages($template){
        //global $post;

        if (is_post_type_archive('sparrow-auto')) {
          $template = dirname( __FILE__ ) . '/../archives-sparrow-auto.php';
        }
        
        return $template;
    }
    
    public static function metaQuery(){
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        self::$query['paged'] = $paged;
        return new WP_Query(self::$query);
    }
}
