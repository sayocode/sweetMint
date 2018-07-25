<!-- ショートコード[infowidget]を張り付けることでお知らせ一覧を任意の場所（ウィジェットなど）に出力できる -->

<?php $args = array(
		'numberposts' => 3, //表示する記事の数
		'post_type' => 'info' //投稿タイプ名
		// 条件を追加する場合はここに追記
	);
	$customPosts = get_posts($args);
	if($customPosts) :
	?>
<div class="blog-scroll">
	<?php foreach($customPosts as $post) : setup_postdata( $post );
	?>
	<article class="widget-info" itemscope itemtype="http://schema.org/Article">
		<h3 class="info-title"><a class='blog-title' href="<?php the_permalink(); ?>"><span itemprop="name headline"><?php the_title(); ?></span></a></h3>
		<div class="single-info right-align">
			<time datetime="<?php the_time('Y-m-d'); ?>"><i class="fas fa-calendar-alt"></i>&ensp;<?php the_time('Y/m/d'); ?></time>
		</div>
		<div class="single-body">
		<?php remove_filter('the_excerpt', 'wpautop'); ?>
		<?php the_excerpt(); ?>
		</div>
		<div class='right-align blog-more'>
			<a href='<?php the_permalink(); ?>'>more...</a>
		</div>
		<div class="blog-data">
			<div itemprop="author"><?php the_author() ?></div>
			<div class="published" itemprop="datePublished"><?php the_time('Y-m-d'); ?></div>
			<div itemprop='publisher' itemscope='itemscope' itemtype='https://schema.org/Organization'>
				<div itemprop="name"><?php bloginfo( 'name' ); ?></div>
				<div itemprop="image logo" itemscope='itemscope' itemtype='https://schema.org/ImageObject'>
					<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/sayologo.png">
					<meta itemprop="width" content="28">
					<meta itemprop="height" content="41"></div></div></div>
	</article>
	<?php endforeach; ?>
</div>
<p class="jump-info-page right-align">
	<a href="<?php echo home_url('/'); ?>/info/">お知らせ一覧</a>
</p>
<?php else : //記事が無い場合 ?>
<p>まだお知らせがありません。</p>
<?php endif;
	wp_reset_postdata(); //クエリのリセット ?>