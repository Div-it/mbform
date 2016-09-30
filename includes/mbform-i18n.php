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
        $this->_words = array(
            'form.titulo' =>  __('Book Now!','mbform'),
            'form.arrival.label' =>   __('Arrival Date','mbform'),
            'form.arrival.placeholder' =>  __('Arrival','mbform'),
            'form.departure.label' =>   __('Departure Date','mbform'),
            'form.departure.placeholder' =>   __('Departure','mbform'),
            'form.prcode.label' =>   __('Departure Date','mbform'),
            'form.prcode.placeholder' =>  __('Promotional Code','mbform'),
            'form.submit.desktop' =>  __('Book!','mbform'),
            'form.submit.mobile' =>  __('Book Now!','mbform')
        );

        if($this->getICLExists()){
            foreach($this->_words as $name => $value ){
                icl_register_string(self::iclDomain, $name, $value);
                $this->_words[$name] = icl_t(self::iclDomain, $name, $value);
            }
        }

        $locale = (defined('ICL_LANGUAGE_CODE')) ? ICL_LANGUAGE_CODE : get_locale();
        $this->setActualLangCode($locale);
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
