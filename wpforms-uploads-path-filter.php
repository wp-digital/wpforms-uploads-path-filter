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

//use Innocode\Wpforms_Uploads_Path;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

add_filter( 'wpforms_upload_root', function ( $path ) {
    if ( defined( 'INNOCODE_WPFORMS_UPLOADS_PATH' ) ) {
        $path = untrailingslashit( INNOCODE_WPFORMS_UPLOADS_PATH );
    } else {
        $path = trailingslashit( WP_CONTENT_DIR ) . '/uploads/wpforms';
    }
    return $path;
} );


// disable s3 path replace for submit process
if ( class_exists( '\S3_Uploads\Plugin' ) ) {
    $s3_plugin = \S3_Uploads\Plugin::get_instance();
    add_action( 'wpforms_process_before', function ( $entry, $form_data ) use ( $s3_plugin ) {
        remove_filter( 'upload_dir', [
            $s3_plugin,
            'filter_upload_dir'
        ] );
    }, 10, 2 );

    add_action( 'wpforms_process_complete', function ( $fields, $entry, $form_data, $entry_id ) use ( $s3_plugin ) {
        add_filter( 'upload_dir', [
            $s3_plugin,
            'filter_upload_dir'
        ] );
    }, 10, 4 );
}

