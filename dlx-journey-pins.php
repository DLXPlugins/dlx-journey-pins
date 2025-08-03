<?php
/**
 * Plugin Name: DLX Journey Pins
 * Plugin URI: https://github.com/dlxplugins/dlx-journey-pins
 * Description: Map your journey across the globe with an interactive map.
 * Version: 1.0.0
 * Author: DLX Plugins
 * Author URI: https://dlxplugins.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: dlx-journey-pins
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * Network: false
 *
 * @package DLXJourneyPins
 * @version 1.0.0
 */

namespace DLXPlugins\JourneyPins;

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin constants.
define( 'DLX_JOURNEY_PINS_VERSION', '1.0.0' );
define( 'DLX_JOURNEY_PINS_PLUGIN_FILE', __FILE__ );
define( 'DLX_JOURNEY_PINS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DLX_JOURNEY_PINS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'DLX_JOURNEY_PINS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Load Composer autoloader.
require_once DLX_JOURNEY_PINS_PLUGIN_DIR . 'lib/autoload.php';

/**
 * Main plugin class.
 *
 * @since 1.0.0
 */
class DLX_Journey_Pins {

	/**
	 * Plugin instance.
	 *
	 * @var DLX_Journey_Pins
	 */
	private static $instance = null;

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Plugin file path.
	 *
	 * @var string
	 */
	private $plugin_file;

	/**
	 * Plugin directory path.
	 *
	 * @var string
	 */
	private $plugin_dir;

	/**
	 * Plugin URL.
	 *
	 * @var string
	 */
	private $plugin_url;

	/**
	 * Plugin basename.
	 *
	 * @var string
	 */
	private $plugin_basename;

	/**
	 * Get plugin instance.
	 *
	 * @return DLX_Journey_Pins
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->version         = '1.0.0';
		$this->plugin_file     = DLX_JOURNEY_PINS_PLUGIN_FILE;
		$this->plugin_dir      = DLX_JOURNEY_PINS_PLUGIN_DIR;
		$this->plugin_url      = DLX_JOURNEY_PINS_PLUGIN_URL;
		$this->plugin_basename = DLX_JOURNEY_PINS_PLUGIN_BASENAME;

		$this->init_hooks();
	}

	/**
	 * Initialize hooks.
	 */
	private function init_hooks() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Initialize plugin.
	 */
	public function init() {
		// Initialize shortcodes.
		new Shortcodes();

		// Plugin initialization code will go here.
		do_action( 'dlx_journey_pins_init' );
	}

	/**
	 * Load plugin textdomain.
	 */
	public function load_textdomain() {
		load_plugin_textdomain(
			'dlx-journey-pins',
			false,
			dirname( $this->plugin_basename ) . '/languages'
		);
	}

	/**
	 * Get plugin version.
	 *
	 * @return string
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Get plugin file path.
	 *
	 * @return string
	 */
	public function get_plugin_file() {
		return $this->plugin_file;
	}

	/**
	 * Get plugin directory path.
	 *
	 * @return string
	 */
	public function get_plugin_dir() {
		return $this->plugin_dir;
	}

	/**
	 * Get plugin URL.
	 *
	 * @return string
	 */
	public function get_plugin_url() {
		return $this->plugin_url;
	}

	/**
	 * Get plugin basename.
	 *
	 * @return string
	 */
	public function get_plugin_basename() {
		return $this->plugin_basename;
	}
}

// Initialize the plugin.
DLX_Journey_Pins::get_instance();

// Register activation, deactivation, and uninstall hooks.
register_activation_hook( __FILE__, array( 'DLXPlugins\JourneyPins\Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'DLXPlugins\JourneyPins\Activator', 'deactivate' ) );
register_uninstall_hook( __FILE__, array( 'DLXPlugins\JourneyPins\Activator', 'uninstall' ) );
