<?php

/**
 * Table property.
 */
class Papi_Property_Table extends Papi_Property {

	/**
	 * The convert type.
	 *
	 * @var string
	 */
	public $convert_type = 'array';

	/**
	 * Build table from array data.
	 *
	 * @param  array $arr
	 * @param  bool  $child
	 *
	 * @return stringe
	 */
	protected function build_table( array $arr, $child = false ) {
		$html = '<div class="papi-property-table"><table class="papi-table">';

		if ( $child ) {
			$html .= '<thead>';

			foreach ( $arr[0] as $key => $value ) {
				$html .= sprintf( '<th>%s</th>', $key );
			}

			$html .= '</thead>';
		}

		foreach ( $arr as $key => $value ) {
			$html .= '<tr>';

			foreach ( $value as $key2 => $value2 ) {
				if ( is_array( $value2 ) ) {
					$value2 = $this->build_table( $value2, true );
				}

				$html .= sprintf( '<td>%s</td>', papi_convert_to_string( $value2 ) );
			}

			$html .= '</tr>';
		}

		return $html . '</table></div>';
	}

	/**
	 * Render property html.
	 */
	public function html() {
		$value = $this->get_value();
		$data  = $this->get_setting( 'items' );

		if ( is_array( $data ) ) {
			echo $this->build_table( $data );
		} else {
			echo 'Missing data';
		}
	}

	/**
	 * Output property css.
	 */
	public function css() {
		?>
		<style>
			.papi-property-table {
				margin-right: -31px;
			}

			.papi-property-table > table {
				margin: -11px 0 -10px -15px;
			}

			.papi-property-table > table th {
				border-right: 1px solid #eaeaea;
				padding: 10px 16px 10px 15px;
				text-align: left;
				vertical-align: top;
			}

			.papi-property-table > table th:last-child {
				border-right: 0;
			}

			.papi-property-table > table td:first-child {
				font-weight: bold;
			}

			.papi-property-table > table table td:first-child {
				background: #fff;
				font-weight: normal;
				width: auto;
			}
		</style>
		<?php
	}

	/**
	 * Setup actions.
	 */
	public function setup_actions() {
		add_action( 'admin_head', [$this, 'css'] );
	}
}
