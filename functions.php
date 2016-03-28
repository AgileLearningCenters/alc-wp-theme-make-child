<?php
/**
 * @package Make Child
 *
 * Add your custom functions here.
 */

wp_enqueue_script(
    'child-script',
    get_stylesheet_directory_uri() . '/js/child.js',
    $script_dependencies,
    TTFMAKE_VERSION,
    true
);

/* add header option for sticky nav */
function alc_add_layout_options($options){
    $options['header']['options']['header-sticky-nav'] = array(
        'setting' => array(
            'sanitize_callback' => 'absint',
        ),
        'control' => array(
            # 'label' => __( 'Remove padding beneath header', 'make' ),
            'label' => 'Use Sticky Nav',
            'description' => 'When you scroll down the navigation bar will shrink and follow',
            'type'  => 'checkbox',
        ),
    );
    return $options;
}

add_filter('make_customizer_contentlayout_sections','alc_add_layout_options');


function alc_after_theme_setup(){

    // Add specific CSS class by filter
    function alc_add_sticky_nav_class( $classes) {
        // add 'class-name' to the $classes array
        $is_sticky = get_theme_mod( 'header-sticky-nav', ttfmake_get_default( 'header-sticky-nav' ) );
        $classes[] = ($is_sticky) ? 'is-sticky' : 'not-sticky';
        // return the $classes array
        return $classes;
    }
    add_filter( 'body_class', 'alc_add_sticky_nav_class' );
}

add_action( 'after_setup_theme', 'alc_after_theme_setup', 11 );

function alc_custom_fonts($choices){
    $choices['bk-samuelsno5'] = array(
        'label' => __( 'Brooklyn Samuel Num 5', 'make' ),
        'stack' => '"bk samuelsno5","Helvetica Neue",Helvetica,Arial,sans-serif'
    );
    return $choices;
}

add_filter('make_get_standard_fonts', 'alc_custom_fonts');

function alc_default_settings($defaults) {
  $alc_defaults = array(
    // Custom ALC options
    'header-sticky-nav'                        => 1,

    // Site Title & Tagline
    'hide-site-title'                          => 0,
    'hide-tagline'                             => 1,
    'color-site-title'                         => '#171717',

    // General
    'general-layout'                           => 'full-width',
    'general-sticky-label'                     => __( 'Featured', 'make' ),

    // Logo
    'logo-regular'                             => 'http://agilelearningcenters.org/wp-content/uploads/2014/07/alc_circle_logo.png',
    'logo-retina'                              => 'http://agilelearningcenters.org/wp-content/uploads/2014/07/alc_circle_retina.png',
    'logo-favicon'                             => 'http://agilelearningcenters.org/wp-content/uploads/2014/07/alc_circle_favicon.png',
    'logo-apple-touch'                         => 'http://agilelearningcenters.org/wp-content/uploads/2014/07/alc_circle_appletouch.png',

    // Background
    'background_color'                         => '#b9bcbf',
    'background_image'                         => '',
    'background_repeat'                        => 'repeat',
    'background_position_x'                    => 'left',
    'background_attachment'                    => 'scroll',
    'background_size'                          => 'auto',

    // Colors
    'color-primary'                            => '#403391',
    'color-secondary'                          => '#eaecee',
    'color-text'                               => '#171717',
    'color-detail'                             => '#b9bcbf',

    // Layout - Blog
    'layout-blog-hide-header'                  => 0,
    'layout-blog-hide-footer'                  => 0,
    'layout-blog-sidebar-left'                 => 0,
    'layout-blog-sidebar-right'                => 1,
    'layout-blog-featured-images'              => 'post-header',
    'layout-blog-post-date'                    => 'absolute',
    'layout-blog-post-author'                  => 'avatar',
    'layout-blog-auto-excerpt'                 => 0,
    'layout-blog-show-categories'              => 1,
    'layout-blog-show-tags'                    => 1,
    'layout-blog-featured-images-alignment'    => 'center',
    'layout-blog-post-date-location'           => 'top',
    'layout-blog-post-author-location'         => 'post-footer',
    'layout-blog-comment-count'                => 'none',
    'layout-blog-comment-count-location'       => 'before-content',

    // Layout - Archive
    'layout-archive-hide-header'               => 0,
    'layout-archive-hide-footer'               => 0,
    'layout-archive-sidebar-left'              => 0,
    'layout-archive-sidebar-right'             => 1,
    'layout-archive-featured-images'           => 'post-header',
    'layout-archive-post-date'                 => 'absolute',
    'layout-archive-post-author'               => 'avatar',
    'layout-archive-auto-excerpt'              => 0,
    'layout-archive-show-categories'           => 1,
    'layout-archive-show-tags'                 => 1,
    'layout-archive-featured-images-alignment' => 'center',
    'layout-archive-post-date-location'        => 'top',
    'layout-archive-post-author-location'      => 'post-footer',
    'layout-archive-comment-count'             => 'none',
    'layout-archive-comment-count-location'    => 'before-content',

    // Layout - Search
    'layout-search-hide-header'                => 0,
    'layout-search-hide-footer'                => 0,
    'layout-search-sidebar-left'               => 0,
    'layout-search-sidebar-right'              => 1,
    'layout-search-featured-images'            => 'thumbnail',
    'layout-search-post-date'                  => 'absolute',
    'layout-search-post-author'                => 'name',
    'layout-search-auto-excerpt'               => 1,
    'layout-search-show-categories'            => 1,
    'layout-search-show-tags'                  => 1,
    'layout-search-featured-images-alignment'  => 'center',
    'layout-search-post-date-location'         => 'top',
    'layout-search-post-author-location'       => 'post-footer',
    'layout-search-comment-count'              => 'none',
    'layout-search-comment-count-location'     => 'before-content',

    // Layout - Posts
    'layout-post-hide-header'                  => 0,
    'layout-post-hide-footer'                  => 0,
    'layout-post-sidebar-left'                 => 0,
    'layout-post-sidebar-right'                => 0,
    'layout-post-featured-images'              => 'post-header',
    'layout-post-post-date'                    => 'absolute',
    'layout-post-post-author'                  => 'avatar',
    'layout-post-show-categories'              => 1,
    'layout-post-show-tags'                    => 1,
    'layout-post-featured-images-alignment'    => 'center',
    'layout-post-post-date-location'           => 'top',
    'layout-post-post-author-location'         => 'post-footer',
    'layout-post-comment-count'                => 'none',
    'layout-post-comment-count-location'       => 'before-content',

    // Layout - Pages
    'layout-page-hide-header'                  => 0,
    'layout-page-hide-footer'                  => 0,
    'layout-page-sidebar-left'                 => 0,
    'layout-page-sidebar-right'                => 0,
    'layout-page-hide-title'                   => 1,
    'layout-page-featured-images'              => 'none',
    'layout-page-post-date'                    => 'none',
    'layout-page-post-author'                  => 'none',
    'layout-page-featured-images-alignment'    => 'center',
    'layout-page-post-date-location'           => 'top',
    'layout-page-post-author-location'         => 'post-footer',
    'layout-page-comment-count'                => 'none',
    'layout-page-comment-count-location'       => 'before-content',

    // Header
    'header-text-color'                        => '#171717',
    'header-background-color'                  => '#f5ed08',
    'header-background-image'                  => '',
    'header-background-repeat'                 => 'no-repeat',
    'header-background-position'               => 'center',
    'header-background-size'                   => 'cover',
    'header-bar-background-color'              => '#403391',
    'header-bar-text-color'                    => '#ffffff',
    'header-bar-border-color'                  => '#ffffff',
    'header-text'                              => '',
    'header-show-social'                       => 0,
    'header-show-search'                       => 1,
    'header-bar-content-layout'                => 'default',
    'header-layout'                            => 2,
    'header-branding-position'                 => 'left',

    // Main
    'main-background-color'                    => '#ffffff',
    'main-background-image'                    => '',
    'main-background-repeat'                   => 'repeat',
    'main-background-position'                 => 'left',
    'main-background-size'                     => 'auto',
    'main-content-link-underline'              => 0,

    // Footer
    'footer-text-color'                        => '#464849',
    'footer-border-color'                      => '#b9bcbf',
    'footer-background-color'                  => '#eaecee',
    'footer-background-image'                  => 'http://agilelearningcenters.org/wp-content/uploads/2014/07/alc_smile_logo.png',
    'footer-background-repeat'                 => 'no-repeat',
    'footer-background-position'               => 'center',
    'footer-background-size'                   => 'contain',

    /**
     * Typography
     */
    // Global/Default
      'font-family-body'                         => 'bk-samuelsno5',
    'font-size-body'                           => 17,
    'font-weight-body'                         => 'normal',
    'font-style-body'                          => 'normal',
    'text-transform-body'                      => 'none',
    'line-height-body'                         => (float) 1.6,
    'letter-spacing-body'                      => (float) 0,
    'word-spacing-body'                        => (float) 0,
    'link-underline-body'                      => 'never',
    // Links
    'font-weight-body-link'                    => 'bold',
    // H1
    'font-family-h1'                           => 'sans-serif',
    'font-size-h1'                             => 46,
    'font-weight-h1'                           => 'normal',
    'font-style-h1'                            => 'normal',
    'text-transform-h1'                        => 'none',
    'line-height-h1'                           => (float) 1.2,
    'letter-spacing-h1'                        => (float) 0,
    'word-spacing-h1'                          => (float) 0,
    'link-underline-h1'                        => 'never',
    // H2
    'font-family-h2'                           => 'sans-serif',
    'font-size-h2'                             => 34,
    'font-weight-h2'                           => 'bold',
    'font-style-h2'                            => 'normal',
    'text-transform-h2'                        => 'none',
    'line-height-h2'                           => (float) 1.6,
    'letter-spacing-h2'                        => (float) 0,
    'word-spacing-h2'                          => (float) 0,
    'link-underline-h2'                        => 'never',
    // H3
    'font-family-h3'                           => 'sans-serif',
    'font-size-h3'                             => 24,
    'font-weight-h3'                           => 'bold',
    'font-style-h3'                            => 'normal',
    'text-transform-h3'                        => 'none',
    'line-height-h3'                           => (float) 1.6,
    'letter-spacing-h3'                        => (float) 0,
    'word-spacing-h3'                          => (float) 0,
    'link-underline-h3'                        => 'never',
    // H4
    'font-family-h4'                           => 'sans-serif',
    'font-size-h4'                             => 24,
    'font-weight-h4'                           => 'normal',
    'font-style-h4'                            => 'normal',
    'text-transform-h4'                        => 'none',
    'line-height-h4'                           => (float) 1.6,
    'letter-spacing-h4'                        => (float) 0,
    'word-spacing-h4'                          => (float) 0,
    'link-underline-h4'                        => 'never',
    // H5
    'font-family-h5'                           => 'sans-serif',
    'font-size-h5'                             => 16,
    'font-weight-h5'                           => 'bold',
    'font-style-h5'                            => 'normal',
    'text-transform-h5'                        => 'uppercase',
    'line-height-h5'                           => (float) 1.6,
    'letter-spacing-h5'                        => (float) 1,
    'word-spacing-h5'                          => (float) 0,
    'link-underline-h5'                        => 'never',
    // H6
    'font-family-h6'                           => 'sans-serif',
    'font-size-h6'                             => 14,
    'font-weight-h6'                           => 'normal',
    'font-style-h6'                            => 'normal',
    'text-transform-h6'                        => 'uppercase',
    'line-height-h6'                           => (float) 1.6,
    'letter-spacing-h6'                        => (float) 2,
    'word-spacing-h6'                          => (float) 0,
    'link-underline-h6'                        => 'never',
    // Site Title
    'font-family-site-title'                   => 'sans-serif',
    'font-size-site-title'                     => 34,
    'font-weight-site-title'                   => 'bold',
    'font-style-site-title'                    => 'normal',
    'text-transform-site-title'                => 'none',
    'line-height-site-title'                   => (float) 1.2,
    'letter-spacing-site-title'                => (float) 0,
    'word-spacing-site-title'                  => (float) 0,
    'link-underline-site-title'                => 'never',
    // Tagline
      'font-family-site-tagline'                 => 'bk-samuelsno5',
    'font-size-site-tagline'                   => 12,
    'font-weight-site-tagline'                 => 'normal',
    'font-style-site-tagline'                  => 'normal',
    'text-transform-site-tagline'              => 'uppercase',
    'line-height-site-tagline'                 => (float) 1.6,
    'letter-spacing-site-tagline'              => (float) 1,
    'word-spacing-site-tagline'                => (float) 0,
    'link-underline-site-tagline'              => 'never',
    // Menu Items
      'font-family-nav'                          => 'bk-samuelsno5',
    'font-size-nav'                            => 14,
    'font-weight-nav'                          => 'normal',
    'font-style-nav'                           => 'normal',
    'text-transform-nav'                       => 'none',
    'line-height-nav'                          => (float) 1.4,
    'letter-spacing-nav'                       => (float) 0,
    'word-spacing-nav'                         => (float) 0,
    'link-underline-nav'                       => 'never',
    // Sub-Menu Items
      'font-family-subnav'                       => 'bk-samuelsno5',
    'font-size-subnav'                         => 13,
    'font-weight-subnav'                       => 'normal',
    'font-style-subnav'                        => 'normal',
    'text-transform-subnav'                    => 'none',
    'line-height-subnav'                       => (float) 1.4,
    'letter-spacing-subnav'                    => (float) 0,
    'word-spacing-subnav'                      => (float) 0,
    'link-underline-subnav'                    => 'never',
    'font-subnav-mobile'                       => 1,
    // Current Item
    'font-weight-nav-current-item'             => 'bold',
    // Header Bar Text
      'font-family-header-bar-text'              => 'bk-samuelsno5',
    'font-size-header-bar-text'                => 13,
    'font-weight-header-bar-text'              => 'normal',
    'font-style-header-bar-text'               => 'normal',
    'text-transform-header-bar-text'           => 'none',
    'line-height-header-bar-text'              => (float) 1.6,
    'letter-spacing-header-bar-text'           => (float) 0,
    'word-spacing-header-bar-text'             => (float) 0,
    'link-underline-header-bar-text'           => 'never',
    // Header Bar Icons
    'font-size-header-bar-icon'                => 20,
    // Sidebar Widget Title
      'font-family-widget-title'                 => 'bk-samuelsno5',
    'font-size-widget-title'                   => 13,
    'font-weight-widget-title'                 => 'bold',
    'font-style-widget-title'                  => 'normal',
    'text-transform-widget-title'              => 'none',
    'line-height-widget-title'                 => (float) 1.6,
    'letter-spacing-widget-title'              => (float) 0,
    'word-spacing-widget-title'                => (float) 0,
    'link-underline-widget-title'              => 'never',
    // Sidebar Widget Body
      'font-family-widget'                       => 'bk-samuelsno5',
    'font-size-widget'                         => 13,
    'font-weight-widget'                       => 'normal',
    'font-style-widget'                        => 'normal',
    'text-transform-widget'                    => 'none',
    'line-height-widget'                       => (float) 1.6,
    'letter-spacing-widget'                    => (float) 0,
    'word-spacing-widget'                      => (float) 0,
    'link-underline-widget'                    => 'never',
    // Footer Text
      'font-family-footer-text'                  => 'bk-samuelsno5',
    'font-size-footer-text'                    => 13,
    'font-weight-footer-text'                  => 'normal',
    'font-style-footer-text'                   => 'normal',
    'text-transform-footer-text'               => 'none',
    'line-height-footer-text'                  => (float) 1.6,
    'letter-spacing-footer-text'               => (float) 0,
    'word-spacing-footer-text'                 => (float) 0,
    'link-underline-footer-text'               => 'never',
    // Footer Widget Title
      'font-family-footer-widget-title'          => 'bk-samuelsno5',
    'font-size-footer-widget-title'            => 13,
    'font-weight-footer-widget-title'          => 'bold',
    'font-style-footer-widget-title'           => 'normal',
    'text-transform-footer-widget-title'       => 'none',
    'line-height-footer-widget-title'          => (float) 1.6,
    'letter-spacing-footer-widget-title'       => (float) 0,
    'word-spacing-footer-widget-title'         => (float) 0,
    'link-underline-footer-widget-title'       => 'never',
    // Footer Widget Body
      'font-family-footer-widget'                => 'bk-samuelsno5',
    'font-size-footer-widget'                  => 13,
    'font-weight-footer-widget'                => 'normal',
    'font-style-footer-widget'                 => 'normal',
    'text-transform-footer-widget'             => 'none',
    'line-height-footer-widget'                => (float) 1.6,
    'letter-spacing-footer-widget'             => (float) 0,
    'word-spacing-footer-widget'               => (float) 0,
    'link-underline-footer-widget'             => 'never',
    // Footer Icons
    'font-size-footer-icon'                    => 20,
  );

  return array_merge($defaults, $alc_defaults);
}

add_filter( 'make_setting_defaults', 'alc_default_settings' );