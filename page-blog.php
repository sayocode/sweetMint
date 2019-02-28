<?php get_header(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7 blog-list">
<?php if(have_posts()): while(have_posts()):the_post(); ?>

<section class="content container">
	<?php breadcrumb(); ?>
	<div class="col s12">
		<h1 class="page-title-link">
			<a href="<?php the_permalink(); ?>">
				<i class="fas fa-book"></i> <span class="animated effect one-type">
					<?php the_title(); ?>
				</span>
			</a>
		</h1>
	</div>

	<div class="article-body col s12">
		<?php remove_filter('the_content', 'wpautop'); ?>
		<?php the_content(); ?>
		<div
			class="list-wrap archive-list input-field marcellus-sc col s12 m6">
			<select data-year="<?php echo get_query_var('year') ?>"
				data-month="<?php $mnum = get_query_var('monthnum'); if($mnum < 10){ $mnum = '0' . $mnum; } echo $mnum; ?>">
				<option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
				<?php wp_get_archives( 'type=monthly&format=option' ); ?>
			</select><label>アーカイブ</label>
		</div>
		<div
			class="list-wrap category-list input-field marcellus-sc col s12 m6">
			<?php $args = array(
				'show_option_all'	=> '',
				'show_option_none'   => '',
				'option_none_value'  => '-1',
				'orderby'			=> 'ID', 
				'order'			  => 'ASC',
				'show_count'		 => 0,
				'hide_empty'		 => 1, 
				'child_of'		   => 0,
				'exclude'			=> '',
				'echo'			   => 1,
				'selected'		   => 0,
				'hierarchical'	   => 0, 
				'name'			   => 'cat',
				'id'				 => '',
				'class'			  => 'postform',
				'depth'			  => 0,
				'tab_index'		  => 0,
				'taxonomy'		   => 'category',
				'hide_if_empty'	  => false,
				'value_field'		=> 'slug',  
			); 
			wp_dropdown_categories( $args ); ?>
			<label>カテゴリー</label>
		</div>
		<div class="listings clearfix">
			<?php
$paged = (int) get_query_var('paged');
$args = array( 
		'posts_per_page' => 6, 
		'post_type' => $type, 
		'order' => 'DESC', 
		'orderby' =>'second', 
		'paged' => $paged );
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
?>
			<article class="single-list col xl4 articles l6 s12">
				<div class="col s12 white hoverable z-depth-1">
					<a class="blog-link" href="<?php the_permalink(); ?>">&nbsp;</a>
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="img-back white marcellus-sc">
						<img
							src="<?php echo wp_get_attachment_image_src ( get_post_thumbnail_id (), true)[0]; ?>"
							data-alias="img01">
					</div>
					<?php elseif(get_post_type() == 'info') : ?>
					<div class="img-back white marcellus-sc">
						<img
							src="<?php echo get_template_directory_uri(); ?>/images/hand-heart.jpg; ?>">
					</div>
					<?php else : ?>
					<div class="img-back no-img marcellus-sc">
						<span>No Image</span>
					</div>
					<?php endif; ?>

					<div class="article-contents">
						<div class="date-wrap left">
							<time datetime="<?php the_time('Y-m-d'); ?>">
								<span class="day-of-the-week"> <?php echo get_post_time('M');?>
								</span> <span> <?php echo the_time('d');?>
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

	<?php wp_reset_postdata(); ?>
</section>
<?php
$paged = (int) get_query_var('paged');
$args = array( 'posts_per_page' => 6);
if ( $the_query->have_posts() ) : ?>
<section class="page-nation container">
	<div class="col s12 center-align">
		<?php
if ($the_query->max_num_pages > 1) {
	echo paginate_links(array(
		'base' => get_pagenum_link(1) . '%_%',
		'format' => 'page/%#%/',
		'current' => max(1, $paged),
		'total' => $the_query->max_num_pages,
		'prev_next' => false
	));
}
?>
	</div>

	<div class="col s6 center-align pn-prev">
		<span class="deep-purple lighten-5 z-depth-1"> <?php echo get_previous_posts_link( __( 'prev' ), $the_query->max_num_pages ) ; ?>
		</span>
	</div>
	<div class="col s6 center-align pn-next">
		<span class="deep-purple lighten-5 z-depth-1"> <?php echo get_next_posts_link( __( 'next' ), $the_query->max_num_pages ) ; ?></span>
	</div>
</section>
<?php endif; ?>

<?php endwhile; endif; ?>

</main>
<!-- /main -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>