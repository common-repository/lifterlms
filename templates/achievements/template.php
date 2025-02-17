<?php
/**
 * Single Achievement Template
 *
 * @package LifterLMS/Templates/Achievements
 *
 * @since 1.0.0
 * @version 6.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<a class="llms-achievement" data-id="<?php echo esc_attr( $achievement->get( 'id' ) ); ?>" href="#<?php printf( 'achievement-%d', intval( $achievement->get( 'id' ) ) ); ?>" id="<?php printf( 'llms-achievement-%d', intval( $achievement->get( 'id' ) ) ); ?>">

	<?php do_action( 'lifterlms_before_achievement', $achievement ); ?>

	<div class="llms-achievement-image"><?php echo $achievement->get_image_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in method. ?></div>

	<h4 class="llms-achievement-title"><?php echo esc_html( $achievement->get( 'title' ) ); ?></h4>

	<div class="llms-achievement-info">
		<div class="llms-achievement-content"><?php echo wp_kses_post( $achievement->get( 'content' ) ); ?></div>
		<div class="llms-achievement-date"><?php printf( esc_html_x( 'Awarded on %s', 'achievement earned date', 'lifterlms' ), esc_html( $achievement->get_earned_date() ) ); ?></div>
	</div>

	<?php do_action( 'lifterlms_after_achievement', $achievement ); ?>

</a>

