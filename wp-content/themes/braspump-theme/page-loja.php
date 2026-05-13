<?php 
/**
 * Template Name: Loja Customizada
 */
get_header(); ?>

<main class="flex-1 relative">
    <!-- Page Header -->
    <section class="bg-primary text-primary-foreground pt-32 pb-24 text-center relative overflow-hidden">
      <div class="container mx-auto px-4 relative z-10">
        <div class="page-banner">
          <span class="text-xs tracking-[0.3em] font-black opacity-70">BRASPUMP</span>
          <h1 class="text-4xl md:text-6xl font-black mt-2">LOJA ONLINE</h1>
        </div>
      </div>
      <!-- Wave Effect -->
      <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none rotate-180 opacity-10">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-24">
          <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
        </svg>
      </div>
    </section>

    <!-- Category Filters -->
    <section class="bg-muted py-6 border-b border-border sticky top-[72px] z-30">
      <div class="container mx-auto px-4 flex flex-wrap justify-center gap-4">
        <button class="filter-btn px-6 py-2 rounded-full bg-primary text-white font-bold text-sm shadow-md transition hover:scale-105" data-filter="all">TODOS</button>
        <?php 
        $categories = get_terms( array(
            'taxonomy' => 'product_cat',
            'include'  => array(17, 18, 19), // Linha CARBON, TURBO e Suctoras
            'orderby'  => 'include'
        ) );
        foreach ($categories as $cat) : ?>
          <button class="filter-btn px-6 py-2 rounded-full bg-white text-primary border border-primary/10 font-bold text-sm transition hover:bg-primary hover:text-white hover:scale-105" data-filter="<?php echo esc_attr($cat->slug); ?>">
            <?php echo esc_html( strtoupper($cat->name) ); ?>
          </button>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Product Grid -->
    <section class="container mx-auto px-4 py-20">
      <div class="grid gap-x-6 gap-y-12 sm:grid-cols-2 lg:grid-cols-4">
        
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post__not_in'   => array(35), // Esconder produto de teste Cielo
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => array(17, 18, 19),
                ),
            ),
        );
        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) :
          while ( $loop->have_posts() ) : $loop->the_post();
            global $product;
            $attachment_ids = $product->get_gallery_image_ids();
            $main_img = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $hover_img = !empty($attachment_ids) ? wp_get_attachment_url($attachment_ids[0]) : $main_img;
            $category_names = wc_get_product_category_list( get_the_ID(), ', ', '<span class="text-[10px] font-black text-brand-gold uppercase tracking-tighter mb-1 block">', '</span>' );
            
            // Get category slugs for filtering
            $terms = get_the_terms( get_the_ID(), 'product_cat' );
            $term_slugs = [];
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $term_slugs[] = $term->slug;
                }
            }
            $data_categories = implode(' ', $term_slugs);
            ?>
            
            <div class="product-item group rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col relative" data-categories="<?php echo esc_attr($data_categories); ?>">
              <div class="relative bg-muted aspect-square p-8 flex items-center justify-center overflow-hidden">
                <!-- Main Image -->
                <img src="<?php echo esc_url($main_img); ?>" 
                     alt="<?php the_title(); ?>" 
                     class="max-h-full object-contain transition duration-500 group-hover:opacity-0 group-hover:scale-90" />
                
                <!-- Hover Image (if exists) -->
                <img src="<?php echo esc_url($hover_img); ?>" 
                     alt="<?php the_title(); ?>" 
                     class="absolute max-h-full object-contain opacity-0 scale-110 transition duration-500 group-hover:opacity-100 group-hover:scale-100 p-8" />
                
                <?php if ($product->is_on_sale()) : ?>
                  <span class="absolute top-4 left-4 bg-brand-gold text-primary text-[10px] font-black px-3 py-1 rounded-full shadow-sm">OFERTA!</span>
                <?php endif; ?>
              </div>
              
              <div class="p-6 flex-1 flex flex-col">
                <?php echo $category_names; ?>
                <h3 class="text-[15px] font-black text-primary leading-tight uppercase tracking-tight"><?php the_title(); ?></h3>
                <div class="mt-4 flex items-center justify-between border-t border-muted pt-4">
                  <div class="flex flex-col">
                    <span class="text-[11px] text-muted-foreground font-bold uppercase tracking-widest opacity-50">A partir de</span>
                    <span class="text-lg font-black text-primary"><?php echo $product->get_price_html(); ?></span>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="h-11 w-11 rounded-full bg-primary text-white flex items-center justify-center hover:bg-brand-gold hover:text-primary transition-colors shadow-lg group/btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 group-hover/btn:translate-x-0.5 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                  </a>
                </div>
                <a href="<?php the_permalink(); ?>" class="mt-4 btn-primary justify-center py-3 text-sm">
                  VER DETALHES
                </a>
              </div>
            </div>

            <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>

      </div>
    </section>

    <!-- Filter Script -->
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const productItems = document.querySelectorAll('.product-item');

        filterBtns.forEach(btn => {
          btn.addEventListener('click', function() {
            // Remove active classes from all buttons
            filterBtns.forEach(b => {
              b.classList.remove('bg-primary', 'text-white', 'shadow-md');
              b.classList.add('bg-white', 'text-primary', 'border', 'border-primary/10');
            });

            // Add active classes to the clicked button
            this.classList.remove('bg-white', 'text-primary', 'border', 'border-primary/10');
            this.classList.add('bg-primary', 'text-white', 'shadow-md');

            const filterValue = this.getAttribute('data-filter');

            // Filter the products
            productItems.forEach(item => {
              if (filterValue === 'all') {
                item.style.display = 'flex';
              } else {
                const itemCats = item.getAttribute('data-categories').split(' ');
                if (itemCats.includes(filterValue)) {
                  item.style.display = 'flex';
                } else {
                  item.style.display = 'none';
                }
              }
            });
          });
        });
      });
    </script>
</main>

<?php get_footer(); ?>
