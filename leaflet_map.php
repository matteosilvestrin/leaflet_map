<?php

/*
Plugin Name: leaflet map
Plugin URI: http://www.cloudgroup.it
Description: WP shortcode to integrate a leaflet map
Version: 1.0
Author: CloudStudio
Author URI: http://www.cloudgroup.it
*/



function cld_leafletmap($atts, $content=null){
	extract(shortcode_atts(array(
		'lat'			=> '51.505',
		'lon'			=> '-0.09',
		'zoom'			=> 9,
		'marker_txt'     => "empty",
		'link_gmap'		=> true,
	),$atts));

	
		
	//--append a link to Google Map
	if($link_gmap){
		$marker_txt .= "<br/>";	
		$marker_txt .= "<div style='text-align:right; font-size:0.7rem'>";	
		$marker_txt .= "<a href='https://www.google.com/maps/?q=".$lat.",".$lon."' target='_blank'>";	
		$marker_txt .= "Google Maps <img src='".plugin_dir_url( __FILE__ )."img/target_blank.png' style='vertical-align:middle' />";
		$marker_txt .= "</a></div>";
		}

	ob_start(); ?>
						
			<div id="mapid" style="width:100%;height:250px;"></div>
 			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/leaflet.css"/>           	
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/leaflet.js"></script>
			<script>
			//--create the DIV for the map
			var mymap = L.map('mapid').setView([<?php echo $lat ?>, <?php echo $lon ?>], <?php echo $zoom ?>);

			//--append the MARKER to the map
			L.marker([<?php echo $lat ?>, <?php echo $lon ?>]).addTo(mymap).bindPopup("<?php echo $marker_txt ?>");

			//--load maps from openstreetmap.org
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a>'
				}).addTo(mymap);	
            </script>
			
	<?php $output = ob_get_contents(); ob_end_clean();	
	echo $output;
	//echo "<small>".$lat.",".$lon."</small>";
}; 
add_shortcode('leafletmap', 'cld_leafletmap');


?>