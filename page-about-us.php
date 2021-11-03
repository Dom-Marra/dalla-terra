<?php
/**
 * The template for displaying About Us Page
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
        <section class="about-us-banner">
            <?php
            $aboutUsBanner = get_field('banner');
            $size = 'medium';
				if( $aboutUsBanner ): ?>
					<div id="custom-cta-content">
                        <?php echo wp_get_attachment_image($aboutUsBanner, $size ); ?>
                        <h2><?php echo $aboutUsBanner['text']; ?></h2>
					</div>
				<?php endif; ?>
        </section>

        <section class="about-us-quote">
                    <blockquote><?php the_field('quote'); ?></blockquote>
        </section>
       
        <section class="about-us-farm-gallery">
        <?php
            $farmGallery = get_field('farm_gallery');
            $images = $farmGallery['images'];

				if( $farmGallery): ?>
					<h2><?php echo $farmGallery['gallery_heading']; ?></h2>
                    <p><?php echo $farmGallery['gallery_caption']; ?></p>
                    <?php endif; ?>

                    <div>
                        <?php
                        if( $images ): ?>
                            <ul>
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <a href="<?php echo $image['url']; ?>">
                                        <?php echo wp_get_attachment_image($image, $size ); ?>
                                        </a>
                                        <p><?php echo $image['caption']; ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
        </section>

        <section class="about-us-mission">
        <?php $field = get_field_object('our_mission');?>
            <h2><?php echo $field['label']; ?></h2>
            <p><?php the_field('our_mission'); ?></p>
        </section>

        <section class="about-us-history">
        <?php
            $field = get_field_object('our_history');
            ?>
            <h2><?php echo $field['label']; ?></h2>
            <p><?php the_field('our_history'); ?></p>
        </section>

        <section class="winery-gallery">
        <?php
            $wineryGallery = get_field('winery_gallery');
            $images = $wineryGallery['images'];

				if( $wineryGallery ): ?>
					<h2><?php echo $wineryGallery['gallery_heading']; ?></h2>
                    <p><?php echo $wineryGallery['gallery_caption']; ?></p>
                    <?php endif; ?>

                    <div>
                        <?php
                        if( $images ): ?>
                            <ul>
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <a href="<?php echo $image['url']; ?>">
                                            <?php echo wp_get_attachment_image($image, $size ); ?>
                                        </a>
                                        <p><?php echo $image['caption']; ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
        </section>

        <section class="about-us-vision">
        <?php $field = get_field_object('our_vision');?>
            <h2><?php echo $field['label']; ?></h2>
            <p><?php the_field('our_vision'); ?></p>
        </section>

        <section class="link-cta">
        <?php
				$shopLink= get_field('link');
				if( $shopLink ): ?>
					<a href="<?php echo esc_url( $shopLink['link']['url'] ); ?>">
						<?php echo esc_html( $shopLink['text']); ?>
					</a>
						
				<?php endif; ?>
                
        <nav id="social-navigation" class="social-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'social')); ?>
	    </nav>
        </section>
		
        <?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
