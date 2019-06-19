<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class Frmsv2100Controller extends AppController
{
  public function initialize() {
    parent::initialize();
    // コンポーネントの読み込み
    $this->loadComponent('Common');
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
    }
  }

  public function getAjaxData() {
    $this->autoRender = FALSE;
    if($this->request->is('ajax')) {
      $result = [];

      $connection = ConnectionManager::get('kskdb');
      // クエリー生成(メソッド呼び出しはメソッド名の前に$this->が必要)
      $query=$this->createSql($this->request->data);
      $result = $connection->query($query)->fetchAll('assoc');

      // 検索結果をセット
      header('Content-Type: application/json');
      // echo json_encode($result);
      $this->response->body(json_encode($result));
    }
  }

  private function createSql($objParam){

    $strSQL = "";

    $strSQL = $strSQL . "SELECT";
    $strSQL = $strSQL . "  TU.ymd,";
    $strSQL = $strSQL . "  TU.den_no,";
    $strSQL = $strSQL . "  TUM.row_no,";
    $strSQL = $strSQL . "  CASE";
    $strSQL = $strSQL . "    WHEN TU.den_kbn = '10'";
    $strSQL = $strSQL . "      THEN '1'";
    $strSQL = $strSQL . "    WHEN TU.den_kbn = '11'";
    $strSQL = $strSQL . "      THEN '2'";
    $strSQL = $strSQL . "    END den_kbn,";
    $strSQL = $strSQL . "  '株式会社 上州屋' tokusaki_nm,";
    $strSQL = $strSQL . "  TU.tk_eda_cd,";
    $strSQL = $strSQL . "  TU.nonyusaki_nm,";
    $strSQL = $strSQL . "  '089700' torihikisaki_cd,";
    $strSQL = $strSQL . "  '株式会社 キサカ' torihikisaki_nm,";
    $strSQL = $strSQL . "  TUM.jhin_cd,";
    $strSQL = $strSQL . "  TUM.hin_nm,";
    $strSQL = $strSQL . "  TUM.suryo,";
    $strSQL = $strSQL . "  TUM.tanka,";
    $strSQL = $strSQL . "  TUM.kingaku,";
    $strSQL = $strSQL . "  TUM.htanka,";
    $strSQL = $strSQL . "  TUM.htanka * TUM.suryo htanka_sum,";
    $strSQL = $strSQL . "  TU.unchin,";
    $strSQL = $strSQL . "  '2000150150004' syouhin_cd,";
    $strSQL = $strSQL . "  substring(TU.ymd FROM 3 FOR 2) yy,";
    $strSQL = $strSQL . "  substring(TU.ymd FROM 5 FOR 2) mm,";
    $strSQL = $strSQL . "  substring(TU.ymd FROM 7 FOR 2) dd";
    $strSQL = $strSQL . " FROM";
    $strSQL = $strSQL . "  t_uri TU";
    $strSQL = $strSQL . "  LEFT JOIN t_uri_m TUM";
    $strSQL = $strSQL . "    ON TU.den_no = TUM.den_no";
    $strSQL = $strSQL . " WHERE ";
    $strSQL = $strSQL . "1=1 ";
    $strSQL = $strSQL . " AND TU.tk_cd = '897'";
    if (isset($objParam['YMD_From']) && $objParam['YMD_From']<>"" && $objParam['YMD_To']==="") {
      $strSQL = $strSQL . " AND TU.ymd = '".str_replace('/','',$objParam['YMD_From']) . "' ";
    }
    if (isset($objParam['YMD_From']) && $objParam['YMD_From']<>"" && $objParam['YMD_To']<>"") {
      $strSQL = $strSQL . " AND TU.ymd >= '".str_replace('/','',$objParam['YMD_From']) . "' ";
      $strSQL = $strSQL . " AND TU.ymd <= '".str_replace('/','',$objParam['YMD_To']) . "' ";
    }
    if (isset($objParam['den_no']) && $objParam['den_no']<>"") {
      $strSQL = $strSQL . " AND TU.den_no = '".$objParam['den_no'] . "' ";
    }
    $strSQL = $strSQL . " ORDER BY ";
    $strSQL = $strSQL . "  TU.ymd,";
    $strSQL = $strSQL . "  TU.den_no,";
    $strSQL = $strSQL . "  TUM.row_no;";
    return $strSQL;
  }
}
