<?php
namespace App\Controller;

use App\Controller\AppController;

class LoginController extends AppController
{
  public function initialize() {
    parent::initialize();
    // テーブルモデル呼び出し
    $this->loadModel('MTanto');
    $this->loadModel('MkAuthFiles');
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
      // $this->log($mtanto, LOG_DEBUG);
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

        // メニュー表示用リストの取得(セッション変数に格納)
        $this->menueSetSession($mtanto[0] -> auth_kbn);

        // トップ画面に遷移
        return $this->redirect(['controller' => 'Top', 'action' => 'index']);
      }
    } else {
      $this->set('message','please type...');
    }
  }

  private function menueSetSession($auth_kbn){
    // セッションオブジェクトの取得
    $session = $this->request->session();

    // 権限マスタからメニュー情報取得
    $mkAuthFile =[];
    $mkAuthFile = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
      ->where(["auth_kbn" =>$auth_kbn])
      ->andwhere(["MkPageFiles.menue_kbn" =>"serv"])
      ->andwhere(["MkPageFiles.del_flg" =>"0"])
      ->order(["MkPageFiles.menue_kbn","MkPageFiles.sort"])
      ->toArray();
    $session->write('SideMenue.serv', $mkAuthFile);

    $mkAuthFile =[];
    $mkAuthFile = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
      ->where(["auth_kbn" =>$auth_kbn])
      ->andwhere(["MkPageFiles.menue_kbn" =>"ec"])
      ->andwhere(["MkPageFiles.del_flg" =>"0"])
      ->order(["MkPageFiles.menue_kbn","MkPageFiles.sort"])
      ->toArray();
    $session->write('SideMenue.ec', $mkAuthFile);

    $mkAuthFile =[];
    $mkAuthFile = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
      ->where(["auth_kbn" =>$auth_kbn])
      ->andwhere(["MkPageFiles.menue_kbn" =>"acc"])
      ->andwhere(["MkPageFiles.del_flg" =>"0"])
      ->order(["MkPageFiles.menue_kbn","MkPageFiles.sort"])
      ->toArray();
    $session->write('SideMenue.acc', $mkAuthFile);

    $mkAuthFile =[];
    $mkAuthFile = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
      ->where(["auth_kbn" =>$auth_kbn])
      ->andwhere(["MkPageFiles.menue_kbn" =>"sys"])
      ->andwhere(["MkPageFiles.del_flg" =>"0"])
      ->order(["MkPageFiles.menue_kbn","MkPageFiles.sort"])
      ->toArray();
    $session->write('SideMenue.sys', $mkAuthFile);

    $mkAuthFile =[];
    $mkAuthFile = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
      ->where(["auth_kbn" =>$auth_kbn])
      ->andwhere(["MkPageFiles.menue_kbn" =>"pert"])
      ->andwhere(["MkPageFiles.del_flg" =>"0"])
      ->order(["MkPageFiles.menue_kbn","MkPageFiles.sort"])
      ->toArray();
    $session->write('SideMenue.pert', $mkAuthFile);

    $mkAuthFile =[];
    $mkAuthFile = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
      ->where(["auth_kbn" =>$auth_kbn])
      ->andwhere(["MkPageFiles.menue_kbn" =>"sale"])
      ->andwhere(["MkPageFiles.del_flg" =>"0"])
      ->order(["MkPageFiles.menue_kbn","MkPageFiles.sort"])
      ->toArray();
    $session->write('SideMenue.sale', $mkAuthFile);

    $mkAuthFile =[];
    $mkAuthFile = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
      ->where(["auth_kbn" =>$auth_kbn])
      ->andwhere(["MkPageFiles.menue_kbn" =>"logi"])
      ->andwhere(["MkPageFiles.del_flg" =>"0"])
      ->order(["MkPageFiles.menue_kbn","MkPageFiles.sort"])
      ->toArray();
    $session->write('SideMenue.logi', $mkAuthFile);

  }
}
