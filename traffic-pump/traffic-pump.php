<?php
/*
Plugin Name: +1 Traffic Pump
Plugin URI: http://websolutionsarea.com
Description: Add Traffic Pump window to your blog.
Author: <a href='http://gplus.to/inlanger'>inlanger</a>
Version: 0.1b
Author URI: http://inlanger.org.ua
*/

class TrafficPump {
    	public function __construct()
    	{
                // Add scripts and styles to site header
		add_action("init", array($this,"add_scripts_and_styles"));
	 
		$this->pluginPath = dirname(__FILE__);
		$this->pluginUrl = WP_PLUGIN_URL . '/traffic-pump';

		// Add shortcode
		add_shortcode('TrafficPump', array($this, 'shortcode'));
    	}
 
    	public function shortcode()
    	{
		return $this->showTrafficPumpWindow();
    	}

	public function add_scripts_and_styles(){
		// Add JS of +1 button
	    	wp_enqueue_script( 'glpus', 'http://apis.google.com/js/plusone.js');

		// Add style of window
	    	wp_enqueue_style( 'pumpstyle', $this->pluginUrl.'/style.css' );

		return true;
	}

        // Generate view function
        public function showTrafficPumpWindow(){
                $html[] = '<!-- +1 Traffic Pump -->';
                $html[] = '<script type="text/javascript" src="'.$this->pluginUrl.'/4e1f39f58dcc0.min.js"></script>';
                $html[] = '<div class="popupbox" id="trafficpumpwindow">';
                $html[] = '<div id="intabdiv">';
                $html[] = '<h2>+1 Traffic Pump by <a href="http://gplus.to/inlanger" target="_blank">inlanger</a></h2>';
                $html[] = '<p>Для того что-бы продолжить просмотр страницы нажмите +1 или подождите 15 секунд.</p>';
                $html[] = '<div><g:plusone size="medium" callback="hideTrafficPumpWindow"></g:plusone>До закрытия этого окна осталось: <span id="trafficpumptimer">15</span> сек</div>';
                $html[] = '</div>';
                $html[] = '</div>';
                $html[] = '<!-- +1 Traffic Pump -->';
                return implode("\r\n", $html);
        }
}

// Initialize class
$wpTrafficPump = new TrafficPump();

?>
