<?php
/*
Plugin Name: +1 Traffic Pump
Plugin URI: http://websolutionsarea.com
Description: Add Traffic Pump window to your blog.
Author: <a href='http://gplus.to/inlanger'>inlanger</a>
Version: 0.5b
Author URI: http://inlanger.org.ua
*/

class TrafficPump {
    	public function __construct()
    	{
                $this->pluginPath = dirname(__FILE__);
		$this->pluginUrl = WP_PLUGIN_URL . '/traffic-pump';

                // Admin menu function
                function admin_menu_page(){
                        add_menu_page( '+1 Traffic Pump Settings', 'Traffic Pump', 10, 'traffic-pump', 'traffic_pump_plugin_options' );
                }

                 function traffic_pump_plugin_options() {
                     include 'includes/settings.php';
                }

                function traffic_pump_options_init(){
                        register_setting( 'traffic_pump_options', 'traffic_pump_text' );
                }

                // Add scripts and styles to site header
		add_action("init", array($this,"add_scripts_and_styles"));

                // Add admin menu
                add_action('admin_menu', 'admin_menu_page');

                add_action('admin_init', 'traffic_pump_options_init' );

		// Add shortcode
		add_shortcode('TrafficPump', array($this, 'shortcode'));
    	}
 
    	public function shortcode()
    	{
		return $this->showTrafficPumpWindow();
    	}

	public function add_scripts_and_styles(){
		// Add JS of +1 button
	    	wp_enqueue_script( 'glpus', 'https://apis.google.com/js/plusone.js');

                // Add jQuery
                wp_enqueue_script( 'jquery');

		// Add style of window
	    	wp_enqueue_style( 'pumpstyle', $this->pluginUrl.'/files/style.css' );

		return true;
	}

        // Generate view function
        public function showTrafficPumpWindow(){
            include 'includes/template.php';
        }
}

// Initialize class
$wpTrafficPump = new TrafficPump();


?>
