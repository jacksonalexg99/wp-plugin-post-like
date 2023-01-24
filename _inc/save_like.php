<?php

add_action( 'wp_ajax_add_like', 'save_like' );
function save_like() {
	$post_id        = intval( $_POST['post_id'] );
	$user_id        = intval( $_POST['user_id'] );
	if ( metadata_exists( "post", $post_id, 'post_like' ) ) {
		$likes = get_post_meta( $post_id, 'post_like', false );
		if(array_search($user_id,$likes) === false){
			add_post_meta( $post_id, 'post_like', $user_id );
		}else{
			delete_post_meta($post_id,'post_like',$user_id);
		}
		wp_send_json( [
			"success" => "true",
			"count"   => count(get_post_meta( $post_id, 'post_like', false )),
		], 200 );
	}else{
		add_post_meta( $post_id, 'post_like', $user_id );
		wp_send_json( [
			"success" => "true",
			"count"   => 1,
		], 200 );
	}
}
