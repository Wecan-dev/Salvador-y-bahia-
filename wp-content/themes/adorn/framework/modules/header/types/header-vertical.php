<?php
namespace Adorn\Modules\Header\Types;

use Adorn\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Vertical layout and option
 *
 * Class HeaderVertical
 */
class HeaderVertical extends HeaderType {
	public function __construct() {
		$this->slug = 'header-vertical';

		add_action('wp', array($this, 'setHeaderHeightProps'));

		add_filter('adorn_edge_js_global_variables', array($this, 'getGlobalJSVariables'));
		add_filter('adorn_edge_per_page_js_vars', array($this, 'getPerPageJSVariables'));
	}

	/**
	 * Loads template for header type
	 *
	 * @param array $parameters associative array of variables to pass to template
	 */
	public function loadTemplate($parameters = array()) {

		$parameters['holder_class'] = adorn_edge_vertical_haeder_holder_class();

		$parameters = apply_filters('adorn_edge_header_vertical_parameters', $parameters);

		adorn_edge_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
	}

	/**
	 * Sets header height properties after WP object is set up
	 */
	public function setHeaderHeightProps() {
		$this->heightOfTransparency         = $this->calculateHeightOfTransparency();
		$this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
		$this->headerHeight                 = $this->calculateHeaderHeight();
	}

	/**
	 * Returns total height of transparent parts of header
	 *
	 * @return mixed
	 */
	public function calculateHeightOfTransparency() {
		return 0;
	}

	/**
	 * Returns height of header parts that are totaly transparent
	 *
	 * @return mixed
	 */
	public function calculateHeightOfCompleteTransparency() {
		return 0;
	}

	/**
	 * Returns header height
	 *
	 * @return mixed
	 */
	public function calculateHeaderHeight() {
		return 0;
	}

	/**
	 * Returns global js variables of header
	 *
	 * @param $globalVariables
	 *
	 * @return int|string
	 */
	public function getGlobalJSVariables($globalVariables) {
		$globalVariables['edgeLogoAreaHeight'] = 0;
		$globalVariables['edgeMenuAreaHeight'] = 0;

		return $globalVariables;
	}

	/**
	 * Returns per page js variables of header
	 *
	 * @param $perPageVars
	 *
	 * @return int|string
	 */
	public function getPerPageJSVariables($perPageVars) {
		$perPageVars['edgeHeaderTransparencyHeight'] = 0;

		return $perPageVars;
	}
}