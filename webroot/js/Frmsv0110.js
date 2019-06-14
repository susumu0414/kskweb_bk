$(document).ready(function(){
  $("#btn_search").click(function(){
    // 処理前に Loading 画像を表示
    dispLoading("処理中...");

    // 操作対象のフォーム要素を取得
    form_input.btn_nm.value='btn_search';   //押したボタン識別用にボタン名をセット
    var $formData = $("#form_input").serialize();   //formのデータを取得
    console.log($formData);
    // Ajax通信を開始する
    $.ajax({
      url: "/kskweb/Frmsv0110/getAjaxData",
      type: "POST", // getかpostを指定(デフォルトは前者)
      dataType: 'json', // 「json」を指定するとresponseがJSONとしてパースされたオブジェクトになる
      data: $formData,
    })
    // ・ステータスコードは正常で、dataTypeで定義したようにパース出来たとき
    .done(function (response) {
      console.log("成功です！");
      console.log(response);
      Fnc_DataTables_Set(response);
    })
    // ・サーバからステータスコード400以上が返ってきたとき
    // ・ステータスコードは正常だが、dataTypeで定義したようにパース出来なかったとき
    // ・通信に失敗したとき
    .fail(function () {
      console.log("失敗");
    })
    // 処理終了時
    .always(function(response) {
      // Lading 画像を消す
      removeLoading();
    });
    return false;
  });

  $('#tbl_result tbody').on('click',"tr", function(e) {
    var that = this;
    setTimeout(function() {
      var dblclick = parseInt($(that).data('double'), 10);
      if (dblclick > 0) {
        $(that).data('double', dblclick-1);
      } else {
        //やりたい処理;
        console.log("クリック");
      }
    }, 250);
  }).dblclick(function(e) {
    $(this).data('double', 2);
    //やりたい処理;
    console.log("ダブルクリック");
    var data = $('#tbl_result').dataTable().fnGetData(this);
    console.log(data);
  });
});

window.onload =  function() {
  Fnc_DataTables_Set();
};

function Fnc_DataTables_Set($response){
  $("#tbl_result").DataTable({
    destroy: true,
    order: [[7,"asc"]],  //初期表示「ロケーション」でソート
    select: {
      style: 'single'
    },
    scrollX: true,
    // 縦スクロールバーを有効にする (scrollYは200, "200px"など「最大の高さ」を指定します)
    scrollY: 600,
    pageLength: 25,//初期表示件数
    lengthMenu: [[25, 100, 1000,-1], [25, 100, 1000, "全件"]],//表示件数メニュー
    dom: 'Blfrtip',
    buttons: [],
    fixedColumns:   {
        leftColumns: 2
    },
    columnDefs:[
      {targets:0,title:'作業番号',data:'work_no'},
      {targets:1,title:'受付日',data:'uketuke_date'},
      {targets:2,title:'得意先',data:'tk_cd'},
      {targets:3,title:'枝番',data:'tk_eda_cd'},
      {targets:4,title:'得意先名',data:'tokusaki_nm'},
      {targets:5,title:'納入先名',data:'nonyusaki_nm'},
      {targets:6,title:'区分',data:'kbn'},
      {targets:7,title:'ロケーション',data:'location_no'},
      {targets:8,title:'品番振替',data:'hin_furi_kbn'},
      {targets:9,title:'出荷品番',data:'work_c_hin'},
      {targets:10,title:'数量',data:'suryo',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:11,title:'在庫数',data:'zaiko_su',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:12,title:'品名',data:'hin_nm'},
      {targets:13,title:'受注品番',data:'input_hin_cd'},
    ],
    data: $response,
    language: {
     "decimal": ".",
     "thousands": ",",
     "sProcessing": "処理中...",
     "sLengthMenu": "_MENU_ 件表示",
     "sZeroRecords": "データはありません。",
     "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
     "sInfoEmpty": " 0 件中 0 から 0 まで表示",
     "sInfoFiltered": "（全 _MAX_ 件より抽出）",
     "sInfoPostFix": "",
     "sSearch": "検索:",
     "sUrl": "",
     "oPaginate": {
     "sFirst": "先頭",
     "sPrevious": "前",
     "sNext": "次",
     "sLast": "最終"
     }
    },
  });
};

// ------------------------------
// Loading イメージ表示関数
// 引数： msg 画面に表示する文言
// ------------------------------
function dispLoading(msg){
  // 引数なし（メッセージなし）を許容
  if( msg == undefined ){
    msg = "";
  }
  // 画面表示メッセージ
  var dispMsg = "<div class='loadingMsg'>" + msg + "</div>";
  // ローディング画像が表示されていない場合のみ出力
  if($("#loading").length == 0){
    $("body").append("<div id='loading'>" + dispMsg + "</div>");
  }
}

// ------------------------------
//  Loading イメージ削除関数
// ------------------------------
function removeLoading(){
  $("#loading").remove();
}
