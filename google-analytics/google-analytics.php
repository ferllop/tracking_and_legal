<?php 
function google_analytics_script() {
    if ( !is_user_logged_in() ) {
        wp_enqueue_script( 'google_analytics_js',  plugins_url( '/google-analytics-script.js', __FILE__ )); 
    }
}
add_action('wp_enqueue_scripts', 'google_analytics_script');  