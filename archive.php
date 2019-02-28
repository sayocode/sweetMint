<?php get_header(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7">
<section class="content container">
		<?php breadcrumb(); ?>
		<div class="col s12">
			<h1 class="page-title-link" id="mainTitle">
				<a href="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
				<?php if($post->post_type == 'info') : ?>
					<i class="fas fa-info-circle"></i>
				<?php elseif(is_date()) :?>
					<i class="fas fa-calendar-alt"></i>
				<?php else :?>
					<i class="fas fa-archive"></i>
				<?php endif; ?>
				&nbsp;<span class="animated effect one-type fadeInUp"> <?php the_archive_title(); ?> </span></a>
			</h1>
		</div>
		<div class="article-body col s12">
<?php if(is_date()) : ?>
		<div
			class="list-wrap archive-list input-field marcellus-sc col s12">
			<select data-year="<?php echo get_query_var('year') ?>"
				data-month="<?php $mnum = get_query_var('monthnum'); if($mnum < 10){ $mnum = '0' . $mnum; } echo $mnum; ?>"
				>
				<option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
				<?php wp_get_archives( 'type=monthly&format=option' ); ?>
			</select><label>アーカイブ</label>
		</div>
		<?php endif; ?>
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
					<?php elseif(get_post_type() == 'info') : ?>
					<div class="img-back white marcellus-sc">
						<img src="<?php echo get_template_directory_uri(); ?>/images/hand-heart.jpg; ?>" >
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
<?php if(is_date()) : ?>
<div class="archive-calendar marcellus-sc col s12"><div class="z-depth-1">
<?php get_calendar(); ?>
</div></div>
<?php endif; ?>
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