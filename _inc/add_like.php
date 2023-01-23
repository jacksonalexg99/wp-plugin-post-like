<?php
function set_like( $post_id, $user_id ) {
	if ( is_user_logged_in() ):
		?>
		<style>
            #ko_like .heart {
                background: url("<?php echo KO_LIKE_URL ?>assets/img/heart.png") no-repeat;
            }
		</style>
		<form action="" id="ko_like" method="post">
			<input type="hidden" id="post_like_id" value="<?php echo $post_id ?>">
			<input type="hidden" id="user_like_id" value="<?php echo $user_id ?>">
			<div class="box_like">
				<img class="loading-like" src="<?php echo KO_LIKE_URL ?>assets/img/loading.svg" alt="loading" >
				<button class="border-0 bg-transparent ko_btn_like" type="submit" name="add_like">
					<?php
					$meta_like_post = "_ko_like_post_" . $user_id;
					if ( ! get_post_meta( $post_id, $meta_like_post, true ) ): ?>
						<div class="placement">
							<div class="heart"></div>
						</div>
					<?php else: ?>
						<div class="placement">
							<div class="heart is-active"></div>
						</div>
					<?php endif; ?>
				</button>
				<p><span
						class="count-like">
                         <?php
                         get_count_like($post_id);
                         ?>
                    </span> لایک
				</p>

			</div>
		</form>

	<?php
	endif;

}
