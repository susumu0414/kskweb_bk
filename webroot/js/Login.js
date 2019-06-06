$(document).ready(function(){
  // // ログイン画面表示時
  // $('#main_login').hide().fadeIn(3500);
  // ログインボタン押下時
  $("#btn_login").click(function(){
    // アニメーションの実行
    $("#web_title").addClass("animated zoomOutRight");
    $("#contents_login").addClass("animated zoomOutRight");
    // アニメーション終了時に画面遷移
    $("#web_title").on('animationend', function() {
      $('#form_input').submit();
    });
  });
});
