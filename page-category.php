<?php get_header(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7">

<section class="content container">
			<?php breadcrumb(); ?>
		<div class="col s12">
			<h1 class="page-title-link">
				<a href="<?php the_permalink(); ?>">
					<i class="fas fa-folder"></i>
					<span class="animated effect one-type"><?php the_title(); ?></span>
				</a>
			</h1>
		</div>

	<div class="article-body col s12">
		<?php remove_filter ('the_content', 'wpautop'); ?>
		<?php the_content(); ?>
		<ul class="categories">
			<?php 
				$args = array(
				'show_option_all'	=> '',
				'orderby'			=> 'name',
				'order'			  => 'ASC',
				'style'			  => 'list',
				'show_count'		 => 1,
				'hide_empty'		 => 1,
				'use_desc_for_title' => 1,
				'child_of'		   => 0,
				'hierarchical'	   => 1,
				'title_li'		   => '',
				'show_option_none'   => __( '' ),
				'number'			 => null,
				'echo'			   => 1,
				'depth'			  => 0,
				'current_category'   => 0,
				'pad_counts'		 => 0,
				'taxonomy'		   => 'category',
				'walker'			 => null
				);
				wp_list_categories( $args ); 
			?>
		</ul>
	</div>

	<?php wp_reset_postdata(); ?>
</section>

</main>
<!-- /main -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>