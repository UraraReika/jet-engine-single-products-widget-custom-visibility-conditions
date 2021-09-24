<?php
/**
 * Plugin Name: JetEngine - Single Product Widgets Custom Visibility Conditions
 * Plugin URI: https://github.com/UraraReika/jet-engine-single-products-widget-custom-visibility-conditions
 * Description: Add custom conditions for displaying JetWooBuilder single product template widgets.
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * Text Domain: jet-engine
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

// Init plugin after loading
add_action( 'plugins_loaded', 'jet_engine_single_product_widgets_cvc' );

/**
 * Initialize plugin
 */
function jet_engine_single_product_widgets_cvc() {

	define( 'JET_SPWCVC__FILE__', __FILE__ );
	define( 'JET_SPWECVC_PATH', plugin_dir_path( JET_SPWCVC__FILE__ ) );

	add_action( 'jet-engine/modules/dynamic-visibility/conditions/register', function( $conditions_manager ) {

		require JET_SPWECVC_PATH . 'conditions/attributes.php';
		require JET_SPWECVC_PATH . 'conditions/content.php';
		require JET_SPWECVC_PATH . 'conditions/excerpt.php';
		require JET_SPWECVC_PATH . 'conditions/image.php';
		require JET_SPWECVC_PATH . 'conditions/rating.php';
		require JET_SPWECVC_PATH . 'conditions/related.php';
		require JET_SPWECVC_PATH . 'conditions/badge.php';
		require JET_SPWECVC_PATH . 'conditions/upsells.php';

		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Attributes() );
		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Content() );
		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Excerpt() );
		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Image() );
		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Rating() );
		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Related() );
		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Badge() );
		$conditions_manager->register_condition( new Jet_Engine_SPWCVC\Upsells() );

	} );

}
