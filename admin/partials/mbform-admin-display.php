<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php  $this->options = get_option('mbform');  ?>
<div class="wrap">
	<?php  screen_icon(); ?>
	<h2>MBForm Plugin page</h2>
	<form method="post" action="options.php">
	<?php
    	settings_fields('mbform');
        do_settings_sections('mbform');
        submit_button();
	?>
    </form>
</div>
