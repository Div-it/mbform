<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @since      1.0.0
 * @package    MBForm
 * @subpackage MBForm/includes
 * @author     Webmaster Div-it <webmaster@div-it.com.ar>
 */
class MBForm_Public {

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

    private $words;
    private $loader;

    public function setLoader($loader){
        $this->loader = $loader; 
    }

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

        wp_enqueue_style( 'picker.default', plugin_dir_url( __FILE__ ) . 'plugins/pickadates-3.5.6/themes/default.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'picker.default.date', plugin_dir_url( __FILE__ ) . 'plugins/pickadates-3.5.6/themes/default.date.css', array('picker.default'), null, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mbform-public.css', array('picker.default','picker.default.date'), null, 'all' );
        wp_enqueue_style( $this->plugin_name.'.cardinal', plugin_dir_url( __FILE__ ) . 'css/mbform-cardinal-overwrite.css', array($this->plugin_name), null, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

        $locale = (defined('ICL_LANGUAGE_CODE')) ? ICL_LANGUAGE_CODE : get_locale();


        //datepicker code
        wp_enqueue_script( 'picker', plugin_dir_url( __FILE__ ) . 'plugins/pickadates-3.5.6/picker.js', array( 'jquery' ), null, false );
        wp_enqueue_script( 'picker.date', plugin_dir_url( __FILE__ ) . 'plugins/pickadates-3.5.6/picker.date.js', array( 'jquery','picker' ), null, false );
        //localize
        if($locale != 'en'){
            wp_enqueue_script( 'picker.date.'.$locale, plugin_dir_url( __FILE__ ) . 'plugins/pickadates-3.5.6/translations/'.$locale.'.js', array( 'jquery','picker','picker.date' ), null, false );
        }
        //
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mbform-public.js', array( 'jquery','picker','picker.date'), $this->version, false );



	}

	/**
     * Load the forms´s partial template
     *
     * @since    1.0.0
     */
	public function loadForm(){
        $includedhtml =  $this->get_partial('mbform-public-display',get_option('mbform_distance_left'), get_option('mbform_distance_top'),  get_option('mbform_palette'));
        echo $includedhtml;
    }

    private function get_partial($partialName,$left=null,$top=null,$palette=null){
    //
        $includedhtml = '';
        $hotelDestino = get_option('mbform_hotel_destino_id');
        $i18n = $this->getWords();
        $action ='https://'.get_option('mbform_url_identifier').$i18n['form.defaultAction'];
        $styleVals = array();
        if(isset($left)){
            array_push($styleVals ,'left:'.$left);
        }
        if(isset($top)){
            array_push($styleVals ,'top:'.$top);
        }
        //
        if($palette){
            $class = 'tpl_'.$palette;
        }else{
            $class = 'tpl_blue';
        }
        $style = '';
        if(count($styleVals)){
            $style = ' style="'.implode(';',$styleVals).'" ';
        }
        //
        ob_start();        
        include_once( plugin_dir_path ( __FILE__ ) .'..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR. 'partials'.DIRECTORY_SEPARATOR.$partialName.'.php');
        $includedhtml = ob_get_contents();
        ob_end_clean();
        //

        return $includedhtml;

    }

    /**
     * @param $atts
     * @param $content
     * @return string
     */
    public function loadShortCodeForm($atts,$content = null){
        $this->enqueue_scripts();
        $this->enqueue_styles();
        $top = (isset($atts['top'])) ? $atts['top']: null;
        $left = (isset($atts['left'])) ? $atts['left']: null;
        $palette = (isset($atts['palette'])) ? $atts['palette']: null;
        return  $this->get_partial('mbform-public-display',$left,$top,$palette);
    }

    /**
     * init_shorcode
     * Init the shortcode add
     * @since    1.0.0
     */
    public function init_shortcode(){
        add_shortcode('mbform', array(&$this,'loadShortCodeForm'));
    }

    /**
     * @param $words
     */
    public function setWords($words){
        $this->words = $words;
    }

    /**
     * @return mixed
     */
    public function getWords(){
        return $this->words ;
    }

    /**
     * @param $wordKey
     * @return string
     */
    public function getWord($wordKey){
        if(isset($this->words[$wordKey] )){
            return $this->words[$wordKey] ;
        }
        return '';
    }
}
