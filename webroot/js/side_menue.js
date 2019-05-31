$(function(){
  //.accordion_menueの中のp要素がクリックされたら
	$('.accordion_menue p').click(function(){
		//クリックされた.accordion_menueの中のp要素に隣接するul要素が開いたり閉じたりする。
		$(this).next('ul').slideToggle();
	});
});
