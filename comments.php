<?php
/*
パーツ：コメント
*/
if ( post_password_required() ) {
	return;
}
?>

<div class="comment-wrap col s12">

	<h3 class="commentarea-title">comment</h3>
	<?php if ( have_comments() ) : ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style' => 'ol',
				) );
			?>
		</ol>

	<div class="comment-page-link">
	<?php paginate_comments_links(); ?>
	</div>
	<?php endif; ?>
	<div>
		<?php comment_form(); ?>
	</div>

</div>
