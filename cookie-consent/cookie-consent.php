<?php

function cookie_consent_css() {
    if ( !is_user_logged_in() ) {
        wp_enqueue_style( 'cookie_consent_css',  plugins_url( '/cookie-consent.css', __FILE__ ));
    }
}
add_action('wp_enqueue_scripts', 'cookie_consent_css', 99);  


function cookie_consent_js() {
    if ( !is_user_logged_in() ) {
        wp_enqueue_script( 'cookie_consent_js',  plugins_url( '/cookie-consent.js', __FILE__ )); 
    }
}
add_action('wp_enqueue_scripts', 'cookie_consent_js');  


function cookies_include() {
    if ( !is_user_logged_in() ) {
        include_once( dirname( __FILE__ ) . '/cookie-consent-include.php' );
    }
}
add_action('twentysixteen_credits', 'cookies_include');
?>