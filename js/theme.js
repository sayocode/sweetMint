jQuery(document).ready(function($) {
	const $body = $("body");
	const $window = $(window);

	const $siteNav = $("#site-nav");
	const $sidebarArea = $(".sidebar-area");
	let scroll = $window.scrollTop();

	// 画面の要素にアニメーション用のクラスを追加する
	$("#main").find(".article-body").find("h2,h3,h4").addClass("animated effect one-type");
	$(".single-list").find("div").removeClass("animated effect");
	$(".listings").find("h2,h3,h4,p").removeClass("animated effect").removeClass("one-type");

	// 画面の要素の調整
	wrapSpan($(".one-type"), $);
	effect($, scroll, $window);
	sideResize($);

	// モバイル用ナビゲーションの初期化
	$('.sidenav').sidenav();

	// パララックスの初期化
	$(document).ready(function() {
		$('.parallax').parallax();
	});
	// セレクトボックスの初期化
	$(document).ready(function(){
		$('select').formSelect();
	});

	const $archiveYearSelect = $(".archive-list select");
	if($archiveYearSelect.data("month") != "00"){
		$archiveYearSelect.val(homeUrl + "blog/" + $archiveYearSelect.data("year") + "/" + $archiveYearSelect.data("month") + "/");
	}

	$(".input-field").on("click", function(e){
		$(".now-selected").removeClass("now-selected");
		$(this).addClass("now-selected");
	});

	$archiveYearSelect.on("change", function(){
		const jumpUrl = $(this).val();
		if(jumpUrl != ""){
			window.location.href = jumpUrl;
		}
	});

	const $categorySelect = $(".category-list select");
	$categorySelect.prepend("<option value>カテゴリー一覧</option>").prepend("<option value data-jump='false'>カテゴリーを選択</option>");
	if($("#main").hasClass("blog-list")){
		$categorySelect.find("option:first").prop("selected", "true");
	} else {
		const thisPath = ($.grep($(location).attr('pathname').split('/'), function(e){return e !== "";}));
		$categorySelect.val(thisPath[thisPath.length - 1]);
	}
	$categorySelect.on("change", function(){
		console.log($($(this).prop("selectedOptions")).data("jump"));
		if($($(this).prop("selectedOptions")).data("jump") != false){
			const jumpUrl = homeUrl + "blog/category/" + $(this).val();
			window.location.href = jumpUrl;
		}
	});

	// scrollまたは画面リサイズでナブバーフィックス、サイドバー高さ調整と、アニメーション開始
	$window.on('resize scroll', function() {

		scroll = $window.scrollTop();
		const imgPos = $siteNav.offset().top;
		const windowHeight = $window.height();
		const fixedFlg = scroll > imgPos;
		if (fixedFlg) {
			$siteNav.addClass("navbar-fixed");
		} else {
			$siteNav.removeClass("navbar-fixed");
		}

		effect($, scroll, $window);
	});

	$window.on('resize', function() {
		sideResize($);
	});

	// ボタンにクラス追加
	$("#wpcf7-f18-o1 .wpcf7-form-control.wpcf7-submit").addClass("waves-effect waves-light btn light-green lighten-2 center-align");
	$("button").addClass("waves-effect waves-light btn");
	$("input[type='submit']").addClass("waves-effect waves-light btn");

	// ページ上部にスクロールするボタンの機能
	$("#autoScrollageTop").find("a").on("click", function(e){

		$('body,html').animate({
			scrollTop: 0
		}, 500).queue();
		return false;
	});

	_.each($('input[type="checkbox"], input[type="radio"]'), function(elm, i){
		const $elm = $(elm);
		if($elm.next().prop("nodeName") != "SPAN"){
			$elm.after("<span class='ck-after-span'>")
		}
	});

	$(".ck-after-span").on("click", function(){
		const $this = $(this);
		if($this.parents("label").length == 0){
			$this.prev().prop("checked", !$this.prev().prop('checked')).trigger("change");
		}
	});

	if($body.hasClass("home")){
		_.each($("#sidebar").find(".widget_area"), function(elm, i){
			const $elm = $(elm);
			$elm.addClass("col s12 m4");
			if(i % 3 == 2){
				$(elm).after("<div class='col s12'>");
			}
		});
	}

	$(".articles .hoverable a").on("hover", function(e){
		const $this = $(this);
		if(e.type == "mouseenter"){
			$this.parent().find(".img-back").addClass("read-more");
		} else {
			$(".img-back").removeClass("read-more");
		}
	});

	// ヘッダーナビゲーションの設定
	const $navMenu = $(".dropable-nav .menu-item-has-children > a");
	_.each($navMenu, function(elm, i){
		const $elm = $(elm);
		const $parent = $elm.parent();
		const subUl = $parent.find("ul");
		const listId = "subMenu" + i;

		$elm.addClass("dropdown-trigger").attr("data-target",listId).data("target",listId);

		subUl.attr("id", listId);
		if(!$("body").hasClass("home")){
			$elm.attr("style", "min-width:" + subUl.width() + "px;");
		}
	});

	$("#mobile-nav .dropdown-content").removeClass("dropdown-content");

	$navMenu.dropdown({ hover: true });

});

// 一文字ずつアニメーションする要素の文字をspanタグで囲む
function wrapSpan($target, $){

	_.each($target, function(elm, i){
		const $elm = $(elm);

		const text = $elm.text();
		let t = "";
		text.split('').forEach(function (c) {
			t += '<span style="opacity:0;">'+c.replace(/\s/g, "&ensp;")+'</span>';
		});
		$elm.html(t);
	});
}

// 要素をアニメーションさせる
function effect($, scroll, $window){

	// 下にスクロールしていくことでコンテンツをぬるっと表示
	$(".effect").each(function(i, elm) {
		const $elm = $(elm);
		const imgPos = $elm.offset().top;
		const windowHeight = $window.height();

		const viewFlg = scroll > imgPos - windowHeight + (windowHeight / 6);

		if (viewFlg) {

			if($elm.hasClass("prof-content") || $elm.hasClass("right-sidebar")){
				// トップページのプロフエリアか右サイドバーの場合右から現れる
				$elm.addClass("fadeInRight");
			} else if($elm.hasClass("blog-info")){
				// トップページのブログエリアの場合左から現れる
				$elm.addClass("fadeInLeft");
			} else {
				// それ以外の場合ぬるっと上昇して現れる
				$elm.addClass("fadeInUp");
			}

			// 1文字ずつ現れる
			if($elm.hasClass("one-type")){
				$elm.find("span")
				.each(function(j){
					const $this = $(this);
					$this.delay(30 * j).queue(function() {
						$this.addClass("animated rotateInDownRight");
					});
				});
			}
			$elm.removeClass("effect");
		}
	});
}

// ページ下部からの高さ取得
function getScrollBottom() {
	const body = window.document.body;
	const html = window.document.documentElement;
	const scrollTop = body.scrollTop || html.scrollTop;
	return html.scrollHeight - html.clientHeight - scrollTop;
}

// サイドバーの高さ調整
function sideResize($){

	var w = window.innerWidth ? window.innerWidth: $window.width();
	if (w > 600) {
		let sideMinHeight = 0;
		sideMinHeight = $("#main").height();
		$(".side-wrap").css("min-height", sideMinHeight);
	} else {
		$(".side-wrap").removeAttr("style");
	}

	return $(".side-wrap");
}