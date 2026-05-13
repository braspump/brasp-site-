<?php 
/**
 * Template Name: Contato
 */
get_header(); ?>

<main class="flex-1 relative">
    <section class="bg-primary text-primary-foreground py-24 text-center">
      <div class="container mx-auto px-4">
        <div class="page-banner">
          <span class="text-xs tracking-[0.3em] font-black opacity-70">FALE CONOSCO</span>
          <h1 class="text-4xl md:text-6xl font-black mt-2">CONTATO</h1>
        </div>
        <p class="text-primary-foreground/80 mt-8 text-lg font-medium max-w-2xl mx-auto">
          Estamos prontos para te atender e tirar suas dúvidas!
        </p>
      </div>
    </section>

    <section class="container mx-auto px-4 py-16 grid gap-6 md:grid-cols-2">
      <div class="space-y-4">
        <a href="tel:551938074969" class="flex items-center gap-4 rounded-2xl bg-card p-5 border border-border hover:shadow-lg transition">
          <div class="rounded-full bg-brand-gold/15 p-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-brand-gold"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <div class="text-xs text-muted-foreground">Telefone</div>
            <div class="font-bold text-primary text-lg">(19) 3807-4969</div>
          </div>
        </a>
        <a href="https://wa.me/5519999072978" class="flex items-center gap-4 rounded-2xl bg-card p-5 border border-border hover:shadow-lg transition">
          <div class="rounded-full bg-brand-gold/15 p-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-brand-gold"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
          </div>
          <div>
            <div class="text-xs text-muted-foreground">WhatsApp</div>
            <div class="font-bold text-primary text-lg">(19) 999072978</div>
          </div>
        </a>
        <a href="mailto:vendas@braspump.com.br" class="flex items-center gap-4 rounded-2xl bg-card p-5 border border-border hover:shadow-lg transition">
          <div class="rounded-full bg-brand-gold/15 p-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-brand-gold"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          </div>
          <div>
            <div class="text-xs text-muted-foreground">E-mail</div>
            <div class="font-bold text-primary text-lg">vendas@braspump.com.br</div>
          </div>
        </a>
        <div class="flex items-center gap-4 rounded-2xl bg-card p-5 border border-border">
          <div class="rounded-full bg-brand-gold/15 p-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-brand-gold"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <div class="text-xs text-muted-foreground">Sede</div>
            <div class="font-bold text-primary text-lg">Amparo — SP, Brasil</div>
          </div>
        </div>
      </div>

      <div class="rounded-2xl bg-card p-6 border border-border shadow-sm">
        <?php echo do_shortcode('[contact-form-7 id="94" title="Contact form 1"]'); ?>
      </div>
    </section>
</main>

<?php get_footer(); ?>
