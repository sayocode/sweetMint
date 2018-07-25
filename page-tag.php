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
		<?php remove_filter ('the_content', 'wpautop'); ?>
		<?php the_content(); ?>
		<ul class="tags">
			<?php
$args = array(
'orderby' => 'count',
'order' => 'desc',
'number' => 20
);
$tags = get_terms('post_tag', $args);
foreach($tags as $value) {
echo '<li><a href="'. get_tag_link($value->term_id) .'">'. $value->name .' ('. $value->count .')</a></li>';
}
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