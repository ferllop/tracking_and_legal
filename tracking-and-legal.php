<?php
/*
Plugin Name: Tracking and Legal
*/

//require_once( dirname( __FILE__ ) . '/cookie-consent/cookie-consent.php' );
//require_once( dirname( __FILE__ ) . '/google-analytics/google-analytics.php' );
require_once( dirname( __FILE__ ) . '/privacity/privacity.php' );
require_once( dirname( __FILE__ ) . '/download-user-data.php' );
function delete_user_include() {
    return include_once( dirname( __FILE__ ) . '/delete-user.php' );
}
add_shortcode( 'eliminar-cuenta', 'delete_user_include' );


?>