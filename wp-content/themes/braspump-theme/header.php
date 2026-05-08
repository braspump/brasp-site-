<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'flex min-h-screen flex-col bg-background text-foreground' ); ?>>
  <?php wp_body_open(); ?>
  
  <!-- Top Bar -->
  <div class="hidden lg:block bg-primary border-b border-white/10 py-2">
    <div class="container mx-auto flex justify-between items-center px-6">
      <div class="flex items-center gap-4 text-[13px] text-white/80 font-medium">
        <a href="https://wa.me/5519999072978" class="hover:text-brand-gold transition flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          (19) 999072978
        </a>
      </div>
      <div class="flex items-center gap-4">
        <a href="https://www.youtube.com/@braspump5372" class="text-white/80 hover:text-brand-gold transition" aria-label="Youtube"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/></svg></a>
        <a href="https://www.instagram.com/braspump/" class="text-white/80 hover:text-brand-gold transition" aria-label="Instagram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
        <a href="https://www.linkedin.com/company/braspump/" class="text-white/80 hover:text-brand-gold transition" aria-label="Linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg></a>
      </div>
    </div>
  </div>

  <header class="sticky top-0 inset-x-0 z-50 bg-primary shadow-lg border-b border-white/5">
    <div class="container mx-auto flex items-center justify-between gap-4 px-6 py-3">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="shrink-0 group">
        <div class="bg-white rounded-full px-4 py-1 shadow-inner group-hover:scale-105 transition">
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Braspump" class="h-12 w-auto" width="180" height="48" fetchpriority="high" />
        </div>
      </a>

      <?php
      wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'container'      => 'nav',
        'container_class'=> 'hidden lg:flex items-center gap-10',
        'menu_class'     => '',
        'fallback_cb'    => false,
        'items_wrap'     => '%3$s',
        'link_before'    => '',
        'link_after'     => '',
        'before'         => '',
        'after'          => '',
        'walker'         => new Braspump_Menu_Walker()
      ) );
      ?>

      <?php if ( class_exists( 'WooCommerce' ) ) : ?>
      <div class="flex items-center gap-3">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="relative flex items-center justify-center text-white hover:text-brand-gold transition-colors" aria-label="Carrinho">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span class="absolute top-[14px] text-[11px] font-black leading-none"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
        </a>
      </div>
      <?php endif; ?>
    </div>

    <!-- Mobile Nav -->
    <nav class="lg:hidden flex flex-wrap justify-center gap-x-6 gap-y-3 px-6 pb-6 border-t border-white/5 pt-4">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-[13px] font-black text-white hover:text-brand-gold transition uppercase tracking-wider">HOME</a>
      <a href="<?php echo esc_url( home_url( '/a-braspump' ) ); ?>" class="text-[13px] font-black text-white hover:text-brand-gold transition uppercase tracking-wider">A BRASPUMP</a>
      <a href="<?php echo esc_url( home_url( '/bombas-de-vacuo' ) ); ?>" class="text-[13px] font-black text-white hover:text-brand-gold transition uppercase tracking-wider">BOMBAS</a>
      <a href="<?php echo esc_url( home_url( '/unidades-suctoras' ) ); ?>" class="text-[13px] font-black text-white hover:text-brand-gold transition uppercase tracking-wider">SUCTORAS</a>
      <a href="<?php echo function_exists( 'wc_get_page_id' ) ? esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) : esc_url( home_url( '/shop' ) ); ?>" class="text-[13px] font-black text-white hover:text-brand-gold transition uppercase tracking-wider">LOJA</a>
      <a href="<?php echo esc_url( home_url( '/contato' ) ); ?>" class="text-[13px] font-black text-white hover:text-brand-gold transition uppercase tracking-wider">CONTATO</a>
    </nav>
  </header>
