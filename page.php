<?php get_header(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7">
<?php if(have_posts()): while(have_posts()):the_post(); ?>
<article itemscope itemtype="http://schema.org/Article">
<section class="content container">
			<?php breadcrumb(); ?>
		<div class="col s12">
			<h1 class="page-title-link">
				<a href="<?php the_permalink(); ?>">
					<i class="fas fa-star"></i>
					<span class="animated effect one-type" itemprop="name headline"><?php the_title(); ?></span>
				</a>
			</h1>
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
		<div class="blog-data">
			<div itemprop='publisher' itemscope='itemscope' itemtype='https://schema.org/Organization'>
				<div itemprop="name"><?php bloginfo( 'name' ); ?></div>
				<div itemprop="image logo" itemscope='itemscope' itemtype='https://schema.org/ImageObject'>
				<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/sayologo.png">
				<meta itemprop="width" content="28">
				<meta itemprop="height" content="41"></div>
			</div>
		</div>
</section>
</article>

<?php endwhile; endif; ?>

</main>
<!-- /main -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>