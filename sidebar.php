<?php
/*
パーツ：サイドバー
*/
?>

<div id="sidebar" class="sidebar-area col s12">
	<?php if( is_active_sidebar('side-widget') ) : ?>
	<div class="sidebar-wrap">
		<?php dynamic_sidebar('side-widget'); ?>
	</div>

	<?php else : ?>
	<?php endif; ?>
</div>