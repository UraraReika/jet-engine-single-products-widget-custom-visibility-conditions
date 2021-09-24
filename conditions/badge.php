<?php

namespace Jet_Engine_SPWCVC;

use Elementor\Controls_Manager;

class Badge extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base {

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet-spwcvc-badge';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name() {
		return __( 'Product has Badge', 'jet-engine' );
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

		if ( 'hide' === $type ) {
			return ! $product->is_on_sale();
		} else {
			return $product->is_on_sale();
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
