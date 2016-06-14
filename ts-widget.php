<?php

/*
Plugin Name: Widgets for Thingspeak
Plugin URI: https://www.radikalblogger.de/
Description: Show Thingspeak channels in your widget bar
Author: Michael Schmitt
Version: 1.0
Author URI: https://www.radikalblogger.de/
*/


require_once dirname( __FILE__) .  '/vendor/autoload.php';


add_action( 'widgets_init', function(){
	register_widget( '\Schmiddim\Thingspeak\Widget' );
});