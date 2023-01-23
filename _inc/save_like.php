<?php

add_action( 'wp_ajax_add_like', 'save_like' );
function save_like() {
	$post_id        = intval( $_POST['post_id'] );
	$user_id        = intval( $_POST['user_id'] );
	$meta_like_post = "_ko_like_post_" . $user_id;
	if ( ! metadata_exists( 'post', $post_id, $meta_like_post ) ) {
		update_post_meta( $post_id, $meta_like_post, 1 );
		$meta_all_like_post = "_ko_all_like_post";
		$get_all_like_post  = get_post_meta( $post_id, $meta_all_like_post, 'true' );
		if ( ! metadata_exists( 'post', $post_id, $meta_all_like_post ) ) {
			update_post_meta( $post_id, $meta_all_like_post, 1 );
			wp_send_json( [
				"success" => "true",
				"count"   => 1,
			], 200 );
		} else {
			$get_all_like_post ++;
			update_post_meta( $post_id, $meta_all_like_post, $get_all_like_post );
			$count_like = get_post_meta( $post_id, $meta_all_like_post, true );
			wp_send_json( [
				"success" => "true",
				"count"   => $count_like,
			], 200 );
		}
	} else {
		$get_meta_like_post = get_post_meta( $post_id, $meta_like_post, true );
		delete_post_meta( $post_id, $meta_like_post );
		$meta_all_like_post = "_ko_all_like_post";
		$get_all_like_post  = get_post_meta( $post_id, $meta_all_like_post, 'true' );
		if ( ! metadata_exists( 'post', $post_id, $meta_all_like_post ) ) {
			update_post_meta( $post_id, $meta_all_like_post, 1 );
			wp_send_json( [
				"success" => "true",
				"count"   => 1,
			], 200 );
		} else {
			$get_all_like_post --;
			update_post_meta( $post_id, $meta_all_like_post, $get_all_like_post );
			$count_like = get_post_meta( $post_id, $meta_all_like_post, true );
			if($count_like==0){
				delete_post_meta($post_id,$meta_all_like_post);
			}
			wp_send_json( [
				"success" => "true",
				"count"   => $count_like,
			], 200 );
		}
		return $get_meta_like_post;
	}
}
