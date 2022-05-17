<?php
/**
 * Plugin Name: WPforms uploads path
 * Description: Change default wpforms plugin uploads folder.
 * Version: 1.0
 * Author: Innocode
 * Author URI: https://innocode.com
 * Tested up to: 5.6.2
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

use Innocode\WPFORMS_UPLOADS_PATH;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

add_filter( 'wpforms_upload_root', function ( $path ) {
    if ( defined( 'INNOCODE_WPFORMS_UPLOADS_PATH' ) ) {
        $path = untrailingslashit( INNOCODE_WPFORMS_UPLOADS_PATH );
    } else {
        $path = trailingslashit( WP_CONTENT_DIR ) . 'wpforms';
    }
    return $path;
} );


