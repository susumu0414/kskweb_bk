<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class Frm1000Controller extends AppController
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
      exit;
    }
    else{
      // ページ名称をセット
      $this->set('page_nm',$ret);
    }
    // 印刷ボタン押下時処理
    if (isset($this->request->data['btn_nm'])=="btn_print"){
      
    }

  }

  public function getAjaxData() {
    $this->autoRender = FALSE;
    if($this->request->is('ajax')) {
      $result = [];

      $connection = ConnectionManager::get('kskdb');
      // 関数(メソッド)の呼び出し(メソッドの前に$this->が必要)
      $query=$this->createSql($this->request->data);
      $result = $connection->query($query)->fetchAll('assoc');
      // 検索結果をセット
      header('Content-Type: application/json');
      echo json_encode($result);
    }
  }


  private function createSql($objParam){

    $strSQL = "";

    $strSQL = $strSQL . "SELECT";
    $strSQL = $strSQL . "  TJ.jyucyu_no,";
    $strSQL = $strSQL . "  TJ.ymd,";
    $strSQL = $strSQL . "  TJ.tk_cd,";
    $strSQL = $strSQL . "  TJ.tk_eda_cd,";
    $strSQL = $strSQL . "  TJ.tokusaki_nm,";
    $strSQL = $strSQL . "  TJ.nonyusaki_nm,";
    $strSQL = $strSQL . "  TJ.biko,";
    $strSQL = $strSQL . "  TJ.biko2,";
    $strSQL = $strSQL . "  TJ.biko3,";
    $strSQL = $strSQL . "  TJM.row_no,";
    $strSQL = $strSQL . "  TJM.jhin_cd,";
    $strSQL = $strSQL . "  TJM.shin_cd,";
    $strSQL = $strSQL . "  TJM.hin_nm,";
    $strSQL = $strSQL . "  TJM.jyucyu_su,";
    $strSQL = $strSQL . "  MJH.location_no,";
    $strSQL = $strSQL . "  MS.now_stock - MS.order_su zaiko_su ";
    $strSQL = $strSQL . "FROM";
    $strSQL = $strSQL . "  t_jyucyu_denpyou TJ";
    $strSQL = $strSQL . "  LEFT JOIN t_jyucyu_meisai TJM";
    $strSQL = $strSQL . "    ON TJ.jyucyu_no = TJM.jyucyu_no";
    $strSQL = $strSQL . "  LEFT JOIN m_hin MH";
    $strSQL = $strSQL . "    ON TJM.shin_cd = MH.hin_cd";
    $strSQL = $strSQL . "  LEFT JOIN m_j_hin MJH";
    $strSQL = $strSQL . "    ON MH.zhin_cd = MJH.hin_cd";
    $strSQL = $strSQL . "  LEFT JOIN m_stock MS";
    $strSQL = $strSQL . "    ON MJH.hin_cd = MS.hin_cd ";
    $strSQL = $strSQL . "WHERE";
    $strSQL = $strSQL . "  1 = 1";
    $strSQL = $strSQL . "  AND TJ.jyucyu_no = '". $objParam['jyucyu_no'] . "' ";
    // ロケーションの先頭2ケタが数字のもの
    $strSQL = $strSQL . "  AND MJH.location_no ~ '^[0-9][0-9]' ";
    $strSQL = $strSQL . "ORDER BY";
    $strSQL = $strSQL . "  MJH.location_no,";
    $strSQL = $strSQL . "  TJM.row_no";

    $this->log("クエリー：".$strSQL, LOG_DEBUG);
    return $strSQL;
  }
}
