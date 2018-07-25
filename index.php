<?php
/*
トップページ用テンプレート
*/
get_header(); ?>

<section class="content container">
<div class="animated fadeInUp row"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> トップへ戻る</a></div>
</section>

</main>
<!-- /main -->

<!-- sidebar -->
<div class="col s12 m4 l5 side-wrap right-sidebar animated effect white-text">
<?php get_sidebar(); ?>
</div>
<!-- /sidebar -->

<?php get_footer(); ?>
