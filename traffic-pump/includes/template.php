<?
       $html[] = '<!-- +1 Traffic Pump -->';
       $html[] = '<script type="text/javascript" src="'.$this->pluginUrl.'/files/pump.min.js"></script>';
       $html[] = '<div class="popupbox" id="trafficpumpwindow">';
       $html[] = '<div id="intabdiv">';
       $html[] = '<h2>'.file_get_contents($this->pluginPath.'/includes/header.txt').'</h2>';
       $html[] = '<p>'.file_get_contents($this->pluginPath.'/includes/text.txt').'</p>';
       $html[] = '<div><g:plusone size="medium" callback="hideTrafficPumpWindow"></g:plusone>До закрытия этого окна осталось: <span id="trafficpumptimer">15</span> сек</div>';
       $html[] = '</div>';
       $html[] = '</div>';
       $html[] = '<!-- +1 Traffic Pump -->';
        echo implode("\r\n", $html);
 ?>
