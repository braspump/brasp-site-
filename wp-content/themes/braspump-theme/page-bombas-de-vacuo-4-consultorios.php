<?php 
/**
 * Template Name: Bombas 4 Consultórios
 */
get_header(); ?>

<main class="flex-1">
    <!-- Page Header -->
    <section class="bg-muted py-12 border-b border-border text-center">
      <div class="container mx-auto px-4">
        <h1 class="text-primary text-4xl md:text-5xl font-black mb-4">BOMBAS DE VÁCUO</h1>
        <div class="inline-block bg-brand-gold text-primary rounded-lg px-8 py-2 font-black text-xl uppercase shadow-sm">
          Para 4 consultórios
        </div>
      </div>
    </section>

    <!-- Product Details Section -->
    <section class="py-20 space-y-32">
      <!-- BC4 -->
      <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-2 items-center gap-12 lg:gap-24">
          <div class="relative group">
            <div class="bg-muted rounded-3xl p-8 aspect-square flex items-center justify-center overflow-hidden">
              <img src="<?php echo get_template_directory_uri(); ?>/images/BC4-C-CAPA.webp" alt="BC4 CARBON" class="max-h-full object-contain group-hover:scale-105 transition duration-500" />
            </div>
          </div>
          <div>
            <h2 class="text-3xl md:text-4xl font-black text-primary mb-6 uppercase tracking-tight">Central BC4 | Linha CARBON</h2>
            <ul class="space-y-2 mb-10 list-disc list-inside text-sm text-muted-foreground font-medium">
              <li>Para ser instalada à longa distância.</li>
              <li><strong class="text-primary uppercase">Super Silenciosa</strong>, devido à tecnologia do <strong class="text-primary uppercase">Novo Abafador de Ruídos Exclusivo Braspump</strong>.</li>
              <li>Construída em <strong class="text-primary uppercase">Polímero de Engenharia</strong>.</li>
              <li><strong class="text-primary font-bold">Filtro coletor de detritos</strong>, com sistema de lavagem automática e descarga dos resíduos diretamente para o esgoto.</li>
              <li>Potência do motor <strong class="text-primary font-bold">1,0 HP</strong>.</li>
              <li>Vácuo máximo <strong class="text-primary font-bold">550 mm/Hg</strong>.</li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/loja' ) ); ?>" class="inline-block bg-brand-gold text-primary font-black px-12 py-3 rounded-md shadow-md hover:brightness-110 transition uppercase tracking-wider text-sm">
              SAIBA MAIS
            </a>
          </div>
        </div>
      </div>

      <!-- Turbo Max -->
      <div class="bg-muted py-24">
        <div class="container mx-auto px-6">
          <div class="grid md:grid-cols-2 items-center gap-12 lg:gap-24">
            <div class="order-2 md:order-1">
              <h2 class="text-3xl md:text-4xl font-black text-primary mb-6 uppercase tracking-tight">Central Turbo Max | Linha TURBO</h2>
              <ul class="space-y-2 mb-10 list-disc list-inside text-sm text-muted-foreground font-medium">
                <li>Para ser instalada à longa distância, interna ou externa.</li>
                <li><strong class="text-primary uppercase">Super Silenciosa</strong>, devido à tecnologia do <strong class="text-primary uppercase">Novo Abafador de Ruídos Exclusivo Braspump</strong>.</li>
                <li>Construída em <strong class="text-primary uppercase">Bronze</strong> (flange, rotor e tampa).</li>
                <li>Conta com <strong class="text-primary uppercase">Capa Abafadora de Ruídos</strong>.</li>
                <li><strong class="text-primary font-bold">Filtro coletor de detritos</strong>, com sistema de lavagem automática e descarga dos resíduos diretamente para o esgoto.</li>
                <li>Potência do motor <strong class="text-primary font-bold">1,0 HP</strong>.</li>
                <li>Vácuo máximo <strong class="text-primary font-bold">550 mm/Hg</strong>.</li>
              </ul>
              <a href="<?php echo esc_url( home_url( '/loja' ) ); ?>" class="inline-block bg-brand-gold text-primary font-black px-12 py-3 rounded-md shadow-md hover:brightness-110 transition uppercase tracking-wider text-sm">
                SAIBA MAIS
              </a>
            </div>
            <div class="order-1 md:order-2 relative group">
              <div class="bg-white rounded-3xl p-8 aspect-square flex items-center justify-center overflow-hidden shadow-sm">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Turbo-Max.webp" alt="Turbo Max" class="max-h-full object-contain group-hover:scale-105 transition duration-500" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Turbo VAC -->
      <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-2 items-center gap-12 lg:gap-24">
          <div class="relative group">
            <div class="bg-muted rounded-3xl p-8 aspect-square flex items-center justify-center overflow-hidden">
              <img src="<?php echo get_template_directory_uri(); ?>/images/Turbo-VAC.webp" alt="Turbo VAC" class="max-h-full object-contain group-hover:scale-105 transition duration-500" />
            </div>
          </div>
          <div>
            <h2 class="text-3xl md:text-4xl font-black text-primary mb-6 uppercase tracking-tight">Central Turbo VAC | Linha TURBO</h2>
            <ul class="space-y-2 mb-10 list-disc list-inside text-sm text-muted-foreground font-medium">
              <li>Para ser instalada à longa distância (externa).</li>
              <li><strong class="text-primary uppercase">Super Silenciosa</strong>, devido à tecnologia do <strong class="text-primary uppercase">Novo Abafador de Ruídos Exclusivo Braspump</strong>.</li>
              <li>Construída em <strong class="text-primary uppercase">Bronze</strong> (flange, rotor e tampa).</li>
              <li><strong class="text-primary font-bold">Filtro coletor de detritos</strong>, com sistema de lavagem automática e descarga dos resíduos diretamente para o esgoto.</li>
              <li>Potência do motor <strong class="text-primary font-bold">1,0 HP</strong>.</li>
              <li>Vácuo máximo <strong class="text-primary font-bold">550 mm/Hg</strong>.</li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/loja' ) ); ?>" class="inline-block bg-brand-gold text-primary font-black px-12 py-3 rounded-md shadow-md hover:brightness-110 transition uppercase tracking-wider text-sm">
              SAIBA MAIS
            </a>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
