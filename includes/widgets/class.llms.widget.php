<?php
/**
 * Base LifterLMS Widget Class
 *
 * @package LifterLMS/Widgets/Classes
 *
 * @since 1.0.0
 * @version 3.24.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Base LifterLMS Widget Class
 *
 * @since 1.0.0
 * @since 3.24.0 Unknown.
 */
class LLMS_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 *
	 * @see WP_Widget::__construct()
	 */
	public function __construct() {}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @return  void
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] );
		}

		$this->widget_contents( $args, $instance );

		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Echo Widget content.
	 * This is called in widget()
	 *
	 * @return void
	 */
	public function widget_contents( $args, $instance ) {}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 * @param array $instance Previously saved values from database.
	 * @return  void
	 * @since    1.0.0
	 * @version  3.24.0
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'lifterlms' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

return new LLMS_Widget();
