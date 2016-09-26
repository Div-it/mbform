<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    MBForm
 * @subpackage MBForm/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    MBForm
 * @subpackage MBForm/includes
 * @author     Your Name <email@example.com>
 */
class MBForm_Shortcode {


	private $shortcode_name;

	public function __construct($tag='mbform'){
		$this->shortcode_name = $tag;
	}
	
	public function set_shortcode(){
		add_shortcode('mbform', array('MBForm_Public','loadForm'));
	}

}
