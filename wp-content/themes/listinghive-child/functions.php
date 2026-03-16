<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'minireset','flexboxgrid','hivetheme-core-frontend','hivetheme-parent-frontend','hivetheme-parent-frontend' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

add_shortcode('listing_map', function() {
    global $post;
    
    $listing_id = $post->ID;
    $maps_url = get_post_meta($listing_id, 'hp_maps_url', true);
    
    if (!$maps_url) return '<!-- maps_url vide pour ID: ' . $listing_id . ' -->';
    
    return '<div class="map-section">
        <div class="map-header">
            <span class="map-icon">📍</span>
            <h2>' . get_the_title($listing_id) . '</h2>
            <div class="map-divider"></div>
            <p>Venez nous rendre visite</p>
        </div>
        <div class="map-wrapper">
            <iframe src="' . esc_url($maps_url) . '" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="width:100%;height:380px;border:0;display:block;"></iframe>
        </div>
        <div class="map-footer">
            <a class="map-btn map-btn-primary" href="https://maps.google.com/?q=' . urlencode(get_the_title($listing_id)) . '" target="_blank">Ouvrir dans Google Maps</a>
            <a class="map-btn map-btn-secondary" href="https://maps.google.com/maps/dir//' . urlencode(get_the_title($listing_id)) . '" target="_blank">Itinéraire</a>
        </div>
    </div>';
});
