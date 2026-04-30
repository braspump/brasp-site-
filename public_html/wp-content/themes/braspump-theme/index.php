<?php get_header(); ?>

<main class="flex-1">
    <div class="container mx-auto px-6 py-20">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
