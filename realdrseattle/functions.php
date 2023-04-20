<?php 
    register_nav_menus( array(
        'primary-menus'=>'Main Menu',
    ));

add_theme_support('post-thumbnails');
add_theme_support('custom-header');
add_theme_support( 'custom-background' );

add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

add_filter('wpcf7_form_elements', function($content) {
    //$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = str_replace('<p>', '', $content);
    $content = str_replace('</p>', '', $content);

    return $content;
});


function themename_custom_logo_setup() {
    $defaults = array(
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


function themes_widgets_init() {

    register_sidebar(
        array(
            'name'          => 'Top Menu Content',
            'id'            => 'top-content',
            'description'   => 'Add widgets here to appear in Top Menu Content.',
            'before_widget' => '<div id="%1$s" class="align-content-center justify-content-center top-menu">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
}
add_action( 'widgets_init', 'themes_widgets_init' );


function customSEOCode() {
    global $post;
    $imgUrl = get_template_directory_uri()."/img/logo.png";
    $getCurrentUrl = get_permalink( get_the_ID() );
    if ( is_singular() ) {
        $page_id     = get_queried_object_id();
        $des_post = strip_tags( $post->post_content );
        $des_post = strip_shortcodes( $post->post_content );
        $des_post = str_replace( array("\n", "\r", "\t"), ' ', $des_post );
        $des_post = mb_substr( $des_post, 0, 300, 'utf8' );
        $des_title = $post->post_title.' - '.get_bloginfo('title');

        $imgUrl1 = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' );
        if($imgUrl1 != "") {
            $imgUrl = $imgUrl1;
        }

        //$img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
        //echo '<pre>';print_r($img);die;


        echo '<title>'.$des_title.'</title><meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="'.$des_title.'" class="yoast-seo-meta-tag" />
        <meta property="og:description" content="' . $des_post . '" />
        <meta property="og:url" content="'.$getCurrentUrl.'" />
        <meta property="og:site_name" content="'.get_bloginfo('title').'" />
        <meta property="article:modified_time" content="'.date('Y-m-dTH:m:s').'" />
        <meta property="og:image" content="'.$imgUrl.'" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="'.$des_title.'" />
        <meta name="twitter:description" content="'.$des_post.'" />
        <meta name="twitter:image" content="'.$imgUrl.'" />'. "\n";
    }
    if ( is_home() ) {
        
        $des_post = get_bloginfo( "description" );
        $des_post = strip_shortcodes( $des_post );
        $des_post = strip_tags( $des_post );
        $des_post = str_replace( array("\n", "\r", "\t"), ' ', $des_post );
        $des_post = mb_substr( $des_post, 0, 300, 'utf8' );
        
        $des_title = get_bloginfo('title');

            echo '<title>'.$des_title.'</title><meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="'.$des_title.'" class="yoast-seo-meta-tag" />
        <meta property="og:description" content="' . $des_post . '" />
        <meta property="og:url" content="'.$getCurrentUrl.'" />
        <meta property="og:site_name" content="'.get_bloginfo('title').'" />
        <meta property="article:modified_time" content="'.date('Y-m-dTH:m:s').'" />
        <meta property="og:image" content="'.$imgUrl.'" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="'.$des_title.'" />
        <meta name="twitter:description" content="'.$des_post.'" />
        <meta name="twitter:image" content="'.$imgUrl.'" />'. "\n";
    }
}
add_action( 'wp_head', 'customSEOCode');
?>