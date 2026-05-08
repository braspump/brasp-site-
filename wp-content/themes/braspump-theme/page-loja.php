<?php 
/**
 * Template Name: Loja Customizada
 */
get_header(); ?>

  <main class="flex-1 relative">
    <section class="bg-primary text-primary-foreground py-24 text-center">
      <div class="container mx-auto px-4">
        <div class="page-banner">
          <span class="text-xs tracking-[0.3em] font-black opacity-70">LOJA</span>
          <h1 class="text-4xl md:text-6xl font-black mt-2">LOJA ONLINE</h1>
        </div>
        <p class="text-primary-foreground/80 mt-8 text-lg font-medium">Nossos produtos de excelência</p>
      </div>
    </section>

    <section class="container mx-auto px-4 py-14">
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- BC2 -->
        <article class="group relative rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
          <span class="absolute top-3 left-3 z-10 rounded-full bg-brand-gold px-3 py-1 text-xs font-bold text-brand-gold-foreground">Oferta!</span>
          <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-bc2-linha-carbon' ) ); ?>" class="block">
            <div class="bg-muted aspect-square flex items-center justify-center p-6 relative overflow-hidden">
              <img src="<?php echo get_template_directory_uri(); ?>/images/BC2-C-CAPA.webp" alt="BC2 Com Capa" class="max-h-full object-contain transition-all duration-500 group-hover:opacity-0 group-hover:scale-90" />
              <img src="<?php echo get_template_directory_uri(); ?>/images/BC2-S-CAPA.webp" alt="BC2 Sem Capa" class="absolute inset-0 m-auto max-h-full object-contain opacity-0 scale-110 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500 p-6" />
            </div>
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <h3 class="font-bold text-primary leading-snug text-[13px] min-h-[3.5rem] flex items-center">
              <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-bc2-linha-carbon' ) ); ?>" class="hover:text-brand-gold transition">Bomba de Vácuo BC2 – Linha CARBON | BRASPUMP</a>
            </h3>
            <p class="mt-2 font-extrabold text-primary text-sm">R$ 3.850,00 – R$ 4.250,00</p>
            <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-bc2-linha-carbon' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-2.5 font-bold text-primary hover:brightness-110 transition shadow-sm uppercase text-xs">
              VER DETALHES
            </a>
          </div>
        </article>

        <!-- BC4 -->
        <article class="group relative rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
          <span class="absolute top-3 left-3 z-10 rounded-full bg-brand-gold px-3 py-1 text-xs font-bold text-brand-gold-foreground">Oferta!</span>
          <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-bc4-linha-carbon' ) ); ?>" class="block">
            <div class="bg-muted aspect-square flex items-center justify-center p-6 relative overflow-hidden">
              <img src="<?php echo get_template_directory_uri(); ?>/images/BC4-C-CAPA.webp" alt="BC4 Com Capa" class="max-h-full object-contain transition-all duration-500 group-hover:opacity-0 group-hover:scale-90" />
              <img src="<?php echo get_template_directory_uri(); ?>/images/BC4-S-CAPA.webp" alt="BC4 Sem Capa" class="absolute inset-0 m-auto max-h-full object-contain opacity-0 scale-110 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500 p-6" />
            </div>
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <h3 class="font-bold text-primary leading-snug text-[13px] min-h-[3.5rem] flex items-center">
              <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-bc4-linha-carbon' ) ); ?>" class="hover:text-brand-gold transition">Bomba de Vácuo BC4 – Linha CARBON | BRASPUMP</a>
            </h3>
            <p class="mt-2 font-extrabold text-primary text-sm">R$ 3.850,00 – R$ 4.250,00</p>
            <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-bc4-linha-carbon' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-2.5 font-bold text-primary hover:brightness-110 transition shadow-sm uppercase text-xs">
              VER DETALHES
            </a>
          </div>
        </article>

        <!-- Turbo Light -->
        <article class="group relative rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
          <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-light' ) ); ?>" class="block">
            <div class="bg-muted aspect-square flex items-center justify-center p-6">
              <img src="<?php echo get_template_directory_uri(); ?>/images/Turbo-Light-C-capa.webp" alt="Turbo Light" class="max-h-full object-contain group-hover:scale-105 transition" />
            </div>
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <h3 class="font-bold text-primary leading-snug text-[13px] min-h-[3.5rem] flex items-center">
              <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-light' ) ); ?>" class="hover:text-brand-gold transition">Bomba de Vácuo Turbo Light – Linha TURBO | BRASPUMP</a>
            </h3>
            <p class="mt-2 font-extrabold text-primary text-sm">R$ 5.300,00</p>
            <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-light' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-2.5 font-bold text-primary hover:brightness-110 transition shadow-sm uppercase text-xs">
              VER DETALHES
            </a>
          </div>
        </article>

        <!-- Turbo Light SC -->
        <article class="group relative rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
          <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-light-sc' ) ); ?>" class="block">
            <div class="bg-muted aspect-square flex items-center justify-center p-6">
              <img src="<?php echo get_template_directory_uri(); ?>/images/Turbo-Light-SC.webp" alt="Turbo Light SC" class="max-h-full object-contain group-hover:scale-105 transition" />
            </div>
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <h3 class="font-bold text-primary leading-snug text-[13px] min-h-[3.5rem] flex items-center">
              <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-light-sc' ) ); ?>" class="hover:text-brand-gold transition">Bomba de Vácuo Turbo Light SC – Linha TURBO | BRASPUMP</a>
            </h3>
            <p class="mt-2 font-extrabold text-primary text-sm">R$ 4.970,00</p>
            <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-light-sc' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-2.5 font-bold text-primary hover:brightness-110 transition shadow-sm uppercase text-xs">
              VER DETALHES
            </a>
          </div>
        </article>

        <!-- Turbo Max -->
        <article class="group relative rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
          <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-max' ) ); ?>" class="block">
            <div class="bg-muted aspect-square flex items-center justify-center p-6">
              <img src="<?php echo get_template_directory_uri(); ?>/images/Turbo-Max.webp" alt="Turbo Max" class="max-h-full object-contain group-hover:scale-105 transition" />
            </div>
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <h3 class="font-bold text-primary leading-snug text-[13px] min-h-[3.5rem] flex items-center">
              <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-max' ) ); ?>" class="hover:text-brand-gold transition">Bomba de Vácuo Turbo Max – Linha TURBO | BRASPUMP</a>
            </h3>
            <p class="mt-2 font-extrabold text-primary text-sm">R$ 5.590,00</p>
            <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-max' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-2.5 font-bold text-primary hover:brightness-110 transition shadow-sm uppercase text-xs">
              VER DETALHES
            </a>
          </div>
        </article>

        <!-- Turbo VAC -->
        <article class="group relative rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
          <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-vac' ) ); ?>" class="block">
            <div class="bg-muted aspect-square flex items-center justify-center p-6">
              <img src="<?php echo get_template_directory_uri(); ?>/images/Turbo-VAC.webp" alt="Turbo VAC" class="max-h-full object-contain group-hover:scale-105 transition" />
            </div>
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <h3 class="font-bold text-primary leading-snug text-[13px] min-h-[3.5rem] flex items-center">
              <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-vac' ) ); ?>" class="hover:text-brand-gold transition">Bomba de Vácuo Turbo VAC – Linha TURBO | BRASPUMP</a>
            </h3>
            <p class="mt-2 font-extrabold text-primary text-sm">R$ 5.240,00</p>
            <a href="<?php echo esc_url( home_url( '/produto/bomba-de-vacuo-turbo-vac' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-2.5 font-bold text-primary hover:brightness-110 transition shadow-sm uppercase text-xs">
              VER DETALHES
            </a>
          </div>
        </article>

        <!-- Unidade Suctora -->
        <article class="group relative rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
          <a href="<?php echo esc_url( home_url( '/produto/unidade-suctora' ) ); ?>" class="block">
            <div class="bg-muted aspect-square flex items-center justify-center p-6">
              <img src="<?php echo get_template_directory_uri(); ?>/images/unidade-suctora-mdelo-gp.webp" alt="Unidade Suctora" class="max-h-full object-contain group-hover:scale-105 transition" />
            </div>
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <h3 class="font-bold text-primary leading-snug text-[13px] min-h-[3.5rem] flex items-center">
              <a href="<?php echo esc_url( home_url( '/produto/unidade-suctora' ) ); ?>" class="hover:text-brand-gold transition">Unidade Suctora | BRASPUMP</a>
            </h3>
            <p class="mt-2 font-extrabold text-primary text-sm">R$ 820,00 – R$ 1.000,00</p>
            <a href="<?php echo esc_url( home_url( '/produto/unidade-suctora' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-2.5 font-bold text-primary hover:brightness-110 transition shadow-sm uppercase text-xs">
              VER DETALHES
            </a>
          </div>
        </article>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
