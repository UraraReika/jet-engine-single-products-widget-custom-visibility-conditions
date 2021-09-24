<?php

namespace Jet_Engine_SPWCVC;

use Elementor\Controls_Manager;

class Content extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base {

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet-spwcvc-content';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name() {
		return __( 'Product has Content', 'jet-engine' );
	}

	/**
	 * Returns group for current operator
	 *
	 * @return string
	 */
	public function get_group() {
		return 'posts';
	}

	/**
	 * Check condition by passed arguments
	 *
	 * @param array $args
	 *
	 * @return bool
	 */
	public function check( $args = array() ) {

		$type = ! empty( $args['type'] ) ? $args['type'] : 'show';

		global $product;

		$product_id   = $product->get_id();
		$content_mode = get_post_meta( $product_id, '_elementor_edit_mode', true );

		if ( 'builder' === $content_mode && class_exists( 'Elementor\Plugin' ) ) {
			$elementor    = \Elementor\Plugin::$instance;
			$is_edit_mode = $elementor->editor->is_edit_mode();
			$content      = $elementor->frontend->get_builder_content( $product_id, $is_edit_mode );
		} else {
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
		}

		if ( 'hide' === $type ) {
			return empty( $content );
		} else {
			return ! empty( $content );
		}

	}

	/**
	 * Check if is condition available for meta fields control
	 *
	 * @return boolean
	 */
	public function is_for_fields() {
		return false;
	}

	/**
	 * Check if is condition available for meta value control
	 *
	 * @return boolean
	 */
	public function need_value_detect() {
		return false;
	}

}
