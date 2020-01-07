<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Nope nothing here.
}


class AutoMeta {
	private static $screens = array(
		'sparrow-auto',
	);
	private static $fields = array(
		array(
			'id' => 'stock-number',
			'label' => 'Stock Number',
			'type' => 'text',
		),
		array(
			'id' => 'vin-number',
			'label' => 'Vin Number',
			'type' => 'text',
		),
		array(
			'id' => 'condition',
			'label' => 'Condition',
			'type' => 'select',
			'options' => array(
				'Select' => '',
				'New' => 'New',
				'Used' => 'Used',
				'Certified' => 'Certified',
			),
		),
		array(
			'id' => 'body-type',
			'label' => 'Body Type',
			'type' => 'text',
		),
		array(
			'id' => 'year',
			'label' => 'Year',
			'type' => 'text',
		),
		array(
			'id' => 'make',
			'label' => 'Make',
			'type' => 'text',
		),
		array(
			'id' => 'model',
			'label' => 'Model',
			'type' => 'text',
		),
		array(
			'id' => 'sub-model',
			'label' => 'Sub Model',
			'type' => 'text',
		),
		array(
			'id' => 'body-style',
			'label' => 'Body Style',
			'type' => 'text',
		),
		array(
			'id' => 'doors',
			'label' => 'Doors',
			'type' => 'text',
		),
		array(
			'id' => 'transmission',
			'label' => 'Transmission',
			'type' => 'text',
		),
		array(
			'id' => 'engine',
			'label' => 'Engine',
			'type' => 'text',
		),
		array(
			'id' => 'sale-status',
			'label' => 'Sale Status',
			'type' => 'select',
			'options' => array(
				'select' => '',
				'Available' => 'Available',
				'Sold' => 'Sold',
				'Unpaid' => 'Unpaid',
			),
		),
		array(
			'id' => 'cylinders',
			'label' => 'Cylinders',
			'type' => 'text',
		),
		array(
			'id' => 'drivetrain',
			'label' => 'Drivetrain',
			'type' => 'text',
		),
		array(
			'id' => 'fuel-type',
			'label' => 'Fuel Type',
			'type' => 'text',
		),
		array(
			'id' => 'mileage',
			'label' => 'Mileage',
			'type' => 'text',
		),
		array(
			'id' => 'mpg-city',
			'label' => 'MPG City',
			'type' => 'text',
		),
		array(
			'id' => 'mpg-highway',
			'label' => 'MPG Highway',
			'type' => 'text',
		),
		array(
			'id' => 'exterior-color',
			'label' => 'Exterior Color',
			'type' => 'text',
		),
		array(
			'id' => 'interior-color',
			'label' => 'Interior Color',
			'type' => 'text',
		),
		array(
			'id' => 'location',
			'label' => 'Location',
			'type' => 'text',
		),
		array(
			'id' => 'vehicle-title',
			'label' => 'Vehicle Title',
			'type' => 'text',
		),
		array(
			'id' => 'monthly-payment',
			'label' => 'Monthly Payment',
			'type' => 'text',
		),
		array(
			'id' => 'showroom-price',
			'label' => 'Showroom Price',
			'type' => 'text',
		),
		array(
			'id' => 'internet-price',
			'label' => 'Internet Price',
			'type' => 'text',
		),
		array(
			'id' => 'youtube-url',
			'label' => 'YouTube URL',
			'type' => 'url',
		),
        array(
			'id' => 'carfax-url',
			'label' => 'Carfax URL',
			'type' => 'url',
		),
		array(
			'id' => 'tag-line',
			'label' => 'Tag Line',
			'type' => 'text',
		),
		array(
			'id' => 'description',
			'label' => 'Description',
			'type' => 'textarea',
		),
		array(
			'id' => 'address',
			'label' => 'Address',
			'type' => 'text',
		),
		array(
			'id' => 'city',
			'label' => 'City',
			'type' => 'text',
		),
		array(
			'id' => 'zip',
			'label' => 'Zip',
			'type' => 'text',
		),
		array(
			'id' => 'kilometers',
			'label' => 'Kilometers',
			'type' => 'text',
		),
	);

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public static function add_meta_boxes() {
		foreach ( self::$screens as $screen ) {
			add_meta_box(
				'about-the-truck',
				__( 'About the Truck', 'rational-metabox' ),
				array( 'AutoMeta', 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'default'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 * 
	 * @param object $post WordPress post object
	 */
	public static function add_meta_box_callback( $post ) {
		wp_nonce_field( 'about_the_truck_data', 'about_the_truck_nonce' );
		self::generate_fields( $post );
	}

	/**
	 * Generates the field's HTML for the meta box.
	 */
	public static function generate_fields( $post ) {
		$output = '';
		foreach ( self::$fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'about_the_truck_' . $field['id'], true );
			switch ( $field['type'] ) {
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$field['id'],
						$field['id']
					);
					foreach ( $field['options'] as $key => $value ) {
						$field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$db_value === $field_value ? 'selected' : '',
							$field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				case 'textarea':
					$input = sprintf(
						'<textarea class="large-text" id="%s" name="%s" rows="5">%s</textarea>',
						$field['id'],
						$field['id'],
						$db_value
					);
					break;
                case 'media':
					$input = sprintf(
						'<input class="regular-text" id="%s" name="%s" type="text" value="%s"> <input class="button rational-metabox-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
						$field['id'],
						$field['id'],
						$db_value,
						$field['id'],
						$field['id']
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= self::row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	/**
	 * Generates the HTML for table rows.
	 */
	public static function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public static function save_post( $post_id ) {
		if ( ! isset( $_POST['about_the_truck_nonce'] ) )
			return $post_id;

		$nonce = $_POST['about_the_truck_nonce'];
		if ( !wp_verify_nonce( $nonce, 'about_the_truck_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( self::$fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'about_the_truck_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'about_the_truck_' . $field['id'], '0' );
			}
		}
	}
}
