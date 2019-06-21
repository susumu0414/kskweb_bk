<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

// EXCEL用
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Style;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Frmsv0100Controller extends AppController
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
    }
    // 印刷ボタン押下時処理
    if (isset($this->request->data['btn_nm'])=="btn_print"){
      if(empty($this->request->data['jyucyu_no'])){
        $this->Flash->set('受注番号を入力してください。'); //メッセージをセット
        return;
      }
      // $this->autoRender = FALSE;
      $connection = ConnectionManager::get('kskdb');
      // クエリー生成(メソッド呼び出しはメソッド名の前に$this->が必要)
      $query=$this->createSql($this->request->data);
      $result = $connection->query($query)->fetchAll('assoc');

      // EXCELファイル出力
      $this->outputExcel($result,$this->request->data);
      // 操作履歴テーブルに登録
      $this->Common->registOpehis(basename(__FILE__),implode($this->request->data),$query);
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
    $strSQL = $strSQL . "  AND TJ.jyucyu_no = ". $objParam['jyucyu_no'] . " ";
    // ロケーションの先頭2ケタが数字のもの
    $strSQL = $strSQL . "  AND MJH.location_no ~ '^[0-9][0-9]' ";
    $strSQL = $strSQL . "ORDER BY";
    $strSQL = $strSQL . "  MJH.location_no,";
    $strSQL = $strSQL . "  TJM.row_no";

    return $strSQL;
  }


  private function outputExcel($result,$objParam){

    $reader = new XlsxReader();
    $spreadsheet = $reader->load(ROOT .'/EXCEL/Shipping(jyucyu_no).xlsm'); //雛形EXCEL読込
    $sheet = $spreadsheet->getActiveSheet();

    // セル番地で書く
    $sheet->setCellValue('E3', $result[0]['jyucyu_no']);
    $sheet->setCellValue('P3', $objParam['biko']);
    $sheet->setCellValue('E4', $result[0]['tk_cd']);
    $sheet->setCellValue('P4', $result[0]['tokusaki_nm']);
    $sheet->setCellValue('E5', $result[0]['tk_eda_cd']);
    $sheet->setCellValue('P5', $result[0]['nonyusaki_nm']);
    $sheet->setCellValue('E6', $result[0]['biko']);
    $sheet->setCellValue('E7', $result[0]['biko2']);
    $sheet->setCellValue('E8', $result[0]['biko3']);

    $i_rowcnt=1;
    $i_loop = 12;
    foreach($result as $row){
      $sheet->setCellValue('A'.$i_loop, $i_rowcnt);
      $sheet->setCellValue('C'.$i_loop, $row['location_no']);
      if($row['shin_cd']<>"" && $row['jhin_cd']<>$row['shin_cd']){
        $sheet->setCellValue('F'.$i_loop, "★");
      }
      $sheet->setCellValue('G'.$i_loop, $row['shin_cd']);
      $sheet->setCellValue('M'.$i_loop, $row['jyucyu_su']);
      if($row['zaiko_su'] <10 ){
        $sheet->setCellValue('O'.$i_loop, $row['zaiko_su']);
      }
      $sheet->setCellValue('R'.$i_loop, $row['hin_nm']);
      $sheet->setCellValue('AB'.$i_loop, $row['jhin_cd']);

      if ($i_loop%2==0){
        // 偶数行はなにもしない
      }
      else {
        // 奇数行背景をぬる
        // セルの範囲を指定して、スタイルを反映
        $sheet->getStyle('A'.$i_loop.':AE'.$i_loop)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('e1e2fa');
      }
      $i_loop = $i_loop + 1;
      $i_rowcnt = $i_rowcnt + 1;
    }

    //ダウンロード用
    header("Content-Description: File Transfer");
    $work = "Content-Disposition: attachment;filename=出庫指示書(受注番号)_".$result[0]['jyucyu_no']. ".xlsm";
    header($work);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');

    ob_end_clean(); //バッファ消去

    $writer = new XlsxWriter($spreadsheet);
    $writer->save('php://output');
    exit;
  }
}
