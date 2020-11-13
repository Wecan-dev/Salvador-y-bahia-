<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Edge_Clients_Carousel extends WPBakeryShortCodesContainer {}
}

if(!function_exists('edge_core_add_clients_carousel_shortcodes')) {
	function edge_core_add_clients_carousel_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'EdgeCore\CPT\Shortcodes\ClientsCarousel\ClientsCarousel',
			'EdgeCore\CPT\Shortcodes\ClientsCarouselItem\ClientsCarouselItem'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('edge_core_filter_add_vc_shortcode', 'edge_core_add_clients_carousel_shortcodes');
}