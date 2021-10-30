<?php
/**
 * The sidebar containing the shop filters
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dalla_Terra
 */

if ( ! is_active_sidebar( 'filters' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'filters' ); ?>
</aside><!-- #secondary -->
