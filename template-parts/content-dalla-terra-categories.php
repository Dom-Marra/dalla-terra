<?php 

    $args = get_query_var( 'categories' );

    set_query_var( 'categories', null );
    

    $categories = get_categories([
        'taxonomy'      => 'product_cat',
        'parent'        => 0,
        'hide_empty'    => false,
        'exclude'       => array( '15' ),                   //Don't care about uncategorized category
        'include'       => empty($args) ? null : $args      //Include specified categories
    ]);

    foreach ($categories as $category) : ?>
        <article class="category-article">
            <?php 
                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );

                if ( $image ) : ?>
                    <img class="category-thumbnail" src="<?php echo $image ?>" alt="<?php echo $cat->name . ' thumbnail' ?>" />
            <?php endif ?> 

            <h2 class="category-name"><?php echo $category->name ?></h2>

            <?php if ( get_field('caption', 'product_cat_'.$category->term_id )) : ?>
                <p class="category-caption"><?php the_field('caption', 'product_cat_'.$category->term_id); ?></p>
            <?php endif; ?>

            <?php if ( $category->description ) : ?>
                <p class="category-description"><?php echo $category->description; ?></p>
            <?php endif; ?>

            <?php 
                $image = get_field('secondary_image', 'product_cat_'.$category->term_id );
                if ( !empty( $image ) && !is_front_page() ) : ?>
                <img class="category-second-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>

            <?php 
                $link_url = add_query_arg( 'filters', 'product_cat[' . $category->term_id . ']', get_permalink(11))
            ?>

            <a class="category-link" href="<?php echo $link_url ?>">View All</a>
        
        </article>
    <?php endforeach;


?>