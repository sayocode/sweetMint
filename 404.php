<!-- 404.php -->
<?php get_header(); ?>

<!-- main -->
<main id="main" class="col s12 m8 l7">
<section class="content container">
		<div class="col s12">
			<h1 class="page-title-link"><i class="animated effect fas fa-exclamation-triangle"></i>&ensp;<span class="animated effect one-type">404 error</span></h1>
		</div>
		<div class="article-body col s12">
			<p class="animated effect">ページが見つかりません。</p>
			<p class="animated effect">
				URLが誤っているか、ページが削除されました。 ： <span class="error_msg"> <span id="protocol">https:</span>//<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?>
				</span>
			</p>
			<p class="animated effect right-align marcellus-sc">
				<a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> TOP</a>
			</p>
		</div>
</section>
</main>
<!-- /main -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
<script>document.getElementById("protocol").textContent=location.protocol;</script>