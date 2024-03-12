<?php
/**
 * Adminify
 *
 * @package             Adminify
 * @author              Nymul Islam
 * @copyright           2024 Nymul Islam
 * @license             GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:         Adminify
 * Plugin URI:          https://github.com/nymul-islam-moon/Adminify
 * Description:         Description of the plugin.
 * Version:             1.0.0
 * Requires at least:   5.2
 * Requires PHP:        7.4
 * Author:              Nymul Islam
 * Author URI:          https://github.com/nymul-islam-moon
 * Text Domain:         Adminify
 * License:             GPL v2 or later
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:          https://github.com/nymul-islam-moon/Adminify
 */

/**
{Adminify} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Adminify} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Adminify}. If not, see {URI to Plugin License}.
 */

defined('ABSPATH') or die('Hay, You can not access the area');

require_once __DIR__ . '/vendor/autoload.php';

if ( ! class_exists( 'Schema' ) ) {
    final class Adminify {

        /**
         * Plugin version
         *
         * @var string
         */
        const version = '1.0.0';

        /**
         * Class constructor
         */
        public function __construct() {
            $this->define_constants();

            register_activation_hook( __FILE__, [ $this, 'activate' ] );

            add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
        }

        /**
         * Initialize a singleton instance
         *
         * @return false|self
         */
        public static function init() {
            static $instance    = false;

            if ( ! $instance ) {
                $instance       = new self();
            }
            return $instance;
        }

        /**
         * Define the required plugin constants
         *
         * @return void
         */
        public function define_constants() {
            define( 'ADMINIFY_VERSION', self::version );
            define( 'ADMINIFY_FILE', __FILE__ );
            define( 'ADMINIFY_PATH', __DIR__ );
            define( 'ADMINIFY_URL', plugins_url( '', ADMINIFY_FILE ) );
            define( 'ADMINIFY_ASSETS', ADMINIFY_URL . '/assets' );
        }

        /**
         * Do stuff upon plugin activation
         *
         * @return void
         */
        public function activate() {

            $installed = get_option( 'adminify_installed' );

            if ( ! $installed ) {
                update_option( 'adminify_installed', time() );
            }

            update_option( 'adminify_version', ADMINIFY_VERSION );


            add_action( 'init', [ $this, 'init_plugin' ] );
        }

        /**
         * Initialize the plugin
         *
         * @return void
         */
        public function init_plugin() {
            new Adminify\Init();
        }

    }
}

/**
 * Initialize the main plugin
 *
 * @return \Adminify
 */
function Adminify() {
    return Adminify::init();
}
Adminify();