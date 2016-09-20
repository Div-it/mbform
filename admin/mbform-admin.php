<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    MBForm
 * @subpackage MBForm/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MBForm
 * @subpackage MBForm/admin
 * @author     Your Name <email@example.com>
 */
class MBForm_Admin {

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
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
	}	

	/**
	 * Add the menu button
	 *
	 */
	public function add_menu(){
		add_submenu_page(
        	'tools.php',        
			__('MBForm basic configuration page','mbform'),
        	__('MBForm','mbform'),
        	'manage_options',
        	'mbform',
        	array(&$this,'mbform_options_page')
    	);	
	}

	public function mbform_options_page(){
 		// check user capabilities
		if (!current_user_can('manage_options')) {
	        return;
	    }
	    //load the partial 
	    include_once(plugin_dir_path( __FILE__ ) . 'partials'.DIRECTORY_SEPARATOR.'mbform-admin-display.php');    
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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mbform-admin.css', array(), $this->version, 'all' );

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mbform-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function register_settings(){
		register_setting( 'mbform', 'mbform_hotel_destino_id'); 
		register_setting( 'mbform', 'mbform_url_identifier'); 
		//set section
		add_settings_section(
        	'mbform_settings_section',
        	__('Basic Settings','mbform'),
        	array(&$this,'settings_section_cb'),
        	'mbform'
    	);
    	//fields    	
    	add_settings_field(
        	'mbform_hotel_destino_id',
        	__('Hotel Id','mbform'),
        	array(&$this,'settings_hotel_destino_field_cb'),
        	'mbform',
        	'mbform_settings_section'
    	);    	
    	//
    	add_settings_field(
        	'mbform_url_identifier',
        	__('URL identificator','mbform'),
        	array(&$this,'settings_url_identifier_field_cb'),
        	'mbform',
        	'mbform_settings_section'
    	);
		//
		add_settings_field(
			'mbform_wpaction',
			__('Accion con la que disparar el plugin'),
			array(&$this,'settings_wpaction_field_cb'),
			'mbform',
			'mbform_settings_section'
		);
	}

	public  function settings_section_cb()
    {
        echo '<p>'.__('From this administrator must configure the search parameters in Book-It, the same will be granted by the team Div-it in high account.','mbform').'</p>';
    }

  	public function settings_hotel_destino_field_cb()
    {
        // get the value of the setting we've registered with register_setting()
        $hotel_destino_id = get_option('mbform_hotel_destino_id');
        // output the field
        ?>
        <input type="text" name="mbform_hotel_destino_id" value="<?php echo  isset($hotel_destino_id) ? esc_attr($hotel_destino_id) : ''; ?>"  required >      
        <?php
    }

    public function settings_url_identifier_field_cb()
    {
        // get the value of the setting we've registered with register_setting()
        $url_identifier = get_option('mbform_url_identifier');
        // output the field
        ?>
        <input type="text" name="mbform_url_identifier" value="<?php echo  isset($url_identifier) ? esc_attr($url_identifier) : ''; ?>"  required > 
        <span>.mbooking.com.ar</span>
        <?php
    }

	public function settings_wpaction_field_cb()
	{
		// get the value of the setting we've registered with register_setting()
		$wpaction = get_option('mbform_wpaction');
		// output the field
		?>
		<input type="text" name="mbform_wpaction" value="<?php echo  isset($wpaction) ? esc_attr($wpaction) : ''; ?>"  required >
		<?php
	}
}
