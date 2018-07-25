<?php
/*
パーツ：コメント
*/
if ( post_password_required() ) {
	return;
}
?>

<div class="comment-wrap col s12">

	<h3 class="animated effect commentarea-title">comment</h3>
	<?php if ( have_comments() ) : ?>

		<ol class="animated effect comment-list">
			<?php
				wp_list_comments( array(
					'style' => 'ol',
				) );
			?>
		</ol>

	<div class="animated effect comment-page-link">
	<?php paginate_comments_links(); ?>
	</div>
	<?php endif; ?>
	<div class="animated effect ">
		<?php comment_form(); ?>
	</div>

</div>
