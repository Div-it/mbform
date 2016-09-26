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
		register_setting( 'mbform', 'mbform_hotel_destino_id',array(&$this,'sanitize_hotel'));
		register_setting( 'mbform', 'mbform_url_identifier',array(&$this,'sanitize_url_identifier'));
		register_setting( 'mbform', 'mbform_hook_active',array(&$this,'sanitize_hook'));
		register_setting( 'mbform', 'mbform_action_hook');
		register_setting( 'mbform', 'mbform_distance_top');
		register_setting( 'mbform', 'mbform_distance_left');
		register_setting( 'mbform', 'mbform_palette');

		//set section
		add_settings_section(
        	'mbform_settings_section',
        	__('Basic Settings','mbform'),
        	array(&$this,'settings_section_cb'),
        	'mbform'
    	);
		add_settings_section(
			'mbform_display_section',
			__('Display Settings','mbform'),
			array(&$this,'display_section_cb'),
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
			'mbform_hook_active',
			__('Hook to action','mbform'),
			array(&$this,'settings_hook_active_field_cb'),
			'mbform',
			'mbform_display_section'
		);
		add_settings_field(
			'mbform_action_hook',
			__('Action Name','mbform'),
			array(&$this,'settings_action_hook_field_cb'),
			'mbform',
			'mbform_display_section'
		);
		add_settings_field(
			'mbform_distance_top',
			__('Top distance','mbform'),
			array(&$this,'settings_distance_top_field_cb'),
			'mbform',
			'mbform_display_section'
		);
		add_settings_field(
			'mbform_distance_left',
			__('Left distance','mbform'),
			array(&$this,'settings_distance_left_field_cb'),
			'mbform',
			'mbform_display_section'
		);
		add_settings_field(
			'mbform_palette',
			__('Color palette','mbform'),
			array(&$this,'settings_palette_field_cb'),
			'mbform',
			'mbform_display_section'
		);

	}

	public  function settings_section_cb()
    {
        echo '<p>'.__('From this administrator must configure the search parameters in Book-It, the same will be granted by the team Div-it in high account.','mbform').'</p>';
    }

	public  function display_section_cb()
	{
		echo '<p>'.__('From this administrator you can define how display plugin.','mbform').'</p>';
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

	public function settings_action_hook_field_cb()
	{
		$action_hook = get_option('mbform_action_hook');
		if(empty($action_hook)){
			$action_hook = 'get_template_part_template-parts/content';
		}
		?>
		<input type="text" name="mbform_action_hook" value="<?php echo  isset($action_hook) ? esc_attr($action_hook) : ''; ?>"  required >
		<span><?php echo __('Action Name to hook default: get_template_part_template-parts/content','mbform');?></span>
		<?php
	}

	public function settings_hook_active_field_cb()
	{
		$hook_active = get_option('mbform_hook_active');
		?>
		<input type="checkbox" name="mbform_hook_active" value="add_to_header" <?php if($hook_active){ 	echo ' checked="checked" ';	}?> 	/>
		<?php
	}

	public function settings_palette_field_cb()
	{
		$palette = get_option('mbform_palette');
		?>
		<select  name="mbform_palette" >
			<option value="green" <?php if($palette=='green') echo 'selected="selected"'?>  ><?php echo __('Green','mbform');?></option>
			<option value="blue" <?php if($palette=='blue') echo 'selected="selected"'?>  ><?php echo __('Blue','mbform');?></option>
			<option value="red" <?php if($palette=='red') echo 'selected="selected"'?>  ><?php echo __('Red','mbform');?></option>
		</select>
		<?php
	}

	public function settings_distance_top_field_cb()
	{
		// get the value of the setting we've registered with register_setting()
		$top = get_option('mbform_distance_top');
		// output the field
		?>
		<input type="text" name="mbform_distance_top" value="<?php echo  isset($top) ? esc_attr($top) : ''; ?>"   />
		<span><?php echo __('Top distance to header','mbform');?></span>
		<?php
	}

	public function settings_distance_left_field_cb()
	{
		// get the value of the setting we've registered with register_setting()
		$left = get_option('mbform_distance_left');
		// output the field
		?>
		<input type="text" name="mbform_distance_left" value="<?php echo  isset($left) ? esc_attr($left) : ''; ?>"   />
		<span><?php echo __('Left distance to header','mbform');?></span>
		<?php
	}


	/**
	 * sanitize_hotel
	 * Comfirm two value are integer
	 * @param Array $request_data
	 * @return string [v1].[v2]
	 */
	public function sanitize_hotel($request_hotel_destino){
		$m = explode ( '.', trim ( $request_hotel_destino) );
		return intval ( $m [0] ) . '.' . intval ( $m [1] );
	}

	/**
	 * sanitize_url_identifier
	 * trim and check the url's init
	 * @param $request_data
	 * @return mixed
	 */
	public function sanitize_url_identifier($request_url_modifier){
		return  sanitize_text_field ( trim($request_url_modifier) );
	}

	/**
	 * sanitize_hook
	 * convert into a boolean
	 * @param $request_data
	 * @return mixed
	 */
	public function sanitize_hook($request_action_hook){

		return boolval($request_action_hook);
	}


}
