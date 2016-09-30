=== Plugin Name ===
Contributors: Ezequiel Bajo , Nicolas Boccacci , Lucas Avila
Tags: MBForm,  book form , div-it,  search , book , reservation
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add the search form to **connect hotel's site with *`Book-it` search Engine* **

== Installation ==

1. Upload `mbform` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Tools -> MBForm
4. Set the basic configuration with :
   4.1 Hotel Destino Id ( Ex: 2.1 )
   4.2 Domain name (suhotel)
5. Place the plugin into the theme by one of the followings :
   5.1 Place `<?php do_shortcode('[mbform]'); ?>` in your templates with theme editor
   5.2 Place [mbform top=10em left=10em palette=blue ] in your templates with theme editor
   5.3 Place a shortcode into any post in any page

== Frequently Asked Questions ==

= How can i obtain my domain code   ? =
The domain code must be asigned from Div-it if you dont have one , please send a mail to webmaster@div-it.com.ar  asking about and we send the information to your email adress.

= Can i set the top and left position into the shortcode  ? =
Yes, If you like you can pass that information like a shortcode attribute
**e.g.**  *[mbform top=2em left=10em palette=red ]*

== Screenshots ==

1. Vista del administador screenshot-mbform-admin.jpg
2. Vista desde el frontend del wordpress screenshot-mbform-frontend.jpg


== Changelog ==

= 1.0 =
* Creation
