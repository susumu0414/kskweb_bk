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
      url: "/kskweb/Frmsv0130/getAjaxData",
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
    order: [[1,"desc"]],  //初期表示「注文番号」でソート
    select: {
      style: 'single'
    },
    scrollX: true,
    // 縦スクロールバーを有効にする (scrollYは200, "200px"など「最大の高さ」を指定します)
    scrollY: 600,
    pageLength: 25,//初期表示件数
    lengthMenu: [[25, 100, 1000,-1], [25, 100, 1000, "全件"]],//表示件数メニュー
    dom: 'Blfrtip',
    // buttons: ['copy', 'excel','csv'],
    buttons: [],
    fixedColumns:   {
        leftColumns: 2
    },
    columnDefs:[
      {targets:0,title:'注文番号',data:'order_id'},
      {targets:1,title:'注文日時',data:'create_date'},
      {targets:2,title:'顧客ID',data:'customer_id'},
      {targets:3,title:'顧客名1',data:'order_name01'},
      {targets:4,title:'顧客名2',data:'order_name02'},
      {targets:5,title:'顧客名カナ1',data:'order_kana01'},
      {targets:6,title:'顧客名カナ2',data:'order_kana02'},
      {targets:7,title:'郵便番号1',data:'order_zip01'},
      {targets:8,title:'郵便番号2',data:'order_zip02'},
      {targets:9,title:'都道府県',data:'name'},
      {targets:10,title:'住所1',data:'order_addr01'},
      {targets:11,title:'住所2',data:'order_addr02'},
      {targets:12,title:'電話番号1',data:'order_tel01'},
      {targets:13,title:'電話番号2',data:'order_tel02'},
      {targets:14,title:'電話番号3',data:'order_tel03'},
      {targets:15,title:'メールアドレス',data:'order_email'},
      {targets:16,title:'支払い方法',data:'payment_method'},
      {targets:17,title:'要望等',data:'message'},
      {targets:18,title:'店舗メモ',data:'note'},
      {targets:19,title:'お届け指定日',data:'shipping_date'},
      {targets:20,title:'お届け時間',data:'shipping_time'},
      {targets:21,title:'発送方法',data:'deliv'},
      {targets:22,title:'お届け先名前1',data:'shipping_name01'},
      {targets:23,title:'お届け先名前2',data:'shipping_name02'},
      {targets:24,title:'お届け先カナ1',data:'shipping_kana01'},
      {targets:25,title:'お届け先カナ2',data:'shipping_kana02'},
      {targets:26,title:'お届け先郵便番号1',data:'shipping_zip01'},
      {targets:27,title:'お届け先郵便番号2',data:'shipping_zip02'},
      {targets:28,title:'お届け先都道府県',data:'pref_name'},
      {targets:29,title:'お届け先住所1',data:'shipping_addr01'},
      {targets:30,title:'お届け先住所2',data:'shipping_addr02'},
      {targets:31,title:'お届け先電話番号1',data:'shipping_tel01'},
      {targets:32,title:'お届け先電話番号2',data:'shipping_tel02'},
      {targets:33,title:'お届け先電話番号3',data:'shipping_tel03'},
      {targets:34,title:'商品コード',data:'product_code'},
      {targets:35,title:'商品名',data:'product_name'},
      {targets:36,title:'数量',data:'quantity',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:37,title:'単価',data:'price',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:38,title:'税金',data:'tax',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:39,title:'小計',data:'subtotal',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:40,title:'送料',data:'deliv_fee',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:41,title:'手数料',data:'charge',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:42,title:'合計',data:'total',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:43,title:'使用ポイント',data:'use_point',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:44,title:'値引',data:'discount',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:45,title:'お支払い合計',data:'payment_total',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:46,title:'加算ポイント',data:'add_point',className:'dt-right',render: $.fn.dataTable.render.number( ',' )},
      {targets:47,title:'対応状況',data:'status_name'},
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
