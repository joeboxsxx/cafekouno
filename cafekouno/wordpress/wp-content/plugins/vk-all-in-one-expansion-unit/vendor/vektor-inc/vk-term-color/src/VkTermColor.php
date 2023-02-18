<?php //phpcs:ignore
/**
 * VK_Term_Color
 *
 * @package vektor-inc/vk-term-color
 * @license GPL-2.0+
 *
 * @version 0.1.0
 */

namespace VektorInc\VK_Term_Color;

/**
 * Term Color
 */
class VkTermColor {

	/**
	 * Init
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'term_meta_color' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_enqueue_scripts' ) );

		// カラーピッカーを追加するタクソノミー.
		$taxonomies = self::get_term_color_taxonomies();

		// 該当のタクソノミー分ループ処理する.
		foreach ( $taxonomies as $key => $value ) {
			add_action( $value . '_add_form_fields', array( __CLASS__, 'taxonomy_add_new_meta_field_color' ), 10, 2 );
			add_action( $value . '_edit_form_fields', array( __CLASS__, 'taxonomy_add_edit_meta_field_color' ), 10, 2 );
			add_action( 'edited_' . $value, array( __CLASS__, 'save_term_meta_color' ), 10, 2 );
			add_action( 'create_' . $value, array( __CLASS__, 'save_term_meta_color' ), 10, 2 );
			add_filter( 'manage_edit-' . $value . '_columns', array( __CLASS__, 'edit_term_columns' ) );
			add_filter( 'manage_' . $value . '_custom_column', array( __CLASS__, 'manage_term_custom_column' ), 10, 3 );
		}
	}

	/**
	 * REGISTER TERM META
	 *
	 * @return void
	 */
	public static function term_meta_color() {
		register_meta( 'term', 'term_color', array( __CLASS__, 'sanitize_hex' ) );
	}

	/**
	 * SANITIZE DATA
	 *
	 * @param string $color color data.
	 * @return string $color
	 */
	public static function sanitize_hex( $color ) {
		// sanitize_hex_color() は undefined function くらう.
		$color = ltrim( $color, '#' );
		return preg_match( '/([A-Fa-f0-9]{3}){1,2}$/', $color ) ? $color : '';
	}

	/**
	 * タクソノミー新規追加ページでの日本語入力フォーム
	 *
	 * @return void
	 */
	public static function taxonomy_add_new_meta_field_color() {
		// this will add the custom meta field to the add new term page.
		?>
		<div class="form-field">
			<?php wp_nonce_field( basename( __FILE__ ), 'term_color_nonce' ); ?>
					<label for="term_color">
						<?php _e( 'Color', 'lightning' ); ?></label>
					<input type="text" name="term_color" id="term_color" class="term_color" value="">
		</div>
		<?php
	}

	/**
	 * タクソノミー編集ページでのフォーム
	 *
	 * @param object $term : term object.
	 * @return void
	 */
	public static function taxonomy_add_edit_meta_field_color( $term ) {

		// put the term ID into a variable.
		$term_color = self::get_term_color( $term->term_id );
		?>
			<tr class="form-field">
			<th scope="row" valign="top"><label for="term_color"><?php _e( 'Color', 'lightning' ); ?></label></th>
				<td>
			<?php wp_nonce_field( basename( __FILE__ ), 'term_color_nonce' ); ?>
					<input type="text" name="term_color" id="term_color" class="term_color" value="<?php echo $term_color; ?>">
				</td>
			</tr>
			<?php
	}

	/**
	 * Save color function
	 * Save extra taxonomy fields callback function.
	 *
	 * @param int $term_id term id.
	 * @return void
	 */
	public static function save_term_meta_color( $term_id ) {

		if ( ! isset( $_POST['term_color_nonce'] ) || ! wp_verify_nonce( $_POST['term_color_nonce'], basename( __FILE__ ) ) ) {
			return;
		}

		if ( isset( $_POST['term_color'] ) ) {
			$now_value = get_term_meta( $term_id, 'term_color', true );
			$new_value = $_POST['term_color'];
			if ( $now_value != $new_value ) {
				update_term_meta( $term_id, 'term_color', $new_value );
			} else {
				add_term_meta( $term_id, 'term_color', $new_value );
			}
		}
	}

	/**
	 * 管理画面 _ カラーピッカーのスクリプトの読み込み
	 *
	 * @param string $hook_suffix : page slug.
	 * @return void
	 */
	public static function admin_enqueue_scripts( $hook_suffix ) {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		add_action( 'admin_footer', array( __CLASS__, 'term_colors_print_scripts' ) );
	}

	/**
	 * Print Term Color style
	 *
	 * @return void
	 */
	public static function term_colors_print_styles() {
		?>
			<style type="text/css">
				.column-color { width: 50px; }
				.column-color .color-block { display: inline-block; width: 28px; height: 28px; border: 1px solid #ddd; }
			</style>
		<?php
	}

	/**
	 * Print term color script
	 *
	 * @return void
	 */
	public static function term_colors_print_scripts() {
		?>
			<script type="text/javascript">
				jQuery( document ).ready( function( $ ) {
					$( '.term_color' ).wpColorPicker();
				} );
			</script>
		<?php
	}

	/**
	 * 管理画面 _ カテゴリー一覧でカラムの追加
	 *
	 * @param array $columns : column data.
	 * @return array $columns : column data.
	 */
	public static function edit_term_columns( $columns ) {

		$columns['color'] = __( 'Color', 'lightning' );

		return $columns;
	}

	/**
	 * Manage term column
	 *
	 * @param string $out : color html.
	 * @param array  $column : column array.
	 * @param int    $term_id : term id.
	 * @return string $out
	 */
	public static function manage_term_custom_column( $out, $column, $term_id ) {

		if ( 'color' === $column ) {

			$color = self::get_term_color( $term_id );

			if ( ! $color ) {
				$color = '#ffffff';
			}

			$out = sprintf( '<span class="color-block" style="background:%s;">&nbsp;</span>', esc_attr( $color ) );
		}

		return $out;
	}

	/**
	 * Termのカラーを取得
	 *
	 * @param int $term_id .
	 * @return string $term_color
	 */
	public static function get_term_color( $term_id ) {
		$term_color_default = '#999999';
		$term_color_default = apply_filters( 'term_color_default_custom', $term_color_default );
		if ( isset( $term_id ) ) {
			$term_color = self::sanitize_hex( get_term_meta( $term_id, 'term_color', true ) );
			$term_color = ( $term_color ) ? '#' . $term_color : $term_color_default;
		} else {
			$term_color = $term_color_default;
		}
		return $term_color;
	}

	/**
	 *  Termのカラーを取得
	 *
	 * @param object $post .
	 * @param array  $args .
	 * @return void .
	 */
	public static function get_single_term_with_color( $post = '', $args = array() ) {
		if ( ! $post ) {
			global $post;
		}

		$args_default = array(
			'class' => '',
			'link'  => false,
		);
		$args         = wp_parse_args( $args, $args_default );

		$outer_class = '';
		if ( ! empty( $args['class'] ) ) {
			$outer_class = ' class="' . esc_attr( $args['class'] ) . '"';
		}

		$taxonomies = get_the_taxonomies();
		$exclusion  = array( 'post_tag', 'product_type' );
		// * vk_exclude_term_list is used in lightning too.
		$exclusion = apply_filters( 'vk_get_display_taxonomies_exclusion', $exclusion );
		if ( is_array( $exclusion ) ) {
			foreach ( $exclusion as $key => $value ) {
				unset( $taxonomies[ $key ] );
			}
		}

		$single_term_with_color = '';
		if ( $taxonomies ) :
			// get $taxonomy name.
			$taxonomy = key( $taxonomies );
			$terms    = get_the_terms( $post->ID, $taxonomy );
			if ( ! $terms ) {
				return;
			}
			$term_name  = esc_html( $terms[0]->name );
			$term_url   = esc_url( get_term_link( $terms[0]->term_id, $taxonomy ) );
			$term_color = self::get_term_color( $terms[0]->term_id );
			$term_color = ( $term_color ) ? ' style="color:#fff;background-color:' . $term_color . '"' : '';

			if ( $args['link'] ) {
				$single_term_with_color .= '<a' . $outer_class . $term_color . ' href="' . esc_url( $term_url ) . '">';
			} else {
				$single_term_with_color .= '<span' . $outer_class . $term_color . '>';
			}

			$single_term_with_color .= $term_name;

			if ( $args['link'] ) {
				$single_term_with_color .= '</a>';
			} else {
				$single_term_with_color .= '</span>';
			}

			endif;
		return $single_term_with_color;
	}

	/**
	 * Term color を有効化する taxonomy
	 *
	 * @return array $taxonomies .
	 */
	public static function get_term_color_taxonomies() {
		/*
		最初Global変数指定をしていたが、 Global変数では
		複数の term color が存在した場合に実行タイミングの都合上任意に指定が効かないため、
		フックでの指定を行う
		*/
		global $vk_term_color_taxonomies;
		if ( $vk_term_color_taxonomies ) {
			$taxonomies = $vk_term_color_taxonomies;
		} else {
			$taxonomies = array( 'category', 'post_tag' );
		}
		$taxonomies = apply_filters( 'term_color_taxonomies_custom', $taxonomies );
		// 重複の値を削除.
		$taxonomies = array_unique( $taxonomies );
		// 特に影響はないがキーを振り直す.
		$taxonomies = array_values( $taxonomies );
		return $taxonomies;
	}

}
