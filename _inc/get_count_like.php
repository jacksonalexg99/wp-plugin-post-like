
<?php
function get_count_like( $post_id ) {
	if ( metadata_exists( "post", $post_id, '_ko_all_like_post' ) ) {
		echo get_post_meta( $post_id, '_ko_all_like_post', true );
	} else {
		echo "0";
	}
}
