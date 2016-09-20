<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public/partials
 */
//
$hotelDestino = get_option('mbform_hotel_destino_id');
$action ='https://'.get_option('mbform_url_identifier').__('.mbooking.com.ar/en/book/','mbform') ;
//
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="mbmainform"  class="  green">
    <div class="mbform-row">
        <form action="<?php echo $action; ?>"  method="GET"   >
            <div class="mbform-md-2">
                <input type="hidden" id="hoteldestino" name="hoteldestino" value="<?php echo $hotelDestino; ?>" />
                <label><?php echo __('Arrival Date','mbform');?></label>
                <input type="text" class="datepicker" id="fechain" name="fechain"  placeholder="<?php echo __('Arrival','mbform');?>"  />
                <span class="glyphicon glyphicon-calendar"></span>
            </div>
            <div class="mbform-md-2">
                <label><?php echo __('Departure Date','mbform');?></label>
                <input type="text" class="datepicker"  id="fechaout" name="fechaout"  placeholder="<?php echo  __('Departure','mbform');?>"  />
                <span class="glyphicon glyphicon-calendar"></span>
            </div>
            <div class="mbform-md-2">
                <label><?php echo __('Promotional Code','mbform');?></label>
                <input type="text"  id="prcode" name="prcode" length="20" placeholder="<?php echo __('Promotional Code','mbform');?>" />
            </div>
            <button type="submit" /><?php echo __('Book Now!','mbform');?></button>
        </form>
    </div>
</div>