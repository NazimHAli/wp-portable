<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Theme_Name
 */


/**
 * custom option and settings
 */
function wporg_settings_init() {

	// register a new setting for "wporg" page
	register_setting( 'wporg', 'wporg_options' );

	// register a new section in the "wporg" page
	add_settings_section(
		'wporg_section_developers',
		__( 'The Matrix has you.', 'wporg' ),
		'wporg_section_developers_cb',
		'wporg'
	);

	// register a new field in the "wporg_section_developers" section, inside the "wporg" page
	add_settings_field(
		'wporg_field_pill',
		// as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		__( 'Pill', 'wporg' ),
		'wporg_field_pill_cb',
		'wporg',
		'wporg_section_developers',
		[
			'label_for'         => 'wporg_field_pill',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		]
	);
}//end wporg_settings_init()


/*
 * register our wporg_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'wporg_settings_init' );

/**
 * custom option and settings:
 * callback functions
 */


/**
	developers section cb

	section callbacks can accept an $args parameter, which is an array.
	$args have the following keys defined: title, id, callback.
	the values are defined at the add_settings_section() function.
 */
function wporg_section_developers_cb( $args ) {
	?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>">
			<?php esc_html_e( 'Follow the white rabbit.', 'wporg' ); ?>
		</p>
	<?php
}//end wporg_section_developers_cb()


/**
	pill field cb

	field callbacks can accept an $args parameter, which is an array.
	$args is defined at the add_settings_field() function.
	WordPress has magic interaction with the following keys: label_for, class.
	the "label_for" key value is used for the "for" attribute of the <label>.
	the "class" key value is used for the "class" attribute of the <tr> containing the field.
	you can add custom key value pairs to be used inside your callbacks.
 */
function wporg_field_pill_cb( $args ) {
	// get the value of the setting we've registered with register_setting()
	$options = get_option( 'wporg_options' );
	// output the field
	?>
<select id="<?php echo esc_attr( $args['label_for'] ); ?>"
	data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>"
	name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
	<option value="red"
		<?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
		<?php esc_html_e( 'red pill', 'wporg' ); ?>
	</option>
	<option value="blue"
		<?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
		<?php esc_html_e( 'blue pill', 'wporg' ); ?>
	</option>
</select>
<p class="description">
	<?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'wporg' ); ?>
</p>
<p class="description">
	<?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'wporg' ); ?>
</p>
	<?php
}//end wporg_field_pill_cb()


/**
 * top level menu
 */
function wporg_options_page() {
	   // add top level menu page
	add_menu_page(
		'WPOrg',
		'WPOrg Options',
		'manage_options',
		'wporg',
		'wporg_options_page_html'
	);
}//end wporg_options_page()


/*
 * register our wporg_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'wporg_options_page' );


/**
 * top level menu:
 * callback functions
 */
function wporg_options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// add error/update messages
	// check if the user have submitted the settings
	// WordPress will add the "settings-updated" $_GET parameter to the url
	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated"
		add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
	}

	// show error/update messages
	settings_errors( 'wporg_messages' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wporg"
			settings_fields( 'wporg' );
			// output setting sections and their fields
			// (sections are registered for "wporg", each field is registered to a specific section)
			do_settings_sections( 'wporg' );
			// output save settings button
			submit_button( 'Save Settings' );
			?>
		</form>
	</div>
	<?php
}//end wporg_options_page_html()


function wporg_shortcode( $atts = [], $content = null, $tag = '' ) {
	// normalize attribute keys, lowercase
	$atts = array_change_key_case( (array) $atts, CASE_LOWER );

	// override default attributes with user attributes
	$wporg_atts = shortcode_atts(
		[ 'title' => 'WordPress.org' ],
		$atts,
		$tag
	);

	$sanTitle = esc_html__( $wporg_atts['title'], 'wporg' );

	// start output
	$o = '';

	// // start box
	// $o .= '<div class="wporg-box">';
	// // title
	// $o .= '<h2>' . esc_html__($wporg_atts['title'], 'wporg') . '</h2>';
	// // enclosing tags
	// if (!is_null($content)) {
	// secure output by executing the_content filter hook on $content
	// $o .= apply_filters('the_content', $content);
	// run shortcode parser recursively
	// $o .= do_shortcode($content);
	// }
	// // end box
	// $o .= '</div>';
	$o .= '<div class="card hoverable">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="https://via.placeholder.com/250">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">
                ' . $sanTitle . '
                <i class="material-icons right">more_vert</i>
            </span>
            <p>
                <a href="#">MEOW</a>
            </p>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">
                ' . $sanTitle . '
                <i class="material-icons right">close</i>
            </span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    </div>';

	// return output
	return $o;
}//end wporg_shortcode()


function wporg_shortcodes_init() {
	add_shortcode( 'wporg', 'wporg_shortcode' );
}//end wporg_shortcodes_init()


add_action( 'init', 'wporg_shortcodes_init' );
