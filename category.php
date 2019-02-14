<?php get_header(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7">
<section class="content container">
		<?php breadcrumb(); ?>
		<div class="col s12">
			<h1 class="page-title-link" id="mainTitle">
				<a href="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" rel="category tag"> <?php single_cat_title(); ?></a>
			</h1>
		</div>
		<div class="article-body col s12">
		<div
			class="category-list input-field marcellus-sc col s12">
			<?php $args = array(
				'show_option_all'   => '',
				'show_option_none'   => '',
				'option_none_value'  => '-1',
				'orderby'		   => 'ID', 
				'order'		   => 'ASC',
				'show_count'		 => 0,
				'hide_empty'		 => 1, 
				'child_of'		 => 0,
				'exclude'		   => '',
				'echo'			 => 1,
				'selected'		 => 0,
				'hierarchical'	 => 0, 
				'name'			 => 'cat',
				'id'				 => '',
				'class'		   => 'postform',
				'depth'		   => 0,
				'tab_index'	   => 0,
				'taxonomy'		 => 'category',
				'hide_if_empty'   => false,
				'value_field'	   => 'slug',  
			); 
			wp_dropdown_categories( $args ); ?>
			<label>カテゴリー</label>
		</div>
		<div class="listings clearfix">
			<?php if(have_posts()): while(have_posts()):the_post(); ?>

			<article class="single-list col xl4 articles l6 s12">
				<div class="col s12 white hoverable z-depth-1">
					<a class="blog-link" href="<?php the_permalink(); ?>">&nbsp;</a>
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="img-back white marcellus-sc">
						<img
							src="<?php echo wp_get_attachment_image_src ( get_post_thumbnail_id (), true)[0]; ?>"
							data-alias="img01">
					</div>
					<?php else : ?>
					<div class="img-back no-img marcellus-sc">
						<span>No Image</span>
					</div>
					<?php endif; ?>

					<div class="article-contents">
						<div class="date-wrap left">
							<time datetime="<?php the_time('Y-m-d'); ?>">
								<span class="day-of-the-week">
									<?php echo get_post_time('M');?>
								</span> <span>
									<?php echo the_time('d');?>
								</span>
							</time>
						</div>
						<h2>
							<?php the_title(); ?>
						</h2>

						<div class="contents-body">
							<p>
								<?php remove_filter('the_excerpt', 'wpautop'); ?>
								<?php the_excerpt(); ?>
							</p>
						</div>
					</div>
				</div>
			</article>

			<?php endwhile; endif; ?>
		</div>
	</div>
</section>
<section class="page-nation container">
<div class="col s12 center-align">
	<?php
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_next' => false
	) );
	?>
</div>
	<div class="col s6 center-align pn-prev">
		<span class="deep-purple lighten-5 z-depth-1"> <?php previous_posts_link('next'); ?>
		</span>
	</div>
	<div class="col s6 center-align pn-next">
		<span class="deep-purple lighten-5 z-depth-1"> <?php next_posts_link('prev') ?>
		</span>
	</div>
</section>

</main>
<!-- /main -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>