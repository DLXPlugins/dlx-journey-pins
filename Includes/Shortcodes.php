<?php
/**
 * Shortcodes handler class.
 *
 * @package DLXPlugins\JourneyPins
 * @since 1.0.0
 */

namespace DLXPlugins\JourneyPins;


/**
 * Shortcodes handler class.
 *
 * @since 1.0.0
 */
class Shortcodes {

	/**
	 * Initialize shortcodes.
	 */
	public function __construct() {
		add_shortcode( 'journeypins', array( $this, 'journey_pins_shortcode' ) );
	}

	/**
	 * Journey pins shortcode callback.
	 *
	 * @param array  $atts    Shortcode attributes.
	 * @param string $content Shortcode content.
	 * @return string
	 */
	public function journey_pins_shortcode( $atts, $content = null ) {
		// Parse attributes.
		$atts = shortcode_atts(
			array(
				// Add any attributes you want to support here.
			),
			$atts,
			'journeypins'
		);

		// Output hello world.
		return '<div class="dlx-journey-pins">hello world</div>';
	}
}
