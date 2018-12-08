<?php

// function privacity_user_profile_update() {
//     global $user_id;
    
//     if ( isset($_POST['gdpr_data_consent_field']) && $_POST['gdpr_data_consent_field'] == 'true' ){
//         update_user_meta( $user_id, 'gdpr_user_register_consent', 'true' );
//     } else {
//         update_user_meta( $user_id, 'gdpr_user_register_consent', 'false' );
//     }
    
//     if ( isset($_POST['tracking_consent']) && $_POST['tracking_consent'] == 'true' ){
//         update_user_meta( $user_id, 'gdpr_tracking_consent', 'true' );
//     } else {
//         update_user_meta( $user_id, 'gdpr_tracking_consent', 'false' );
//     }
    
//     $data_consent = get_user_meta($user_id, 'gdpr_user_register_consent', true);
//     $tracking_consent = get_user_meta($user_id, 'gdpr_tracking_consent', true);
// }
// add_action( 'edit_user_profile_update', 'privacity_user_profile_update' );


function privacity_user_profile_fields() {
    global $user_id;
    $data_consent = get_user_meta($user_id, 'gdpr_user_register_consent', true);
    //$tracking_consent = get_user_meta($user_id, 'gdpr_tracking_consent', true);
    ?>
    
    <h2 id="privacity">Opciones de privacidad</h2>
    <p>
        <?php echo ($data_consent == 'true') ? 'El usuario marcó que leyó, entendió y aceptó el cómo se tratarán los datos que introdujo en el formulario de registro.
        <br/ >En su perfil se le recuerda que su nombre solo será usado para mostrarlo cuando haga algún comentario y que el email es usado como identificativo inequivoco de tu usuario en este sitio web.
        <br /> También se le recuerda que, por la naturaleza del uso de estos datos, si ya no quiere que se almacen estos datos, deberá darse de baja de esta web, borrando su usuario en la misma página de su perfil.' : 'El usuario no marcó conforme habia leido, entendido y aceptado el cómo se tratarán los datos que introdujo en el formulario de registro.' ?>
    </p>
    <!--<p>-->
    <!--    <?php echo ($tracking_consent == "true") ? 'El usuario consiente que su navegación sea trackeada de forma anónima.' : 'El usuario NO consiente que su navegación sea trackeada de forma anónima.' ?>-->
    <!--</p> -->
    
<?php 
}
add_action('edit_user_profile', 'privacity_user_profile_fields');

?>