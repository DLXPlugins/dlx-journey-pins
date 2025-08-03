<?php
/**
 * Activator class.
 *
 * @package DLXPlugins\JourneyPins
 * @since 1.0.0
 */

namespace DLXPlugins\JourneyPins;

/**
 * Plugin activation, deactivation, and uninstall handler.
 *
 * @since 1.0.0
 */
class Activator {

	/**
	 * Plugin activation hook.
	 *
	 * @since 1.0.0
	 */
	public static function activate() {
		// Activation code will go here.
		flush_rewrite_rules();
	}

	/**
	 * Plugin deactivation hook.
	 *
	 * @since 1.0.0
	 */
	public static function deactivate() {
		// Deactivation code will go here.
		flush_rewrite_rules();
	}

	/**
	 * Plugin uninstall hook.
	 *
	 * @since 1.0.0
	 */
	public static function uninstall() {
		// Uninstall code will go here.
	}
}
