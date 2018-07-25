<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7">
<?php if ( has_post_thumbnail() ) : ?>
<article itemscope itemtype="http://schema.org/Article">
<div id="postThumbnail" class="parallax-container">
	<div class="parallax" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
		<?php the_post_thumbnail(); ?>
		<?php $thumbnail_id = get_post_thumbnail_id(); 
		$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'full' );
		echo '<meta itemprop="url" content="'.$eye_img[0].'"><meta itemprop="width" content="'.$eye_img[1].'"><meta itemprop="height" content="'.$eye_img[2].'">';?>
	</div>
</div>
<?php endif; ?>

<section class="content container">
	<?php breadcrumb(); ?>
	<div class="col s12">
		<h1 class="page-title-link">
			<a href="<?php the_permalink(); ?>">
				<i class="fas fa-heart"></i>
				<span class="animated effect one-type" itemprop="name headline"><?php the_title(); ?></span>
			</a>
		</h1>
		<div class="single-info animated effect post-info col s12">
			<div class="col s12 date-wrap left">
				<?php if ( get_post_type( $post ) == 'post') : ?>
				<a
					href="<?php echo esc_url( home_url( '/' ) ); ?>blog/<?php the_time('Y/m/d'); ?>"
					rel="date">
					<time datetime="<?php the_time('Y-m-d'); ?>">
						<span class="day-of-the-week"><?php echo get_post_time('M');?></span>
						<span><?php echo the_time('d');?></span></time>
				</a>
				<?php else : ?>
				<time datetime="<?php the_time('Y-m-d'); ?>">
						<span class="day-of-the-week"><?php echo get_post_time('M');?></span>
						<span><?php echo the_time('d');?></span></time>
				<?php endif; ?>
				&ensp;
				<?php the_category(', '); ?>
			</div>
		</div>
		<div class="col s12 animated effect sns-share-links">
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
				class="twitter-share-button" data-show-count="false">Tweet</a>
			<div class="fb-share-button" data-href="<?php the_permalink(); ?>"
				data-layout="button_count" data-size="small"
				data-mobile-iframe="true">
				<a target="_blank"
					href="https://www.facebook.com/sharer/sharer.php?u=urlReplacement&amp;src=sdkpreparse"
					class="fb-xfbml-parse-ignore">share</a>
			</div>
			<div class="line-it-button" data-lang="ja" data-type="like"
				data-url="<?php the_permalink(); ?>" data-share="true"
				style="display: none;"></div>
		</div>
	</div>

	<div class="article-body col m12">
		<?php remove_filter ('the_content', 'wpautop'); ?>
		<?php the_content(); ?>
		<div class="col s12 animated effect sns-share-links">
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
				class="twitter-share-button" data-show-count="false">Tweet</a>
			<div class="fb-share-button" data-href="<?php the_permalink(); ?>"
				data-layout="button_count" data-size="small"
				data-mobile-iframe="true">
				<a target="_blank"
					href="https://www.facebook.com/sharer/sharer.php?u=urlReplacement&amp;src=sdkpreparse"
					class="fb-xfbml-parse-ignore">share</a>
			</div>
			<div class="line-it-button" data-lang="ja" data-type="like"
				data-url="<?php the_permalink(); ?>" data-share="true"
				style="display: none;"></div>
		</div>
	</div>
	<div class="tag-wrap animated effect col m12">
		<?php the_tags('<div class="chip marcellus-sc">', '</div><div class="chip">', '</div>'); ?>
	</div>
	<?php
		if( is_singular('post') ) {
			comments_template();
		} ?>
		<div class="blog-data">
			<div itemprop="author"><?php the_author() ?></div>
			<div class="published" itemprop="datePublished"><?php the_time('Y-m-d'); ?></div>
			<div itemprop='publisher' itemscope='itemscope' itemtype='https://schema.org/Organization'>
				<div itemprop="name"><?php bloginfo( 'name' ); ?></div>
				<div itemprop="image logo" itemscope='itemscope' itemtype='https://schema.org/ImageObject'>
				<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/sayologo.png"></div>
				<meta itemprop="width" content="28">
				<meta itemprop="height" content="41">
			</div>
		</div>
</section>

	</article>

<section class="page-nation container">
	<div class="col s6 center-align pn-prev">
		<span class="deep-purple lighten-5 z-depth-1"> <?php previous_post_link('%link','prev'); ?>
		</span>
	</div>
	<div class="col s6 center-align pn-next">
		<span class="deep-purple lighten-5 z-depth-1"> <?php next_post_link('%link','next'); ?>
		</span>
	</div>
</section>

<?php endwhile; endif; ?>

</main>
<!-- /main -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
