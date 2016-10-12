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
 * @author     Webmaster Div-it <webmaster@div-it.com.ar>
 */
class MBForm_i18n {

    private $_words = array();
    private $_actualLangCode = 'es';
    const iclDomain = 'mbform';

    /**
     *
     */
    public function loadDefaultWords(){

        //$locale = (defined('ICL_LANGUAGE_CODE')) ? ICL_LANGUAGE_CODE : get_locale();
        $locale =  (strpos($_SERVER['REQUEST_URI'],'/cs1/en/') === false) ? 'es':'en';
        $this->setActualLangCode($locale);
        $altLang = (defined('ICL_LANGUAGE_CODE')) ? 'definido':'no definido';
        //
        if($locale == 'es'){
            $this->_words = array(
                'form.defaultAction' => '.mbooking.com.ar/es/reservas/',
                'form.titulo' =>  'Reservar',
                'form.lang' =>  $altLang,
                'form.hotel.label' => 'Hotel',
                'form.arrival.label' => 'Fecha de entrada',
                'form.arrival.placeholder' =>  'Entrada',
                'form.departure.label' =>   'Fecha de salida',
                'form.departure.placeholder' => 'Salida',
                'form.prcode.label' => 'Cod. Promocional',
                'form.prcode.placeholder' => 'Cod. Promocional',
                'form.submit.desktop' => 'Reservar!',
                'form.submit.mobile' => 'Reservar Ahora!'
            );
        }else{
            $this->_words = array(
                'form.defaultAction' => __('.mbooking.com.ar/en/book/','mbform') ,
                'form.titulo' =>  __('Book Now!','mbform'),
                'form.lang' =>  $altLang,
                'form.hotel.label' => __('Hotel','mbform'),
                'form.arrival.label' => __('Arrival Date','mbform'),
                'form.arrival.placeholder' =>  __('Arrival','mbform'),
                'form.departure.label' =>   __('Departure Date','mbform'),
                'form.departure.placeholder' =>   __('Departure','mbform'),
                'form.prcode.label' =>   __('Promotional Code','mbform'),
                'form.prcode.placeholder' =>  __('Prom. Code','mbform'),
                'form.submit.desktop' =>  __('Book!','mbform'),
                'form.submit.mobile' =>  __('Book Now!','mbform')
            );
        }

    }

    /**
     * @return string
     */
    public function getActualLangCode(){
        return $this->_actualLangCode;
    }

    /**
     * @param $lang
     */
    public function setActualLangCode($lang){
        $this->_actualLangCode = $lang;
    }

    /**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain('mbform',false,dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/');

	}

    /**
     *
     * @return bool
     */
	public function getICLExists(){
	    return function_exists ( 'icl_register_string' );
    }

    /**
     * @return array
     */
    public function getWordsArray(){
        return $this->_words;
    }

    /**
     *
     * @return null|string
     */
    public function getWord($wordKey){
        if(isset($this->_words[$wordKey])){
            return $this->_words[$wordKey];
        }
        return null;
    }






}
