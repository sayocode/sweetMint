<?php
/*
テーマのための関数
*/

/*#########################################################

基本設定

#########################################################*/
// WordPressのバージョンを非表示
remove_action('wp_head','wp_generator');

// 絵文字削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles');

// フィードのlink要素を自動出力する
add_theme_support( 'automatic-feed-links' );

// 投稿ページにてアイキャッチ画像の欄を表示
add_theme_support( 'post-thumbnails' );

// WordPressコアから出力されるHTMLタグをHTML5のフォーマットにする
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );

// 投稿フォーマットのサポート
add_theme_support( 'post-formats', array(
	'aside',	//アサイド
	'gallery',	//ギャラリー
	'image',	//画像
	'link',		//リンク
	'quote',	//引用
	'status',	//ステータス
	'video',	//動画
	'audio',	//音声
	'chat',		//チャット
) );


/*#########################################################

汎用関数

#########################################################*/
//titleの設定
add_theme_support( 'title-tag' );
function wp_document_title_separator( $separator ) {
	$separator = '|';
	return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );
function wp_document_title_parts ( $title ) {
	if ( is_home() || is_front_page() ) {
		unset( $title['tagline'] );
	}
	return $title;
}
add_filter( 'document_title_parts', 'wp_document_title_parts', 10, 1 );

// 日付の出力
function smart_entry_date() {
	// 日付
	printf( '<time class="entry-date published" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( ) ),
		get_the_date()
	);
}

// カテゴリの出力
function smart_entry_category($pretag="", $endtag="") {
	$categories_list = get_the_category_list( ', ' );
	if ( $categories_list ) {
		printf( $pretag.'%1$s'.$endtag,
			$categories_list
		);
	}
}

// タグの出力
function smart_entry_tag($pretag="", $endtag="") {
	$tags_list = get_the_tag_list( '', ', ' );
	if ( $tags_list ) {
		printf( $pretag.'%1$s'.$endtag,
			$tags_list
		);
	}
}

// 外部js、cssの読み込み
function theme_scripts() {
		wp_enqueue_script('underscore', get_template_directory_uri().'/js/lib/underscore-js/underscore-min.js', array(), false, true);
		wp_enqueue_script( 'w2ui', get_template_directory_uri().'/js/lib/w2ui-1.5.rc1/w2ui-1.5.rc1.min.js' , array(), false, true);
		wp_enqueue_script('materialize', get_template_directory_uri().'/js/lib/materialize/materialize.min.js', array(), false, true);
		wp_enqueue_script( 'browser_selector', get_template_directory_uri().'/js/lib/browser_selector/css_browser_selector.js' , array(), false, true);
		wp_enqueue_script( 'browser_selector-dev', get_template_directory_uri().'/js/lib/browser_selector/css_browser_selector_dev.js' , array(), false, true);
		wp_enqueue_script( 'theme-script', get_template_directory_uri().'/js/theme.js' , array(), false, true);

		wp_enqueue_style( 'materialize-css', get_bloginfo( 'stylesheet_directory') . '/css/lib/materialize/materialize.min.css', array(), null, 'all');
		wp_enqueue_style( 'fontawesome', get_bloginfo( 'stylesheet_directory') . '/css/lib/fontawesome/css/fontawesome-all.min.css', array(), null, 'all');
		wp_enqueue_style( 'animate', get_bloginfo( 'stylesheet_directory') . '/css/lib/animate/animate.css', array(), null, 'all');
		wp_enqueue_style( 'w2uigrid', get_bloginfo( 'stylesheet_directory') . '/css/lib/w2ui-1.5.rc1/w2ui-1.5.rc1.min.css', array(), null, 'all');
		wp_enqueue_style( 'theme-css', get_bloginfo( 'stylesheet_directory') . '/css/theme.css', array(), null, 'all');
}
add_action( 'wp_enqueue_scripts', 'theme_scripts');

// サイドバーウィジェット

add_filter( 'widget_title', 'remove_widget_title' );
		function remove_widget_title( $widget_title ) {
						if ( substr ( $widget_title, 0, 1 ) == '!' )
										return;
						else 
										return ( $widget_title );
}

function register_my_menu() {
	register_nav_menu('navber', 'Navber Menu');
}
add_action('after_setup_theme', 'register_my_menu');


register_sidebar( array(
		'name' => __( 'サイドバー' ),
		'id' => 'side-widget',
		'before_widget' => '<div class="widget_area animated effect">',
		'after_widget' => '<!-- // .side_widget_block --></div>',
		'before_title' => '<h2 class="animated effect">',
		'after_title' => '</h2>',
));

register_sidebar( array(
		'name' => __( 'ページ下部左' ),
		'id' => 'bottom-widget-left',
		'before_widget' => '<div class="widget_area animated effect">',
		'after_widget' => '<!-- // .bottom_widget_left_block --></div>',
		'before_title' => '<h2 class="animated effect">',
		'after_title' => '</h2>',
));

register_sidebar( array(
		'name' => __( 'ページ下部中央' ),
		'id' => 'bottom-widget-center',
		'before_widget' => '<div class="widget_area animated effect">',
		'after_widget' => '<!-- // .bottom_widget_center_block --></div>',
		'before_title' => '<h2 class="animated effect">',
		'after_title' => '</h2>',
));
register_sidebar( array(
		'name' => __( 'ページ下部右' ),
		'id' => 'bottom-widget-right',
		'before_widget' => '<div class="widget_area animated effect">',
		'after_widget' => '<!-- // .bottom_widget_right_block --></div>',
		'before_title' => '<h2 class="animated effect">',
		'after_title' => '</h2>',
));

//カスタム投稿タイプ
global $wp_rewrite;
$wp_rewrite->flush_rules();

add_action('init', 'infomation_init');
function infomation_init()
{
		$labels = array(
				'name' => _x('Infomation', 'infomation general name'),
				'singular_name' => _x('Infomation', 'infomation singular name'),
				'add_new' => _x('新規', 'new_infomation'),
				'add_new_item' => __('新規'),
				'edit_item' => __('編集'),
				'new_item' => __('新しい記事'),
				'view_item' => __('記事を見てみる'),
				'search_items' => __('記事を探す'),
				'not_found' =>	__('記事はありません'),
				'not_found_in_trash' => __('ゴミ箱に記事はありません'),
				'parent_item_colon' => ''
		);
		$infomationArgs = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'info', 'with_front' => false),
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 5,
				'supports' => array('title','editor','thumbnail','custom-fields','excerpt','revisions','page-attributes','comments'),
				'has_archive' => true
		);
		register_post_type('info',$infomationArgs);

//カテゴリータイプ
$infomationArgs = array(
'label' => 'infomationカテゴリー',
'public' => true,
'show_ui' => true,
'hierarchical' => true
);
register_taxonomy('infomation_category','info',$infomationArgs);

//タグタイプ
$infomationArgs = array(
'label' => 'infomationタグ',
'public' => true,
'show_ui' => true,
'hierarchical' => false
);
register_taxonomy('infomation_tag','info',$infomationArgs);
}

add_filter( 'widget_text', function( $ret ) {
		$php_file = 'infowidget';

		if( strpos( $ret, '[' . $php_file . ']' ) !== false ) {
				add_shortcode( $php_file, function() use ( $php_file ) {
						get_template_part( $php_file );
				});

				ob_start();
				do_shortcode( '[' . $php_file . ']' );
				$ret = ob_get_clean();
		}

		return $ret;
}, 99 );

function section_feed_shortcode( $atts ) {
extract( shortcode_atts( array( 'limit' => -1, 'type' => 'post'), $atts ) );
 
$paged = get_query_var('paged') ? get_query_var('paged') : 1;	
 
query_posts(	array ( 
		'posts_per_page' => $limit, 
		'post_type' => $type, 
		'order' => 'DESC', 
		'orderby' =>'second', 
		'paged' => $paged ) );
 
$list = ' ';	 
 if ( have_posts() ){
while ( have_posts() ) { the_post();
		$cats = get_the_category(); 
		$catname = $cats[0]->cat_name;

$thumbnail = ' '; 
$singleInfo = ' ';
if ( has_post_thumbnail() ) {
	$image_id = get_post_thumbnail_id ();
	$image_url = wp_get_attachment_image_src ($image_id, true);
	$thumbnail = '<div class="img-back white marcellus-sc"><img src="'.$image_url[0].')" data-alias="img01"></div>';
	$singleInfo = '<div class="single-info post-info animated effect right-align col s12 m8 push-m4">';
} else {
$thumbnail = '<div class="img-back no-img marcellus-sc"><span>No Image</span></div>';
$singleInfo = '<div class="single-info post-info animated effect right-align col s12">';
}


 $catLink = '';
if(get_post_type() == 'post'){
 $catLink = '<a href="'.get_category_link( $cats[0]->term_id ).'" rel="category tag">'.$catname.'</a>';
}
		$list .= '<article class="single-list col xl4 articles l6 s12 animated effect"><div class="col s12 white hoverable z-depth-1">'
		. '<a class="blog-link" href="' . get_permalink() . '">&nbsp;</a>'
		. $thumbnail
		. '<div class="article-contents"><div class="date-wrap left">'
		. '<time datetime="' . get_the_time('Y-m-d') . '"><span class="day-of-the-week">' . get_post_time('M') . '</span>'
		. '<span>' . get_post_time('d') . '</span></time></div>'
		. '<h2>' . get_the_title() . '</h2>'
		. '<div class="contents-body"><p>' . get_the_excerpt() . '</p></div>'
		. '</div></div></article>';
}
} else {
$list .= '<div>まだ投稿されていません。</div>';
}
 
return
'<div class="listings clearfix">'
. $list
. '</div></div></section><section class="page-nation container">'
. '<div class="row">'
. '<div class="col s6 center-align pn-prev"><span class="deep-purple lighten-5 z-depth-1">' . get_next_posts_link( __( 'prev' ) ) . '</span></div>'
. '<div class="col s6 center-align pn-next"><span class="deep-purple lighten-5 z-depth-1">' . get_previous_posts_link( __( 'next' ) ) . '</span></div>'
. '</div></section><section class="content container" style="display:none;"><div>' .
wp_reset_query();
 
}
add_shortcode( 'feed', 'section_feed_shortcode' );

function breadcrumb(){
	global $post;
	$str ='';
	if(!is_home()&&!is_admin()){
		$str.= '<div class="col s12 animated effect marcellus-sc" id="breadcrumb-wrap"><div id="breadcrumb"><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
		$str.= '<a href="'. home_url() .'" itemprop="url"><span itemprop="title"><i class="fas fa-home"></i> top</span></a>&ensp;&gt;&#160;&ensp;</span>';
		if(is_category()) {
			$cat = get_queried_object();
			$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/" itemprop="url"><span itemprop="title">Blog</span></a>&ensp;&gt;&#160;&ensp;</span>';
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'
					. get_cat_name($ancestor) .'</span></a>&ensp;&gt;&#160;&ensp;</span>';
				}
			}
			$str.='<span><span itemprop="title">'. $cat-> cat_name . '</span></span>';
		} elseif(is_tag()) {
			$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/" itemprop="url"><span itemprop="title">Blog</span></a>&ensp;&gt;&#160;&ensp;</span>';
			$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/tag/" itemprop="url"><span itemprop="title">Tag</span></a>&ensp;&gt;&#160;&ensp;</span>';

			$str.='<span><span itemprop="title">'. single_tag_title('', false) . '</span></span>';
		} elseif(is_date()){
			$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/" itemprop="url"><span itemprop="title">Blog</span></a>&ensp;&gt;&#160;&ensp;</span>';
			$mnum = get_query_var('monthnum');
			if($mnum < 10){
				$mnum = '0' . $mnum;
			}
			if(is_year()){
				$str.='<span><span itemprop="title">'. get_query_var('year') . '</span></span>';
			} elseif(is_month()){
				$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/'. get_query_var('year') . '" itemprop="url"><span itemprop="title">'. get_query_var('year') . '</span></a>&#047;</span>';
				$str.='<span><span itemprop="title">'. $mnum . '</span></span>';
			} else{
			$dnum = get_query_var('day');
			if($dnum < 10){
				$dnum = '0' . $dnum;
			}
				$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/'. get_query_var('year') . '" itemprop="url"><span itemprop="title">'. get_query_var('year') . '</span></a>&#047;</span>';
				$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/'. get_query_var('year') . '/'. $mnum . '" itemprop="url"><span itemprop="title">'. $mnum . '</span></a>&#047;</span>';
				$str.='<span><span itemprop="title">'. $dnum . '</span></span>';
			}
		}
		 elseif(is_archive()) {
			$str.='<span><span itemprop="title">'. get_the_archive_title() . '</span></span>';
		} elseif(is_page()){
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a>&ensp;&gt;&#160;&ensp;</span>';
				}
			}
			$str.='<span>'. get_the_title(). '</span>';
		} elseif(is_singular('info')){
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a>&ensp;&gt;&#160;&ensp;</span>';
				}
			}
			$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. home_url( '/' ). 'info/" itemprop="url"><span itemprop="title">Information</span></a>&ensp;&gt;&#160;&ensp;</span>';
			$str.='<span>'. get_the_title(). '</span>';
		} elseif(is_single()){
			$categories = get_the_category($post->ID);
			$cat = $categories[0];
			$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. esc_url( home_url( '/' ) ). '/blog/" itemprop="url"><span itemprop="title">Blog</span></a>&ensp;&gt;&#160;&ensp;</span>';
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a>&ensp;&gt;&#160;&ensp;</span>';
				}
			}
			$str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a>&ensp;&gt;&#160;&ensp;</span>';
			$str.='<span>'. get_the_title(). '</span>';
		} else{
			$str.='<div>'. wp_title('', false) .'</div>';
		}
		$str.='</div></div>';
	}
	echo $str;
}

add_filter( 'get_the_archive_title', function ($title) {
		if ( is_date() ){
			$title = $title;
		} elseif ( is_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = get_the_author();
		}
	return $title;
});

//Custom JS Widget
add_action( 'admin_menu', 'custom_js_hooks' );
add_action( 'save_post', 'save_custom_js' );
add_action( 'wp_footer','insert_custom_js');
function custom_js_hooks() {
	add_meta_box( 'custom_js', 'Custom JS', 'custom_js_input', 'post', 'normal', 'high' );
	add_meta_box( 'custom_js', 'Custom JS', 'custom_js_input', 'page', 'normal', 'high' );
}
function custom_js_input() {
	global $post;
	echo '<input type="hidden" name="custom_js_noncename" id="custom_js_noncename" value="'.wp_create_nonce('custom-js').'" />';
	echo '<textarea name="custom_js" id="custom_js" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_js',true).'</textarea>';
}
function save_custom_js($post_id) {
	if (!wp_verify_nonce($_POST['custom_js_noncename'], 'custom-js')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_js = $_POST['custom_js'];
	update_post_meta($post_id, '_custom_js', $custom_js);
}
function insert_custom_js() {
	if ( is_page() || is_single() ) {
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			echo '<script type="text/javascript">' . get_post_meta(get_the_ID(), '_custom_js', true) . '</script>';
		endwhile; endif;
		rewind_posts();
	}
}

add_filter( 'comment_form_defaults', 'my_title_reply');
function my_title_reply( $defaults){
	$defaults['title_reply'] = '';
	return $defaults;
}

//Custom CSS Widget
add_action( 'admin_menu', 'custom_css_hooks' );
add_action( 'save_post', 'save_custom_css' );
add_action( 'wp_head','insert_custom_css' );
function custom_css_hooks() {
	add_meta_box( 'custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high' );
	add_meta_box( 'custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high' );
}
function custom_css_input() {
	global $post;
	echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
	if ( !wp_verify_nonce( $_POST['custom_css_noncename'], 'custom-css' ) ) return $post_id;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return $post_id;
	$custom_css = $_POST['custom_css'];
	update_post_meta( $post_id, '_custom_css', $custom_css );
}
function insert_custom_css() {
	if ( is_page() || is_single() ) {
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			echo '<style type="text/css">' . get_post_meta(get_the_ID(), '_custom_css', true) . '</style>';
		endwhile; endif;
		rewind_posts();
	}
}

/*#########################################################

テーマ専用設定

#########################################################*/

function get_new_post_one(){
$ret = "";
$data = get_posts('post_type=post&order=DESC&orderby=date&showposts=1');
if(isset($data[0]) && ( is_front_page() && is_home() )) {
	$today = date("Y/m/d");
	$target_day = date('Y/m/d', strtotime($data[0]->post_date));
	if((strtotime($today) - strtotime($target_day)) <= 259200){
		$ret = "const toastHTML ='".'<span class="new badge indigo darken-4"></span><a href="'.get_permalink($data[0]->ID).'">'.esc_html($data[0]->post_title).'</a>'."'".';M.toast({html: toastHTML, classes: "rounded green accent-1 black-text"});';
	}
}

return $ret;
}