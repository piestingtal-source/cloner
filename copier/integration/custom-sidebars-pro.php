<?php

/**
 * Module Name: Benutzerdefinierte Seitenleisten
 * Plugin: benutzerdefinierte-seitenleisten/ps-sidebars.php
 */


if ( ! function_exists( 'copier_csp_copy_sidebars_settings' ) ) {
	/**
	 * Due to a rare issue when switching the theme, Benutzerdefinierte Seitenleisten Pro settings
	 * must be copied after execution is done
	 * 
	 * @param Integer $source_blog_id
	 */
	function copier_csp_copy_sidebars_settings( $source_blog_id ) {
		if ( ! function_exists( 'is_plugin_active' ) )
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( is_plugin_active( 'benutzerdefinierte-seitenleisten/ps-sidebars.php' ) ) {
			$source_settings = get_blog_option( $source_blog_id, 'sidebars_widgets' );
			update_option( 'sidebars_widgets', $source_settings );
		}
	}
	add_action( 'psource_copier-copy-after_copying', 'copier_csp_copy_sidebars_settings' );
}