<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.patricelaurent.net
 * @since      1.0.0
 *
 * @package    Tipi
 * @subpackage Tipi/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tipi
 * @subpackage Tipi/admin
 * @author     Patrice LAURENT <laurent.patrice@gmail.com>
 */
class Tipi_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $tipi_gateway_settings_options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $tipi_gateway_settings_options ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->tipi_gateway_settings_options = $tipi_gateway_settings_options;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tipi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tipi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tipi-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tipi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tipi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tipi-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * add_submenu_page ( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
	 */
	public function add_menu_tipi(){
		add_menu_page(
			__('TIPI Gateway', 'tipi'), // page_title
			__('TIPI Gateway', 'tipi'), // menu_title
			'manage_options', // capability
			'tipi-gateway-settings', // menu_slug
			[ $this, 'tipi_options_page' ], // function
			'dashicons-cart', // icon_url
			76 // position
		);
	}

	/**
	 * options page
	 */
	public function tipi_options_page(){
		include_once 'partials/tipi-admin-display.php';
	}

	public function tipi_settings_init(  ) {

		register_setting(
			'tipi_gateway_settings_option_group', // option_group
			'tipi_gateway_settings_option_name', // option_name
			array( $this, 'tipi_gateway_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'tipi_gateway_settings_setting_section', // id
			__( 'Settings'), // title
			null, // callback
			'tipi-gateway-settings-admin' // page
		);

		add_settings_field(
			'tipi_client_number', // id
			__( 'Enter Your Tipi Client Number', 'tipi' ), // title
			array( $this, 'enter_your_tipi_client_number_0_callback' ), // callback
			'tipi-gateway-settings-admin', // page
			'tipi_gateway_settings_setting_section' // section
		);

		add_settings_field(
			'input_mode_1', // id
			__( 'Input Mode', 'tipi' ), // title
			array( $this, 'input_mode_1_callback' ), // callback
			'tipi-gateway-settings-admin', // page
			'tipi_gateway_settings_setting_section' // section
		);

		add_settings_field(
			'where_to_display_it_2', // id
			__( 'Where to display it ?', 'tipi' ), // title
			array( $this, 'where_to_display_it_2_callback' ), // callback
			'tipi-gateway-settings-admin', // page
			'tipi_gateway_settings_setting_section' // section
		);
		add_settings_field(
			'bootstrap_3', // id
			__( 'Disable plugin css style?', 'tipi'), // title
			array( $this, 'bootstrap_3_callback' ), // callback
			'tipi-gateway-settings-admin', // page
			'tipi_gateway_settings_setting_section' // section
		);
	}

	public function tipi_gateway_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['tipi_client_number'] ) ) {
			$sanitary_values['tipi_client_number'] = sanitize_text_field( $input['tipi_client_number'] );
		}

		if ( isset( $input['input_mode_1'] ) ) {
			$sanitary_values['input_mode_1'] = $input['input_mode_1'];
		}

		if ( isset( $input['where_to_display_it_2'] ) ) {
			$sanitary_values['where_to_display_it_2'] = $input['where_to_display_it_2'];
		}

		if ( isset( $input['bootstrap_3'] ) ) {
			$sanitary_values['bootstrap_3'] = $input['bootstrap_3'];
		}

		return $sanitary_values;
	}


	public function enter_your_tipi_client_number_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="tipi_gateway_settings_option_name[tipi_client_number]" id="tipi_client_number" value="%s">',
			isset( $this->tipi_gateway_settings_options['tipi_client_number'] ) ? esc_attr( $this->tipi_gateway_settings_options['tipi_client_number']) : ''
		);
	}

	public function input_mode_1_callback() {
		?>
		<select name='tipi_gateway_settings_option_name[input_mode_1]'>
			<option value='T' <?php if(isset($this->tipi_gateway_settings_options['input_mode_1'])) selected( $this->tipi_gateway_settings_options['input_mode_1'], 'T' ); ?>>Test</option>
			<option value='X' <?php if(isset($this->tipi_gateway_settings_options['input_mode_1'])) selected( $this->tipi_gateway_settings_options['input_mode_1'], 'X' ); ?>>Activation</option>
			<option value='M' <?php if(isset($this->tipi_gateway_settings_options['input_mode_1'])) selected( $this->tipi_gateway_settings_options['input_mode_1'], 'M' ); ?>>Production</option>
		</select>
		<?php
	}

	public function where_to_display_it_2_callback() {
		$current = isset($this->tipi_gateway_settings_options['where_to_display_it_2']) ? $this->tipi_gateway_settings_options['where_to_display_it_2'] : 0;
		wp_dropdown_pages(
			array(
				'name' => 'tipi_gateway_settings_option_name[where_to_display_it_2]',
				'echo' => 1,
				'show_option_none' => __( '&mdash; Select &mdash;' ),
				'option_none_value' => '0',
				'selected' => $this->tipi_gateway_settings_options['where_to_display_it_2']
			)
		);?>
		<?php if($current && $current>0) {?>
			<a target="_blank" href="<?php echo get_permalink( $current ) ?>"><?php _e('Show') ?></a>&nbsp;|
		<?php } ?>
		&nbsp;<a href="<?php echo admin_url( 'post-new.php?post_type=page' ) ?>"><?php _e('Add New Page') ?></a>

<?php

		}

	public function bootstrap_3_callback() {
		?> <fieldset><?php $checked = ( isset( $this->tipi_gateway_settings_options['bootstrap_3'] ) && $this->tipi_gateway_settings_options['bootstrap_3'] === 'Yes' ) ? 'checked' : '' ; ?>
			<label for="bootstrap_3-0"><input type="radio" name="tipi_gateway_settings_option_name[bootstrap_3]" id="bootstrap_3-0" value="Yes" <?php echo $checked; ?>> <?php _e('Yes') ?></label><br>
			<?php $checked = ( isset( $this->tipi_gateway_settings_options['bootstrap_3'] ) && $this->tipi_gateway_settings_options['bootstrap_3'] === 'No' ) ? 'checked' : '' ; ?>
			<label for="bootstrap_3-1"><input type="radio" name="tipi_gateway_settings_option_name[bootstrap_3]" id="bootstrap_3-1" value="No" <?php echo $checked; ?>> <?php _e('No') ?></label></fieldset> <?php
	}

}
