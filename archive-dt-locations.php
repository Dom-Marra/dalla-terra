<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dalla_Terra
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					if ( get_field('title', 'option') ) : ?>
						<h1><?php echo get_field('title', 'option'); ?></h1>
					<?php else : ?>
						<h1><?php echo 'Locations'; ?></h1>
				<?php endif; ?>
			</header><!-- .page-header -->

			<?php

			if ( get_field('introduction', 'option') ) :
				echo get_field('introduction', 'option');
			endif;

			?>

			<?php 

				$location_sort = 'all';

				if( isset($_GET['location'] ) ){
					$location_sort = trim($_GET["location"]);
				}
			
			?>

			<section class="location-types">
				<p>What kind of location?</p>
				<nav>
					<?php 

						$categories = get_categories([
							'taxonomy'      => 'dt-location-category',
							'parent'        => 0,
							'hide_empty'    => false
						]);

						foreach ($categories as $cat) : 
							global $wp;

							$link = home_url( $wp->request );
							
							if ($location_sort === 'all') {
								$link = add_query_arg( 'location', $cat->term_id, home_url( $wp->request ) );
							}
							
						?>
							<a href="<?php echo esc_url($link) ?>"><?php echo $cat->name; ?></a>
						<?php endforeach; ?>
				</nav>
			</section>

			<?php

			echo do_shortcode('[leaflet-map fitbounds]');

			while ( have_posts() ) : 

				the_post();
				$terms = get_the_terms( $post->ID, 'dt-location-category' );

				if ($location_sort === 'all' || in_array($location_sort, $terms)) :
			
			?>

				<section class="expander location">
					<h2><?php the_title() ?></h2>
					
					<?php
						$address = get_field('address');
						$phone = get_field('phone_number');
						$lat = get_field('latitude');
						$lng = get_field('longitude');

						if ($address && $lat && $lng) :
							echo do_shortcode(
								'[leaflet-marker lat='. $lat .' lng='. $lng .']' . 
								get_the_title() . '<br /> <br />' .
								str_replace(array("\r", "\n"), '', $address) . 
								'[/leaflet-marker]');
						endif;

						if ($address): ?>
							<address>
								<?php echo $address ?>
								<?php if ($phone) : ?>
									<p><?php echo $phone ?></p>
								<?php endif ?>
							</address>
					<?php endif;
						if( have_rows('store_hours') ): ?>

							<table>
								<tbody>
									<?php while( have_rows('store_hours') ) : the_row();
								
										$day = get_sub_field('day');
										$hours = get_sub_field('hours');
										?>

										<tr>
											<td><?php echo $day ?></td>
											<td><?php echo $hours ?></td>
										</tr>
									<?php endwhile; ?>
								</tbody>
							</table>
					<?php endif; ?>
					<button class="expand-btn">See More</button>
				</section>
			<?php endif; endwhile; 
		endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
