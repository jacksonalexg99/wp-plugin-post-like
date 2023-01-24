<?php
function get_count_like( $post_id ) {
	if ( metadata_exists( "post", $post_id, 'post_like' ) ) {
		echo count( get_post_meta( $post_id, 'post_like', false ) );
	} else {
		echo "0";
	}
}
