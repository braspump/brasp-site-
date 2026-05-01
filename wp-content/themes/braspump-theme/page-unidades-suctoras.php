<?php 
/**
 * Template Name: Unidades Suctoras
 */
get_header(); ?>

<main class="flex-1 relative">
    <section class="bg-primary text-primary-foreground py-24 text-center">
      <div class="container mx-auto px-4">
        <div class="page-banner">
          <span class="text-xs tracking-[0.3em] font-black opacity-70">PRODUTOS</span>
          <h1 class="text-4xl md:text-6xl font-black mt-2">UNIDADES SUCTORAS</h1>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-4 py-16 grid gap-6 md:grid-cols-3">
      <!-- P -->
      <div class="group rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
        <div class="bg-muted p-6 flex items-center justify-center">
          <img src="<?php echo get_template_directory_uri(); ?>/images/unidade-suctora-mdelo-p.webp" alt="UNIDADE SUCTORA P" class="h-56 object-contain group-hover:scale-105 transition" />
        </div>
        <div class="p-6 flex-1 flex flex-col">
          <h3 class="text-lg font-extrabold text-primary">UNIDADE SUCTORA P</h3>
          <p class="text-muted-foreground mt-2 text-sm flex-1">Um suctor para <strong class="text-primary">SALIVA</strong></p>
          <a href="https://wa.me/5519999072978" class="mt-5 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-3 font-bold text-brand-gold-foreground hover:brightness-110 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg> COMPRAR
          </a>
        </div>
      </div>

      <!-- PP -->
      <div class="group rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
        <div class="bg-muted p-6 flex items-center justify-center">
          <img src="<?php echo get_template_directory_uri(); ?>/images/unidade-suctora-mdelo-gp.webp" alt="UNIDADE SUCTORA PP" class="h-56 object-contain group-hover:scale-105 transition" />
        </div>
        <div class="p-6 flex-1 flex flex-col">
          <h3 class="text-lg font-extrabold text-primary">UNIDADE SUCTORA PP</h3>
          <p class="text-muted-foreground mt-2 text-sm flex-1">Dois suctores para <strong class="text-primary">SALIVA</strong></p>
          <a href="https://wa.me/5519999072978" class="mt-5 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-3 font-bold text-brand-gold-foreground hover:brightness-110 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg> COMPRAR
          </a>
        </div>
      </div>

      <!-- GP -->
      <div class="group rounded-2xl bg-card border border-border overflow-hidden shadow-sm hover:shadow-2xl transition flex flex-col">
        <div class="bg-muted p-6 flex items-center justify-center">
          <img src="<?php echo get_template_directory_uri(); ?>/images/unidade-suctora-mdelo-gp.webp" alt="UNIDADE SUCTORA GP" class="h-56 object-contain group-hover:scale-105 transition" />
        </div>
        <div class="p-6 flex-1 flex flex-col">
          <h3 class="text-lg font-extrabold text-primary">UNIDADE SUCTORA GP</h3>
          <p class="text-muted-foreground mt-2 text-sm flex-1">Um suctor para <strong class="text-primary">SALIVA</strong> e outro para <strong class="text-primary">SANGUE</strong></p>
          <a href="https://wa.me/5519999072978" class="mt-5 inline-flex items-center justify-center gap-2 rounded-full bg-brand-gold px-5 py-3 font-bold text-brand-gold-foreground hover:brightness-110 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg> COMPRAR
          </a>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
