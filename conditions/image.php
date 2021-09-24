<?php

namespace Jet_Engine_SPWCVC;

use Elementor\Controls_Manager;

class Image extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base {

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet-spwcvc-image';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name() {
		return __( 'Product has Image', 'jet-engine' );
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

		global $product;

		$type              = ! empty( $args['type'] ) ? $args['type'] : 'show';
		$post_thumbnail_id = $product->get_image_id();

		if ( 'hide' === $type ) {
			return empty( $post_thumbnail_id );
		} else {
			return ! empty( $post_thumbnail_id );
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
