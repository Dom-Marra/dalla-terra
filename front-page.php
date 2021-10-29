<?php
/**
 * The template for displaying the Home Page
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

		<?php
		while ( have_posts() ) :
			the_post();

			?>
			<section class="view-single-product-home">
				<?php 
				$featured_posts = get_field('view_single_product');
				if( $featured_posts ): ?>
				
					<?php foreach( $featured_posts as $post ): 
				
						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post); ?>
						<?php the_post_thumbnail() ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php endforeach; ?>
					
					<?php 
					// Reset the global post object so that the rest of the page works correctly.
					wp_reset_postdata(); ?>
				<?php endif; ?>
			</section>


			</section class="custom-cta-home"> 
				<?php
				$customcta = get_field('custom_call_to_action');
				if( $customcta ): ?>
					<div id="custom-cta-content">

					<img src="<?php echo esc_url( $customcta['background_image']['url'] ); ?>" alt="<?php echo esc_attr( $customcta['background_image']['alt'] ); ?>" />
					<a href="<?php echo esc_url( $customcta['link']['url'] ); ?>">
						<button><?php echo esc_html( $customcta['button_text']); ?></button>
					</a>
						
					</div>
					</style>
				<?php endif; ?>
			<section>

			<section class="view-shop-cta-home">
			<?php
				$viewShopCTA= get_field('view_shop_cta');
				if( $viewShopCTA ): ?>
					<div id="custom-cta-content">

					<img src="<?php echo esc_url( $viewShopCTA['background_image']['url'] ); ?>" alt="<?php echo esc_attr( $viewShopCTA['background_image']['alt'] ); ?>" />
					<a href="<?php echo esc_url( $viewShopCTA['link']['url'] ); ?>">
						<button><?php echo esc_html( $viewShopCTA['button_text']); ?></button>
					</a>
						
					</div>
					</style>
				<?php endif; ?>
			</section>

			<section class="bestsellers-home">
				<?php 
				$featured_posts = get_field('bestsellers');
				if( $featured_posts ): ?>
				
					<?php foreach( $featured_posts as $post ): 
				
						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post); ?>
						<?php the_post_thumbnail() ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php endforeach; ?>
					
					<?php 
					// Reset the global post object so that the rest of the page works correctly.
					wp_reset_postdata(); ?>
				<?php endif; ?>
			</section>
			
			<section class="categories-section-home">
			 <?php
				//Inserty code for Catergory Taxonomy
			 ?>
			</section>


			<section class="about-us-banner-home">
			<?php
				$aboutUsBanner= get_field('about_us_banner');
				if( $aboutUsBanner ): ?>
					<div id="about-us-banner">

					<img src="<?php echo esc_url( $aboutUsBanner['background_image']['url'] ); ?>" alt="<?php echo esc_attr( $aboutUsBanner['background_image']['alt'] ); ?>" />
					<a href="<?php echo esc_url( $aboutUsBanner['link']['url'] ); ?>">
						<button><?php echo esc_html( $aboutUsBanner['button_text']); ?></button>
					</a>
						
					</div>
					</style>
				<?php endif; ?>
			</section>


			
		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
