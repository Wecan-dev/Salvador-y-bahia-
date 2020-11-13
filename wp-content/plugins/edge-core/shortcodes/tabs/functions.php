<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Edge_Tabs extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edge_Tab extends WPBakeryShortCodesContainer {}
}

if(!function_exists('edge_core_add_tabs_shortcodes')) {
	function edge_core_add_tabs_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'EdgeCore\CPT\Shortcodes\Tabs\Tabs',
			'EdgeCore\CPT\Shortcodes\Tab\Tab'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('edge_core_filter_add_vc_shortcode', 'edge_core_add_tabs_shortcodes');
}