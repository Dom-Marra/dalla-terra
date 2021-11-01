<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dalla_Terra
 */

get_header();
?>

	<main id="primary" class="site-main">
<!-- banner image -->
		<?php
			$banner = get_field('banner');
			if ( $banner ) : ?>
				<section class="banner-section">
					<img src="<?php echo esc_url( $banner['background_image']['url'] ); ?>" alt="<?php echo esc_attr( $banner['background_image']['alt'] ); ?>" />
					<h1><?php echo  $banner['text']; ?></h1>
				</section>
		<?php
		endif;
		?>
		<section class="contact-form-section">
			<h2>Contact Us</h2>
			<?php echo do_shortcode('[wpforms id="261"]'); ?>
		</section>
<!-- address -->
		<?php
			$address = get_field('address');
			$email = get_field('email');
			$phone = get_field('phone_number');
			if ( $address || $email || $phone ):
			?>
				<section class="contact-container">
					<h2>Our Address</h2>
					<address>
						<?php if ($address) : ?>
							<p><?php echo $address; ?></p>
						<?php endif; ?>
						<?php if ($email) : ?>
							<p><?php echo $email; ?></p>
						<?php endif; ?>
						<?php if ($phone) : ?>
							<p><?php echo $phone; ?></p>
						<?php endif; ?>
					</address>
				</section>
		<?php
		endif;
		?>
<!-- business hours -->
		<?php
		if( have_rows('business_hours') ): ?>
		<section class="opening-hours">
			<h2>Business Hours</h2>
			<table>
				<tbody>
					<?php
					while( have_rows('business_hours') ) : the_row();
					$day = get_sub_field('day');
					$openHour = get_sub_field('open_hour');
					$closeHour = get_sub_field('close_hour');
					?>
					<tr>
						<td>
							<?php echo $day; ?>
						</td>
						<td>
							<?php echo $openHour . " - " . $closeHour; ?>
						</td>
				
					</tr>
					<?php
					endwhile;
					?>
				</tbody>
			</table>
		</section>
		<?php
		endif;
		?>
				

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
