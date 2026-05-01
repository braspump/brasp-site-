<?php 
/**
 * Template Name: Bombas de Vácuo
 */
get_header(); ?>

<main class="flex-1 relative">
    <section class="bg-primary text-white pt-16 pb-40 relative overflow-hidden">
      <!-- Background Pattern -->
      <div class="absolute inset-0 z-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
      
      <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="page-banner">
          <span class="text-xs tracking-[0.3em] font-black opacity-70">PRODUTOS</span>
          <h1 class="text-3xl md:text-6xl font-black mt-2">BOMBAS DE VÁCUO</h1>
        </div>
        <p class="text-white text-lg md:text-xl font-bold italic tracking-wide mt-8">Excelência e performance para sua clínica</p>
      </div>
    </section>

    <!-- Category Selection -->
    <section class="container mx-auto px-4 -mt-24 relative z-20">
      <div class="grid md:grid-cols-2 gap-8 max-w-7xl mx-auto">
        <!-- 4 Consultórios -->
        <div class="text-center group">
          <a href="<?php echo esc_url( home_url( '/bombas-de-vacuo-4-consultorios' ) ); ?>" class="block relative transition-transform hover:scale-[1.03] duration-500">
            <img src="<?php echo get_template_directory_uri(); ?>/images/BOMBAS-DE-VACUO-4-CONSULTORIOS-6-1024x768.webp" alt="Para 4 consultórios" class="w-full h-auto drop-shadow-2xl" width="1024" height="768" loading="eager" />
          </a>
        </div>

        <!-- 2 Consultórios -->
        <div class="text-center group">
          <a href="<?php echo esc_url( home_url( '/bombas-de-vacuo-2-consultorios' ) ); ?>" class="block relative transition-transform hover:scale-[1.03] duration-500">
            <img src="<?php echo get_template_directory_uri(); ?>/images/BOMBAS-DE-VACUO-4-CONSULTORIOS-3-1024x768.webp" alt="Para 2 consultórios" class="w-full h-auto drop-shadow-2xl" width="1024" height="768" loading="eager" />
          </a>
        </div>
      </div>

      <div class="text-center mt-12 mb-16">
        <p class="text-primary/60 text-lg font-bold">Clique nas imagens para saber mais</p>
      </div>
    </section>

    <section class="bg-muted py-16">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-primary mb-2">
          Acesse o manual de instalação e operação
        </h2>
        <p class="text-muted-foreground mb-6">(1º semestre / 2020)</p>
        <a
          href="https://www.flipsnack.com/manualbraspump/manual-de-instala-o-e-opera-o-braspump-fznqt2ge9.html"
          target="_blank"
          rel="noreferrer"
          class="inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 font-semibold text-primary-foreground hover:bg-primary/90 transition"
        >
          MANUAL <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M18 13v6a2 2 0 0 1-2.18 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        </a>
      </div>
    </section>
</main>

<?php get_footer(); ?>
