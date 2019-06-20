$(document).ready(function(){
  // デイトピッカーの表示処理
  // $("#datepicker").datepicker();
  $(".datepicker").datepicker({
    showOn:"button",
    buttonText:"▼",
    changeYear:true,
    changeMonth:true
  });
  // $("#datepicker").datepicker("option", "buttonImageOnly", true);
  // $("#datepicker").datepicker("option", "buttonImage", 'ico_calendar.png');

  $("#btn_search").click(function(){
    // 処理前に Loading 画像を表示
    dispLoading("処理中...");

    // 操作対象のフォーム要素を取得
    form_input.btn_nm.value='btn_search';   //押したボタン識別用にボタン名をセット
    var $formData = $("#form_input").serialize();   //formのデータを取得
    console.log($formData);
    // Ajax通信を開始する
    $.ajax({
      url: "/kskweb/Frmsv0120/getAjaxData",
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
    // .fail(function () {
    //   console.log("失敗");
    // })
    .fail(function(jqXHR, textStatus, errorThrown) {
                          $("#XMLHttpRequest").html("XMLHttpRequest : " + jqXHR.status);
                          $("#textStatus").html("textStatus : " + textStatus);
                          $("#errorThrown").html("errorThrown : " + errorThrown);
                          console.log(jqXHR.status);
                          console.log(textStatus);
                          console.log(errorThrown);
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
    order: [[0,"asc"],[1,"asc"],[2,"asc"]],
    select: {
      style: 'single'
    },
    scrollX: true,
    // 縦スクロールバーを有効にする (scrollYは200, "200px"など「最大の高さ」を指定します)
    scrollY: 600,
    pageLength: 25,//初期表示件数
    lengthMenu: [[25, 100, 1000,-1], [25, 100, 1000, "全件"]],//表示件数メニュー
    dom: 'Blfrtip',
    buttons: ['copy', 'excel'],
    fixedColumns:   {
        leftColumns: 2
    },
    columnDefs:[
      {targets:0,title:'売上日',data:'ymd'},
      {targets:1,title:'伝票番号',data:'den_no'},
      {targets:2,title:'伝票行番',data:'row_no'},
      {targets:3,title:'伝票区分',data:'den_kbn'},
      {targets:4,title:'得意先',data:'tokusaki_nm'},
      {targets:5,title:'納入先',data:'tk_eda_cd'},
      {targets:6,title:'納入先名',data:'nonyusaki_nm'},
      {targets:7,title:'取引先CD',data:'torihikisaki_cd'},
      {targets:8,title:'取引先名',data:'torihikisaki_nm'},
      {targets:9,title:'品番',data:'jhin_cd'},
      {targets:10,title:'品名',data:'hin_nm'},
      {targets:11,title:'数量',data:'suryo',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:12,title:'原単価',data:'tanka',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:13,title:'原価金額',data:'kingaku',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:14,title:'売単価',data:'htanka',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:15,title:'売価金額',data:'htanka_sum',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:16,title:'送料',data:'unchin',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:17,title:'商品CD',data:'syouhin_cd'},
      {targets:18,title:'年',data:'yy'},
      {targets:19,title:'月',data:'mm'},
      {targets:20,title:'日',data:'dd'},
    ],
    // columnDefs:[{targets:2,visible:false}],
    // columnDefs:[className:"dt-right",{targets:2}],
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
