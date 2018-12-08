<?php 

$userid = get_current_user_id();

if ( isset($_POST['delete_user_submit']) && $_POST['delete_user_checktext'] === 'BORRAR' && wp_verify_nonce($_POST['_wpnonce'], 'delete-user_' . $userid) ) {
    require_once(ABSPATH.'wp-admin/includes/user.php');
    $user_posts = get_posts( array(
	    'numberposts' => -1, 
	    'post_type' => 'actividad',
	    'author' => $userid,
	    'post_status'=>'publish') );
    foreach ($user_posts as $user_post){
        wp_update_post ( array(
            'ID' => $user_post->ID, 
            'post_status'   =>  'draft') );
    }
    $reassign = 12;
    wp_delete_user( $userid, $reassign );
        
    // if ( isset($_POST['tracking_consent']) && $_POST['tracking_consent'] == 'true' ){
    //     update_user_meta( $current_user->ID, 'gdpr_tracking_consent', 'true' );
    // } else {
    //     update_user_meta( $current_user->ID, 'gdpr_tracking_consent', 'false' );
    // }
    
    $user = get_userdata( $userid );
    if ( $user === false ) : ?> 
        <p>Tu usuario ha sido borrado completamente.</p> 
        <?php  
        wp_logout();
        exit;
    else: ?>
        <p>Ha habido algún problema y tu usuario no se ha borrado. <br />Por favor <a href="/contacto/">contacta</a> con nosotros.</p> 
    <?php endif;
}
?>

<form name="delete-form" method="post" action="">
    <?php wp_nonce_field( 'delete-user_' . $userid ); ?>
    <p class="delete-user">
        <br />
        <input type="text" id="delete-user" name="delete_user_checktext" value="" maxlength="6" style="width:6em"/>
        <label for="delete-user" class="checkbox">Escribe BORRAR y pulsa en "Borrar definitivamente".</label>
        <input type="submit" name="delete_user_submit" value="Borrar definitivamente" />
    </p>
</form>