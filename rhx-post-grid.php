<?php
/**
 * Plugin Name: RHX Post Grid
 * Description: RHX Post Grid is a wordpress plugin to display latest or Old posts as grid view in your website!  Use this shortcode <strong>[rhxpost-grid]</strong> in the post/page" where you want to display latest or breaking news.
 * Plugin URI: https://wordpress.org/plugins/rhx-post-grid/
 * Author: Rihan Habib
 * Author URI: https://www.facebook.com/rihan.zihad/
 * Version: 1.0
 * License: GPL2 or later
 * License URI: license.txt
 * Text Domain: rhxpost-grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
*	Get all php file.
*/

require_once __DIR__ . '/includes/Admin/Menu.php';
require_once __DIR__ . '/includes/Admin/Settings.php';
require_once __DIR__ . '/includes/Frontend/Shortcode.php';
require_once __DIR__ . '/includes/Installer.php';
require_once __DIR__ . '/includes/Admin.php';
require_once __DIR__ . '/includes/Assets.php';
require_once __DIR__ . '/includes/dynamic-style.php';
require_once __DIR__ . '/includes/Frontend.php';


/**
 * The main plugin class
 */
final class RhxPost_Grid {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct() {

        $this->define_rhxgrid_constants();
        $this->trim_grid_thumb();

        register_activation_hook( __FILE__, [ $this, 'rhxgrid_activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_rhxgrid_plugin' ] );

        add_action('wp_enqueue_scripts', [ $this, 'load_dashicons' ] );
    }

    /**
     * Trim post thumb
     */

    public function trim_grid_thumb() {
    add_image_size( 'grid-thumb', 351, 234, true ); // (cropped)
}

     /**
     * Initialize Dashicon for frontend
     */

    function load_dashicons(){
        wp_enqueue_style('dashicons');
}

    /**
     * Initializes a singleton instance
     *
     * @return \RhxPost_Grid
     */
    public static function rhxgrid_init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_rhxgrid_constants() {
        define( 'RHXP_GRID_VERSION', self::version );
        define( 'RHXP_GRID_FILE', __FILE__ );
        define( 'RHXP_GRID_PATH', __DIR__ );
        define( 'RHXP_GRID_URL', plugins_url( '', RHXP_GRID_FILE ) );
        define( 'RHXP_GRID_ASSETS', RHXP_GRID_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_rhxgrid_plugin() {

        new Rhxgrid_assets();

        if ( is_admin() ) {
            new  Rhxgrid_admin();
        } else {
            new  Rhxgrid_frontend();
        }

    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function rhxgrid_activate() {
        $installer = new Rhxgrid_installer();
        $installer->rhxgrid_run();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \RhxPost_Grid
 */
function rhxpost_grid() {
    return RhxPost_Grid::rhxgrid_init();
}

// kick-off the plugin
rhxpost_grid();
