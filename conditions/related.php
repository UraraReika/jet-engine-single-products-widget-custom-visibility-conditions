<?php

namespace Jet_Engine_SPWCVC;

use Elementor\Controls_Manager;

class Related extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base {

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet-spwcvc-related';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name() {
		return __( 'Product has Related', 'jet-engine' );
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
		$related = wc_get_related_products( $product->get_id(), 4, $product->get_upsell_ids() );

		if ( 'hide' === $type ) {
			return empty( $related );
		} else {
			return ! empty( $related );
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
