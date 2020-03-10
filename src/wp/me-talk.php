<?php
/**
 * Plugin Name: Me-Talk
 * Description: Enable Me-Talk on your WordPress site.
 * Author: Sofit
 * Version: 0.8.4
 * License: GPLv2
 * Text Domain: me-talk
 * Domain Path: /languages
 */

class Me_Talk_Plugin {
	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
	}

	function init() {
		$this->options = array_merge( array(
			'counter-code' => '',
		), (array) get_option( 'me-talk', array() ) );

		load_plugin_textdomain( 'me-talk', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	function admin_init() {
		register_setting( 'me-talk', 'me-talk', array( $this, 'sanitize' ) );
		add_settings_section( 'general', '', '', 'me-talk' );
		add_settings_field( 'counter-code', __( 'Widget code', 'me-talk' ), array( $this, 'field_counter_code' ), 'me-talk', 'general' );
	}

	function sanitize( $input ) {
		$output = array();

		if ( isset( $input['counter-code'] ) )
			$output['counter-code'] = ( current_user_can( 'unfiltered_html' ) ) ? $input['counter-code'] : wp_kses_post( $input['counter-code'] );

		return $output;
	}

	function field_counter_code() {
		?>
		<textarea name="me-talk[counter-code]" class="code large-text" rows="10"><?php echo esc_textarea( $this->options['counter-code'] ); ?></textarea>
		<p class="description"><?php _e( 'If you do not have a widget code, you can get it in admin panel of Me-Talk.', 'me-talk' ); ?>
		<?php
	}

	function admin_menu() {
		add_options_page( __( 'Me-Talk', 'me-talk' ), __( 'Me-Talk', 'me-talk' ), 'manage_options', 'me-talk', array( $this, 'render_options' ) );
	}

	function render_options() {
		?>
		<div class="wrap">
	        <h2><?php _e( 'Me-Talk', 'me-talk' ); ?></h2>
	        <p><?php _e( 'Please enter your Me-Talk widget code in the field below and click Save Changes.', 'me-talk' ); ?>
	        <form action="options.php" method="POST">
	            <?php settings_fields( 'me-talk' ); ?>
	            <?php do_settings_sections( 'me-talk' ); ?>
	            <?php submit_button(); ?>
	        </form>
	    </div>
		<?php
	}

	function wp_footer() {
		if ( ! empty( $this->options['counter-code'] ) )
			echo $this->options['counter-code'];
	}
}
$GLOBALS['me_talk_plugin'] = new Me_Talk_Plugin;
