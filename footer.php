<?php
/*
パーツ：フッター
*/
?>
<!-- ページフッタ -->
<footer id="site-footer" class="col s12 blue-grey darken-2 white-text">
<div class="container">
<div class="row">
<div class="col s12 l4 widget-area">
	<?php dynamic_sidebar('bottom-widget-left'); ?>
</div>
<div class="col s12 m6 l4 widget-area">
	<?php dynamic_sidebar('bottom-widget-center'); ?>
</div>
<div class="col s12 m6 l4 widget-area">
	<?php dynamic_sidebar('bottom-widget-right'); ?>
</div>
</div>
<p id="copyright" class="wrapper col s12 right-align blue-grey darken-3">&copy; ... <a href="http://sayoko-ct.com/" target="_blank">sayoko</a></p>
</div>
</footer>
<!-- /ページフッタ -->

<div id="autoScrollageTop" class="center-align"><a href=""><i class="fas fa-arrow-up"></i></a></div>

</div>
<!-- /row -->
</div>
<!-- /container -->

<?php if( has_nav_menu('navber') ){
	$defaults = array(
	'menu'		  => '',
	'menu_class'	  => 'menu sidenav',
	'menu_id'		=> 'mobile-nav',
	'container'	=> '',
	'container_class' => '',
	'container_id'  => '',
	'fallback_cb'	=> 'wp_page_menu',
	'before'		  => '',
	'after'		=> '',
	'link_before'	=> '',
	'link_after'	  => '',
	'echo'		  => true,
	'depth'		=> 0,
	'walker'		  => '',
	'theme_location'  => '',
	'items_wrap'	  => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
	wp_nav_menu($defaults);} ?>
<script type="text/javascript">
// サイト基本情報の変数 
const homeUrl = "<?php echo esc_url( home_url( '/' ) ); ?>";
const thisPageUrl = "<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>";
const thisTitle ="<?php $page = get_post( $post->ID ); echo $page->post_name; ?>";
</script>
<?php wp_footer(); ?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<div id="fb-root"></div>
<script type="text/javascript">
const fbShereLink = document.getElementsByClassName( "fb-xfbml-parse-ignore" );
if(fbShereLink.length != 0){
	const urlText = fbShereLink[0].getAttribute('href').replace( "urlReplacement", encodeURIComponent(thisPageUrl) );;
	for(var i = 0; i < fbShereLink.length; i++){
		fbShereLink[i].href = urlText;
	}
}

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id))
			return;
		js = d.createElement(s);
		js.id = id;
		js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.0&appId=620167928345267&autoLogAppEvents=1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>
// 追加のjQuery
jQuery(document).ready(function($) {
setTimeout(function(){
<?php echo get_new_post_one() ?>
},500);
});
</script>
<script type="text/javascript" async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script type="text/javascript" src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
</body>
</html>
