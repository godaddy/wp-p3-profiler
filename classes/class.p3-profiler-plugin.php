<?php

/**
 * P3 Plugin Performance Profiler Plugin
 *
 * @author GoDaddy.com
 * @package P3_Profiler
 */
class P3_Profiler_Plugin {

	/**
	 * Add the 'P3 Profiler' option under the 'Tools' menu
	 */
	public static function tools_menu() {
		$page = add_management_page(
			__( 'P3 Plugin Profiler', 'p3-profiler' ),
			__( 'P3 Plugin Profiler', 'p3-profiler' ),
			'manage_options',
			P3_PLUGIN_SLUG,
			array( 'P3_Profiler_Plugin_Admin', 'dispatcher' )
		);
	}


	/**
	 * Show the "Profile now" option on the plugins table
	 * @param array $links
	 * @param string $file
	 * @return array New links
	 */
	public static function add_settings_link( $links, $file ) {
		$settings_link = '<a href="tools.php?page=p3-profiler">' . __( 'Scan Now', 'p3-profiler' ) . '</a>';
		// p3-profiler === p3-profiler
		if ( dirname( plugin_basename( $file ) ) === basename( P3_PATH ) )
			array_unshift( $links, $settings_link );
		return $links;
	}

	/**
	 * Activation hook
	 * Install the profiler loader as a mu-plugin
	 */
	public static function activate() {
		global $wp_version;

		// Version check, only 3.3+
		if ( ! version_compare( $wp_version, '3.3', '>=' ) ) {
			if ( function_exists( 'deactivate_plugins' ) )
				deactivate_plugins( P3_PATH . DIRECTORY_SEPARATOR . 'p3-profiler.php' );
			die( '<strong>P3</strong> requires WordPress 3.3 or later' );
		}

		// mu-plugins doesn't exist
		if ( !file_exists( WPMU_PLUGIN_DIR ) && is_writable( dirname( WPMU_PLUGIN_DIR ) ) ) {
			wp_mkdir_p( WPMU_PLUGIN_DIR );
		}
		if ( file_exists( WPMU_PLUGIN_DIR ) && is_writable( WPMU_PLUGIN_DIR ) ) {
			file_put_contents(
				WPMU_PLUGIN_DIR . '/p3-profiler.php',
				'<' . "?php // Start profiling\n@include_once( WP_PLUGIN_DIR . '/p3-profiler/start-profile.php' ); ?" . '>'
			);
		}

		// PHP >= 7 Compatibility Notice
		if ( version_compare( PHP_VERSION, '7.0.0', '>=' ) ) {
			if ( function_exists( 'deactivate_plugins' ) ) {
				die( '<strong>P3</strong> is not compatible with PHP 7.0.0 or later.' );
			}
		}

	}

	/**
	 * Deactivation hook
	 * Remove the profiler loader
	 * @return void
	 */
	public static function deactivate() {
		global $p3_profiler;

		// Unhook the profiler
		$opts = get_option( 'p3-profiler_options' );
		$opts['debug'] = false;
		update_option( 'p3-profiler_options', $opts );
		update_option( 'p3-profiler_debug_log', array() );

		// Remove mu-plugin
		if ( file_exists( WPMU_PLUGIN_DIR . '/p3-profiler.php' ) ) {
			if ( is_writable( WPMU_PLUGIN_DIR . '/p3-profiler.php' ) ) {
				// Some servers give write permission, but not delete permission.  Empty the file out, first, then try to delete it.
				file_put_contents( WPMU_PLUGIN_DIR . '/p3-profiler.php', '' );
				unlink( WPMU_PLUGIN_DIR . '/p3-profiler.php' );
			}
		}
	}
}
