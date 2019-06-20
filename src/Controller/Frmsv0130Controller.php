<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class Frmsv0130Controller extends AppController
{
  public function initialize() {
    parent::initialize();
    // コンポーネントの読み込み
    $this->loadComponent('Common');
    // テーブルのモデル呼び出し
    $this->loadModel('MtbOrderStatus');

    // レイアウトの設定
    $this->viewBuilder()->setLayout('kskweb_default');
  }

  public function index() {
    // 権限チェック(&ページ名称取得)
    $ret=$this->Common->checkAuth(basename(__FILE__));
    if ($ret==false){
      $this->log("権限なし", LOG_DEBUG);

      // $this->request->session()->destroy();
      $this->Flash->set('権限が無い、もしくはセッションが切れました。ログインしなおしてください。'); //メッセージをセット
      // トップ画面に遷移
      return $this->redirect(['controller' => 'Login', 'action' => 'index']);
    }
    else{
      // ページ名称をセット
      $this->set('page_nm',$ret);
      // システム日付をセット
      $this->set('sysdate',date("Y/m/d"));
      // 対応状況ドロップダウンリスト表示用
      $MtbOrderStatus = $this->MtbOrderStatus->find('list')->order(["rank"=>"asc"])->toArray();
      // var_dump($MtbOrderStatus);
      $this->set('order_status_list',$MtbOrderStatus);
    }
  }

  public function getAjaxData() {
    $this->autoRender = FALSE;
    if($this->request->is('ajax')) {
      $result = [];

      $connection = ConnectionManager::get('ecdb');
      // クエリー生成(メソッド呼び出しはメソッド名の前に$this->が必要)
      $query=$this->createSql($this->request->data);
      $result = $connection->query($query)->fetchAll('assoc');

      // 検索結果をセット
      header('Content-Type: application/json');
      // echo json_encode($result);
      $this->response->body(json_encode($result));
    }
  }

  public function outputCSV() {
    $this->autoRender = FALSE;
    $result = [];

    $connection = ConnectionManager::get('ecdb');
    // クエリー生成(メソッド呼び出しはメソッド名の前に$this->が必要)
    $query=$this->createSql($this->request->data);
    $result = $connection->query($query)->fetchAll('assoc');

    // 出力情報の設定
    date_default_timezone_set('Asia/Tokyo');
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment;filename=受注DATA_".date('Ymd').date('His'). ".csv");
    header("Content-Transfer-Encoding: binary");

    // 1行目のラベルを作成
    $csv="";
    $csv .=  "注文番号,";
    $csv .=  "注文日時,";
    $csv .=  "顧客ID,";
    $csv .=  "顧客名1,";
    $csv .=  "顧客名2,";
    $csv .=  "顧客名カナ1,";
    $csv .=  "顧客名カナ2,";
    $csv .=  "郵便番号1,";
    $csv .=  "郵便番号2,";
    $csv .=  "都道府県,";
    $csv .=  "住所1,";
    $csv .=  "住所2,";
    $csv .=  "電話番号1,";
    $csv .=  "電話番号2,";
    $csv .=  "電話番号3,";
    $csv .=  "メールアドレス,";
    $csv .=  "支払い方法,";
    $csv .=  "要望等,";
    $csv .=  "店舗メモ,";
    $csv .=  "お届け指定日,";
    $csv .=  "お届け時間,";
    $csv .=  "発送方法,";
    $csv .=  "お届け先名前1,";
    $csv .=  "お届け先名前2,";
    $csv .=  "お届け先カナ1,";
    $csv .=  "お届け先カナ2,";
    $csv .=  "お届け先郵便番号1,";
    $csv .=  "お届け先郵便番号2,";
    $csv .=  "お届け先都道府県,";
    $csv .=  "お届け先住所1,";
    $csv .=  "お届け先住所2,";
    $csv .=  "お届け先電話番号1,";
    $csv .=  "お届け先電話番号2,";
    $csv .=  "お届け先電話番号3,";
    $csv .=  "商品コード,";
    $csv .=  "商品名,";
    $csv .=  "数量,";
    $csv .=  "単価,";
    $csv .=  "税金,";
    $csv .=  "小計,";
    $csv .=  "送料,";
    $csv .=  "手数料,";
    $csv .=  "合計,";
    $csv .=  "使用ポイント,";
    $csv .=  "値引き,";
    $csv .=  "お支払い合計,";
    $csv .=  "加算ポイント";
    $csv .=  "\n";

    foreach( $result as $value ) {
      $csv .=  "\"" . $value['order_id'] . "\",";
      $csv .=  "\"" . $value['create_date'] . "\",";
      $csv .=  "\"" . $value['customer_id'] . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['order_name01']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['order_name02']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['order_kana01']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['order_kana02']) . "\",";
      $csv .=  "\"" . $value['order_zip01'] . "\",";
      $csv .=  "\"" . $value['order_zip02'] . "\",";
      $csv .=  "\"" . $value['name'] . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['order_addr01']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['order_addr02']) . "\",";
      $csv .=  "\"" . $value['order_tel01'] . "\",";
      $csv .=  "\"" . $value['order_tel02'] . "\",";
      $csv .=  "\"" . $value['order_tel03'] . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['order_email']) . "\",";
      $csv .=  "\"" . $value['payment_method'] . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['message']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['note']) . "\",";
      $csv .=  "\"" . $value['shipping_date'] . "\",";
      $csv .=  "\"" . $value['shipping_time'] . "\",";
      $csv .=  "\"" . $value['deliv'] . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['shipping_name01']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['shipping_name02']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['shipping_kana01']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['shipping_kana02']) . "\",";
      $csv .=  "\"" . $value['shipping_zip01'] . "\",";
      $csv .=  "\"" . $value['shipping_zip02'] . "\",";
      $csv .=  "\"" . $value['pref_name'] . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['shipping_addr01']) . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['shipping_addr02']) . "\",";
      $csv .=  "\"" . $value['shipping_tel01'] . "\",";
      $csv .=  "\"" . $value['shipping_tel02'] . "\",";
      $csv .=  "\"" . $value['shipping_tel03'] . "\",";
      $csv .=  "\"" . $value['product_code'] . "\",";
      $csv .=  "\"" . str_replace('"', '""', $value['product_name']) . "\",";
      $csv .=  "\"" . $value['quantity'] . "\",";
      $csv .=  "\"" . $value['price'] . "\",";
      $csv .=  "\"" . $value['tax'] . "\",";
      $csv .=  "\"" . $value['subtotal'] . "\",";
      $csv .=  "\"" . $value['deliv_fee'] . "\",";
      $csv .=  "\"" . $value['charge'] . "\",";
      $csv .=  "\"" . $value['total'] . "\",";
      $csv .=  "\"" . $value['use_point'] . "\",";
      $csv .=  "\"" . $value['discount'] . "\",";
      $csv .=  "\"" . $value['payment_total'] . "\",";
      $csv .=  "\"" . $value['add_point'] . "\"";
      $csv .=  "\n";
    }

    $this->log($csv,LOG_DEBUG);
    $csv =  mb_convert_encoding($csv,"SJIS-win","utf-8");

    // CSVファイル出力
    $this->response->body($csv);
    return;
  }

  private function createSql($objParam){

    $strSQL = "";

    $strSQL = $strSQL . "SELECT";
    $strSQL = $strSQL . "  DO.order_id,";
    $strSQL = $strSQL . "  DO.create_date,";
    // $strSQL = $strSQL . "  DO.customer_id,";
    $strSQL = $strSQL . "  \"\" customer_id,";
    $strSQL = $strSQL . "  DO.order_name01,";
    $strSQL = $strSQL . "  DO.order_name02,";
    $strSQL = $strSQL . "  DO.order_kana01,";
    $strSQL = $strSQL . "  DO.order_kana02,";
    $strSQL = $strSQL . "  DO.order_zip01,";
    $strSQL = $strSQL . "  DO.order_zip02,";
    $strSQL = $strSQL . "  MP.name,";
    $strSQL = $strSQL . "  DO.order_addr01,";
    $strSQL = $strSQL . "  DO.order_addr02,";
    $strSQL = $strSQL . "  DO.order_tel01,";
    $strSQL = $strSQL . "  DO.order_tel02,";
    $strSQL = $strSQL . "  DO.order_tel03,";
    $strSQL = $strSQL . "  DO.order_email,";
    $strSQL = $strSQL . "  DO.payment_method,";
    $strSQL = $strSQL . "  DO.message,";
    $strSQL = $strSQL . "  DO.note,";
    $strSQL = $strSQL . "  DATE_FORMAT(DSH.shipping_date,'%Y-%m-%d') shipping_date,";
    $strSQL = $strSQL . "  DSH.shipping_time,";
    $strSQL = $strSQL . "  \"宅配便\" deliv,";
    // $strSQL = $strSQL . "  \"\" deliv,";
    $strSQL = $strSQL . "  DSH.shipping_name01,";
    $strSQL = $strSQL . "  DSH.shipping_name02,";
    $strSQL = $strSQL . "  DSH.shipping_kana01,";
    $strSQL = $strSQL . "  DSH.shipping_kana02,";
    $strSQL = $strSQL . "  DSH.shipping_zip01,";
    $strSQL = $strSQL . "  DSH.shipping_zip02,";
    $strSQL = $strSQL . "  MP2.name pref_name,";
    $strSQL = $strSQL . "  DSH.shipping_addr01,";
    $strSQL = $strSQL . "  DSH.shipping_addr02,";
    $strSQL = $strSQL . "  DSH.shipping_tel01,";
    $strSQL = $strSQL . "  DSH.shipping_tel02,";
    $strSQL = $strSQL . "  DSH.shipping_tel03,";
    $strSQL = $strSQL . "  DOD.product_code,";
    $strSQL = $strSQL . "  DOD.product_name,";
    $strSQL = $strSQL . "  DOD.quantity,";
    $strSQL = $strSQL . "  DOD.price,";
    $strSQL = $strSQL . "  DO.tax,";
    $strSQL = $strSQL . "  DO.subtotal,";
    $strSQL = $strSQL . "  DO.deliv_fee,";
    $strSQL = $strSQL . "  DO.charge,";
    $strSQL = $strSQL . "  DO.total,";
    // $strSQL = $strSQL . "  DO.use_point,";
    $strSQL = $strSQL . "  0 use_point,";
    $strSQL = $strSQL . "  DO.discount,";
    $strSQL = $strSQL . "  DO.payment_total,";
    // $strSQL = $strSQL . "  DO.add_point,";
    $strSQL = $strSQL . "  0 add_point,";
    $strSQL = $strSQL . "  MOS.name status_name ";
    $strSQL = $strSQL . "FROM";
    $strSQL = $strSQL . "  dtb_order DO";
    $strSQL = $strSQL . "  LEFT JOIN dtb_order_detail DOD ";
    $strSQL = $strSQL . "    ON DO.order_id = DOD.order_id ";
    $strSQL = $strSQL . "  LEFT JOIN dtb_shipping DS";
    $strSQL = $strSQL . "    ON DO.order_id = DS.order_id";
    $strSQL = $strSQL . "  LEFT JOIN mtb_pref MP";
    $strSQL = $strSQL . "    ON DO.order_pref = MP.id";
    $strSQL = $strSQL . "  LEFT JOIN dtb_shipping DSH";
    $strSQL = $strSQL . "    ON DO.order_id = DSH.order_id ";
    $strSQL = $strSQL . "  LEFT JOIN mtb_pref MP2";
    $strSQL = $strSQL . "    ON DSH.shipping_pref = MP2.id";
    $strSQL = $strSQL . "  LEFT JOIN mtb_order_status MOS";
    $strSQL = $strSQL . "    ON DO.status = MOS.id ";
    $strSQL = $strSQL . "WHERE ";
    $strSQL = $strSQL . "1=1 ";
    if (isset($objParam['create_date_from']) && $objParam['create_date_from']<>"" && $objParam['create_date_to']==="") {
      $strSQL = $strSQL . " AND DO.create_date >= '".$objParam['create_date_from'] . " 00:00:00' ";
      $strSQL = $strSQL . " AND DO.create_date <= '".$objParam['create_date_from'] . " 24:00:00' ";
    }
    if (isset($objParam['create_date_from']) && $objParam['create_date_from']<>"" && $objParam['create_date_to']<>"") {
      $strSQL = $strSQL . " AND DO.create_date >= '".$objParam['create_date_from'] . " 00:00:00' ";
      $strSQL = $strSQL . " AND DO.create_date <= '".$objParam['create_date_to'] . " 24:00:00' ";
    }
    if (isset($objParam['order_id_from']) && $objParam['order_id_from']<>"" && $objParam['order_id_to']==="") {
      $strSQL = $strSQL . " AND DO.order_id = '".$objParam['order_id_from'] . "' ";
    }
    if (isset($objParam['order_id_from']) && $objParam['order_id_from']<>"" && $objParam['order_id_to']<>"") {
      $strSQL = $strSQL . " AND DO.order_id >= '".$objParam['order_id_from'] . "' ";
      $strSQL = $strSQL . " AND DO.order_id <= '".$objParam['order_id_to'] . "' ";
    }
    if (isset($objParam['status_id']) && $objParam['status_id']<>"") {
      $strSQL = $strSQL . " AND DO.status = '".$objParam['status_id'] . "' ";
    }
    $strSQL = $strSQL . "ORDER BY";
    $strSQL = $strSQL . "  DO.order_id;";
    $this->log("クエリー".$strSQL, LOG_DEBUG);
    return $strSQL;
  }

  private function createSql_SelectOrderStatus(){
    $strSQL = "";
    $strSQL = $strSQL . "SELECT ";
    $strSQL = $strSQL . "  id,";
    $strSQL = $strSQL . "  name ";
    // $strSQL = $strSQL . "  rank ";
    $strSQL = $strSQL . "FROM";
    $strSQL = $strSQL . "  mtb_order_status ";
    $strSQL = $strSQL . "ORDER BY";
    $strSQL = $strSQL . "  rank;";

    return $strSQL;
  }
}
