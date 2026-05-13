<?php
/**
 * The Template for displaying all single products
 */

get_header(); ?>

<main class="flex-1 bg-background pt-32 pb-16">
    <div class="container mx-auto px-6">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                wc_get_template_part( 'content', 'single-product' );
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
