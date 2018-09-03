<?php
/*
フロントページ用テンプレート
*/
get_header(); ?>

<!-- main -->
<main id="main" class="col s12">
<section class="prof-section col s12">
	<div class="content-section col s12 m8 about-this-site">
		<h2 class="animated effect">About This Site</h2>
		<?php echo get_the_about_this_site(); ?>

		<div class="frontpage-ads col s12 m10 l7 offset-l1 animated effect">
			<div class="col s12 center-align amatic-sc recommended"><p>- Recommended -</p></div>
			<div class="col s4">
				<a
					href="https://hb.afl.rakuten.co.jp/hgc/16a5236b.e44e7e09.16a5236c.6691428b/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Fantiqua-a%2Fpo-00006%2F&m=http%3A%2F%2Fm.rakuten.co.jp%2Fantiqua-a%2Fi%2F10011787%2F&link_type=pict&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJwaWN0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJkb3duIiwiY29tIjoxLCJjb21wIjoibGVmdCIsInByaWNlIjowLCJib3IiOjEsImNvbCI6MH0%3D"
					target="_blank" rel="nofollow">
					<img class="hoverable"
						src="https://hbb.afl.rakuten.co.jp/hgb/16a5236b.e44e7e09.16a5236c.6691428b/?me_id=1241061&item_id=10011787&m=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Fantiqua-a%2Fcabinet%2Fpa24%2Fpo00006.jpg%3F_ex%3D80x80&pc=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Fantiqua-a%2Fcabinet%2Fpa24%2Fpo00006.jpg%3F_ex%3D400x400&s=400x400&t=pict"
						border="0" alt="" title="">
				</a>
			</div>
			<div class="col s4">
				<a
					href="https://hb.afl.rakuten.co.jp/hgc/16a5236b.e44e7e09.16a5236c.6691428b/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Fantiqua-a%2Fya-00108%2F&m=http%3A%2F%2Fm.rakuten.co.jp%2Fantiqua-a%2Fi%2F10009533%2F&link_type=pict&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJwaWN0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJkb3duIiwiY29tIjoxLCJjb21wIjoibGVmdCIsInByaWNlIjowLCJib3IiOjEsImNvbCI6MH0%3D"
					target="_blank" rel="nofollow">
					<img class="hoverable"
						src="https://hbb.afl.rakuten.co.jp/hgb/16a5236b.e44e7e09.16a5236c.6691428b/?me_id=1241061&item_id=10009533&m=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Fantiqua-a%2Fcabinet%2Fat43%2Fya00108.jpg%3F_ex%3D80x80&pc=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Fantiqua-a%2Fcabinet%2Fat43%2Fya00108.jpg%3F_ex%3D400x400&s=400x400&t=pict"
						border="0" alt="" title="">
				</a>
			</div>
			<div class="col s4">
				<a
					href="https://hb.afl.rakuten.co.jp/hgc/16a524a8.35449554.16a524a9.3fecce22/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Fcocoiro-style%2F568108258492%2F&m=http%3A%2F%2Fm.rakuten.co.jp%2Fcocoiro-style%2Fi%2F10004193%2F&link_type=pict&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJwaWN0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJkb3duIiwiY29tIjoxLCJjb21wIjoibGVmdCIsInByaWNlIjowLCJib3IiOjEsImNvbCI6MH0%3D"
					target="_blank" rel="nofollow">
					<img class="hoverable"
						src="https://hbb.afl.rakuten.co.jp/hgb/16a524a8.35449554.16a524a9.3fecce22/?me_id=1309968&item_id=10004193&m=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Fcocoiro-style%2Fcabinet%2Fcocoiro01%2F180412%2F568108258492-1.jpg%3F_ex%3D80x80&pc=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Fcocoiro-style%2Fcabinet%2Fcocoiro01%2F180412%2F568108258492-1.jpg%3F_ex%3D400x400&s=400x400&t=pict"
						border="0" alt="" title="">
				</a>
			</div>
		</div>
	</div>
	<div class="col s12 m4 prof-content white-text animated effect">
		<?php echo get_the_about_this_site_description() ?>
	</div>

</section>

<div class=" col s12 parallax-container">
	<div class="col s12 z-depth-1 parallax">
		<picture media="(min-width: 820px)"
			srcset="<?php echo get_template_directory_uri(); ?>/images/morning-small.jpg') 1x, small@2x.jpg 2x">
		<img
			src="<?php echo get_template_directory_uri(); ?>/images/smoothy.jpg">
		</picture>
	</div>
</div>

<section class="blog-section col s12">
	<div class="content-section col s12">
		<div class="col s12 m4 blog-info teal darken-1 section-info white-text animated effect">
			<h2 class=" ">Blog</h2>
				<p class="animated effect one-type">
					sayokoの好きなこと、絵を描いたときやアプリを作ったときに心に浮かんだことが、少しでもあなたに届きますように。</p>
					<a class="marcellus-sc" id="blogLink" href="<?php echo esc_url( home_url( '/' ) ); ?>/blog/"><span class="animated effect right-align">Blog List</span></a>
		</div>
		<div class="col s12 m8 blog-contents">
		<?php if ( have_posts() ) : ?>
			<?php
						while ( have_posts() ) {
								$loopcounter++;

								the_post();
								echo '<article class="col xl4 m6 s12 toppage-article articles animated effect toppage-article-';
								echo $loopcounter;
								echo '"><div class="col s12 white hoverable z-depth-1">';
								echo '<a class="blog-link" href="';
								the_permalink();
								echo '">&ensp;</a>';

								if ( has_post_thumbnail() ) {
									$image_id = get_post_thumbnail_id ();
									$image_url = wp_get_attachment_image_src ($image_id, true);
									echo '<div class="img-back white marcellus-sc"><img src="'.$image_url[0].'"></div>';
								} else {
									echo '<div class="img-back no-img marcellus-sc"><span>No Image</span></div>';
								}
								echo '<div class="article-contents"><div class="date-wrap left"><time datetime="';
								the_time('Y/m/d');
								echo '"><span class="day-of-the-week">';
								echo get_post_time('M');
								echo "</span><span>";
								the_time('d');
								echo '</span></time></div>';
								echo '<h3>';
								the_title();
								echo '</h3><div class="contents-body">';
								the_excerpt();
								echo "</div></div></div></article>";
						}

				?>
			<div class="col s12 animated effect white-text blog-more-card">
				<a class="marcellus-sc card grey darken-1 hoverable center-align"
					href="<?php echo esc_url( home_url( '/' ) ); ?>/blog/">Read More
				</a>
			</div>
			<?php else : ?>
		<p class="single-none">まだ記事がありません。</p>
		<?php endif; ?>
	</div>
	</div>
</section>

<div class=" col s12 parallax-container">
	<div class="col s12 z-depth-1 parallax">
	<picture media="(min-width: 820px)" srcset="<?php echo get_template_directory_uri(); ?>/images/morning-small.jpg') 1x, small@2x.jpg 2x">
		<img
			src="<?php echo get_template_directory_uri(); ?>/images/morning.jpg">
	</div>
	</picture>
</div>

<section class="mail-section col s12 white-text">
	<div class="content-section col s12">
		<div class="contents-header animated effect">
			<h2>Contact</h2>
		</div>
		<div class="contents-body">
			<?php echo do_shortcode('[contact-form-7 id="6" title="コンタクトフォーム 1"]'); ?>
		</div>
	</div>
</section>

</main>
<!-- /main -->

<!-- sidebar -->
<div class="white-text">
<?php get_sidebar(); ?></div>
<!-- /sidebar -->

<?php get_footer(); ?>
