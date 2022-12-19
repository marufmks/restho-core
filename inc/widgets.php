<?php 

function egns_core_widgets_init() {
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'corelaw' ),
        'id'            => 'footer_1',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'corelaw' ),
        'id'            => 'footer_2',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'corelaw' ),
        'id'            => 'footer_3',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'corelaw' ),
        'id'            => 'footer_4',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h3>',
        'after_title'   => '</h3></div>',
    ) );
    
}

add_action( 'widgets_init', 'egns_core_widgets_init' );