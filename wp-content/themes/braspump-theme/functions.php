<?php
/**
 * Braspump Theme Functions
 */

if ( ! function_exists( 'braspump_setup' ) ) :
    function braspump_setup() {
        // Add support for block styles
        add_theme_support( 'wp-block-styles' );
        // Add support for full and wide align images
        add_theme_support( 'align-wide' );
        // Add support for responsive embeds
        add_theme_support( 'responsive-embeds' );
        // Add support for editor styles
        add_theme_support( 'editor-styles' );
        // Add support for title tag
        add_theme_support( 'title-tag' );
        // Add support for post thumbnails
        add_theme_support( 'post-thumbnails' );
        
        // WooCommerce Support
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        // Register Menus
        register_nav_menus( array(
            'main-menu' => __( 'Main Menu', 'braspump' ),
            'footer-menu' => __( 'Footer Menu', 'braspump' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'braspump_setup' );

/**
 * Enqueue scripts and styles.
 */
function braspump_scripts() {
    wp_enqueue_style( 'braspump-style', get_stylesheet_uri(), array(), '1.0.2' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800;900&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'braspump_scripts' );

/**
 * WooCommerce Customizations
 */
if ( class_exists( 'WooCommerce' ) ) {
    // Remove WooCommerce default wrappers
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    add_action('woocommerce_before_main_content', 'braspump_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'braspump_wrapper_end', 10);

    function braspump_wrapper_start() {
        echo '<main class="flex-1 bg-background py-16"><div class="container mx-auto px-6">';
    }

    function braspump_wrapper_end() {
        echo '</div></main>';
    }
}

/**
 * Simple Menu Walker to maintain classes (Placeholder)
 */
class Braspump_Menu_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        
        $output .= '<a href="' . $item->url . '" class="text-[13px] font-black tracking-wider text-white hover:text-brand-gold transition">';
        $output .= $item->title;
        $output .= '</a>';
    }
}
