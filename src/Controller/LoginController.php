<?php
namespace App\Controller;

use App\Controller\AppController;

class LoginController extends AppController
{
  public function initialize() {
    parent::initialize();
    // m_tantoテーブルのモデル呼び出し
    $this->loadModel('MTanto');
  }

  public function index()
  {
    $tan_cd = $this->request->data('tan_cd');
    if ($tan_cd != null){
      // パラメータの受取り
      $tan_cd = $this->request->data['tan_cd'];
      $user_pass = $this->request->data['user_pass'];
      // m_tantoテーブルからユーザ情報取得
      $mtanto = $this->MTanto->find()
        ->where(["tan_cd" =>$tan_cd])
        ->andwhere(["user_pass" =>$user_pass])
        ->toArray();
      $this->log($mtanto, LOG_DEBUG);
      if (empty($mtanto)){
        // データ取得できなかった
        $this->set('message','ユーザIDまたはパスワードに誤りがあります。');
      }
      else{
        // ログイン成功時セッションにユーザ情報を格納
        // セッションオブジェクトの取得
        $session = $this->request->session();
        // セッションデータの書き込み
        $session->write('MTanto.tan_cd', $mtanto[0] -> tan_cd);
        $session->write('MTanto.tan_nm', $mtanto[0] -> tan_nm);
        $session->write('MTanto.auth_kbn', $mtanto[0] -> auth_kbn);
        // トップ画面に遷移
        return $this->redirect(['controller' => 'Top', 'action' => 'index']);
      }
    } else {
      $this->set('message','please type...');
    }
  }
}
