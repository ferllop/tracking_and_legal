<?php

function download_csv() {
    if ( isset($_POST['download-user-data']) && $_POST['download-user-data'] == 'yes' && wp_verify_nonce($_POST['_wpnonce'], 'download-user_' . get_current_user_id()) ) {
        function outputCsv( $fileName, $assocDataArray ) {
            ob_clean();
            header( 'Pragma: public' );
            header( 'Expires: 0' );
            header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
            header( 'Cache-Control: private', false );
            header( 'Content-Type: text/csv' );
            header( 'Content-Disposition: attachment;filename=' . $fileName );
            if ( isset( $assocDataArray['0'] ) ) {
                $fp = fopen( 'php://output', 'w' );
                fputcsv( $fp, array_keys( $assocDataArray['0'] ) );
                foreach ( $assocDataArray AS $values ) {
                    fputcsv( $fp, $values );
                }
                fclose( $fp );
            }
            ob_flush();
        }
    
        $data = array(
            array( 'Alias' => $_POST['nickname'], 'Nombre de usuario' => $_POST['username'], 'Email' => $_POST['email'] )
        );
    
        outputCsv( 'user-data-' . time() . '.csv', $data );
    
        exit;
    }
}
add_action('init', 'download_csv');


?>
