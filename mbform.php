<?php
/**
 * Multi Booking Form
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.div-it.com.ar/wp/mbform
 * @since             1.0.0
 * @package           MBForm
 *
 * @wordpress-plugin
 * Plugin Name:       MBForm
 * Plugin URI:        http://www.div-it.com.ar/wp/mbform
 * Description:       Formulario de busqueda para el motor de reservas Book-It
 * Version:           1.0.0
 * Author:            Div-it
 * Author URI:        http://www.div-it.com.ar/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mbform
 * Domain Path:       /languages
 */
/*
 * License:     GPL2
 * MBForm is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * MBForm is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *  
 * You should have received a copy of the GNU General Public License
 * along with Mbform. If not, see http://www.gnu.org/licenses/gpl.html.
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/mbform-activator.php
 */
function activate_mbform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/mbform-activator.php';
	MBForm_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/mbform-deactivator.php
 */
function deactivate_mbform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/mbform-deactivator.php';
	MBForm_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mbform' );
register_deactivation_hook( __FILE__, 'deactivate_mbform' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/mbform.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mbform() {
	
	$plugin = new MBForm();	
	$plugin->run();

}
run_mbform();
