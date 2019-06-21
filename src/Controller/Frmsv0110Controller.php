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

class Frmsv0110Controller extends AppController
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
      if(empty($this->request->data['work_no'])){
        $this->Flash->set('受注番号を入力してください。'); //メッセージをセット
        return;
      }
      // $this->autoRender = FALSE;
      $connection = ConnectionManager::get('kskdb');
      // クエリー生成(メソッド呼び出しはメソッド名の前に$this->が必要)
      $query=$this->createSql($this->request->data);
      $result = $connection->query($query)->fetchAll('assoc');

      // 操作履歴テーブルに登録
      $this->Common->registOpehis(basename(__FILE__),implode($this->request->data),$query);
      // EXCELファイル出力
      $this->outputExcel($result,$this->request->data);
    }
  }

  public function getAjaxData() {
    $this->autoRender = FALSE;
    if($this->request->is('ajax')) {
      $result = [];

      // $this->log("パラメータ".$this->request->data['work_no'], LOG_DEBUG);
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
    $strSQL = $strSQL . "  MSB.work_no,";
    $strSQL = $strSQL . "  TWC.uketuke_date,";
    $strSQL = $strSQL . "  TWC.tk_cd,";
    $strSQL = $strSQL . "  TWC.tk_eda_cd,";
    $strSQL = $strSQL . "  TWC.tokusaki_nm,";
    $strSQL = $strSQL . "  TWC.nonyusaki_nm,";
    $strSQL = $strSQL . "  MSB.kbn,";
    $strSQL = $strSQL . "  MSB.hin_furi_kbn,";
    $strSQL = $strSQL . "  MSB.input_hin_cd,";
    $strSQL = $strSQL . "  MSB.work_c_hin,";
    $strSQL = $strSQL . "  MSB.hin_nm,";
    $strSQL = $strSQL . "  MSB.suryo,";
    $strSQL = $strSQL . "  MJH.location_no,";
    $strSQL = $strSQL . "  MS.now_stock - MS.order_su zaiko_su ";
    $strSQL = $strSQL . "FROM";
    $strSQL = $strSQL . "  m_sagyo_buhin MSB";
    $strSQL = $strSQL . "  LEFT JOIN t_work_card TWC";
    $strSQL = $strSQL . "    ON MSB.work_no = TWC.work_no";
    $strSQL = $strSQL . "  LEFT JOIN m_hin MH";
    $strSQL = $strSQL . "    ON MSB.work_c_hin = MH.hin_cd";
    $strSQL = $strSQL . "  LEFT JOIN m_j_hin MJH";
    $strSQL = $strSQL . "    ON MH.zhin_cd = MJH.hin_cd";
    $strSQL = $strSQL . "  LEFT JOIN m_stock MS";
    $strSQL = $strSQL . "    ON MJH.hin_cd = MS.hin_cd ";
    $strSQL = $strSQL . "WHERE";
    $strSQL = $strSQL . "  1 = 1";
    $strSQL = $strSQL . "  AND MSB.work_no = ". $objParam['work_no'];
    $strSQL = $strSQL . "  AND COALESCE(MSB.kbn, '') <> '1' ";
    // ロケーションの先頭2ケタが数字のもの
    // $strSQL = $strSQL . "  AND MJH.location_no ~ '^[0-9][0-9]' ";
    $strSQL = $strSQL . "ORDER BY";
    $strSQL = $strSQL . "  MJH.location_no,";
    $strSQL = $strSQL . "  MSB.row_no";

    return $strSQL;

  }


  private function outputExcel($result,$objParam){

    $reader = new XlsxReader();
    $spreadsheet = $reader->load(ROOT .'/EXCEL/Shipping(sagyo_no).xlsm'); //雛形EXCEL読込
    $sheet = $spreadsheet->getActiveSheet();

    // セル番地で書く
    $sheet->setCellValue('E3', $result[0]['work_no']);
    $sheet->setCellValue('P3', $objParam['biko']);
    $sheet->setCellValue('E4', $result[0]['tk_cd']);
    $sheet->setCellValue('P4', $result[0]['tokusaki_nm']);
    $sheet->setCellValue('E5', $result[0]['tk_eda_cd']);
    $sheet->setCellValue('P5', $result[0]['nonyusaki_nm']);

    $i_rowcnt=1;
    $i_loop = 12;
    foreach($result as $row){
      $sheet->setCellValue('A'.$i_loop, $i_rowcnt);
      $sheet->setCellValue('C'.$i_loop, $row['location_no']);
      if($row['hin_furi_kbn']=="1"){
        $sheet->setCellValue('F'.$i_loop, "★");
      }
      $sheet->setCellValue('G'.$i_loop, $row['work_c_hin']);
      $sheet->setCellValue('M'.$i_loop, $row['suryo']);
      if($row['zaiko_su'] <10 ){
        $sheet->setCellValue('O'.$i_loop, $row['zaiko_su']);
      }
      $sheet->setCellValue('R'.$i_loop, $row['hin_nm']);
      $sheet->setCellValue('AB'.$i_loop, $row['input_hin_cd']);

      if ($i_loop%2==0){
        // 偶数行はなにもしない
      }
      else {
        // 奇数行背景をぬる
        $sheet->getStyle('A'.$i_loop.':AE'.$i_loop)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('e1e2fa');
      }
      $i_loop = $i_loop + 1;
      $i_rowcnt = $i_rowcnt + 1;
    }

    //ダウンロード用
    header("Content-Description: File Transfer");
    $work = "Content-Disposition: attachment;filename=出庫指示書(作業カード)_".$result[0]['work_no']. ".xlsm";
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
