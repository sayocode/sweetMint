<?php get_header(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7">

<section class="content container">
			<?php breadcrumb(); ?>
		<div class="col s12">
			<h1 class="page-title-link">
				<a href="<?php the_permalink(); ?>">
					<i class="fas fa-tag"></i>
					<span class="animated effect one-type"><?php the_title(); ?></span>
				</a>
			</h1>
		</div>

	<div class="article-body col s12">
		<?php the_content(); ?>
		<?php 
		$args = array(
			'smallest'					=> 8,
			'largest'					=> 22,
			'unit'						=> 'pt', 
			'number'					=> 0,  
			'format'					=> 'flat',
			'separator'					=> "\n",
			'orderby'					=> 'name',
			'order'						=> 'RAND',
			'exclude'					=> null, 
			'include'					=> null, 
			'topic_count_text_callback'	=> $default_topic_count_text,
			'link'						=> 'view', 
			'taxonomy'					=> 'post_tag', 
			'echo'						=> true,
			'child_of'					=> null, // 注を参照
);
		wp_tag_cloud($args); ?>
	</div>

	<?php wp_reset_postdata(); ?>
</section>

</main>
<!-- /main -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>