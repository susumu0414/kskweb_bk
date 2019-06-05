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
    $this->loadModel('MkPageFiles');
    $this->loadModel('MkMenueFiles');
    $this->loadModel('MkMenueKbnFiles');

    // sessionの初期化
    $this->request->session()->destroy();
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

    // マスタからメニュー情報取得(ここは改良の余地あり)
    $query = $this->MkMenueKbnFiles->find()
      ->join(['m'=>['table' => 'mk_menue_files','type'=>'left','conditions'=>'m.mk_menue_kbn_file_id = MkMenueKbnFiles.id']])
      ->join(['p'=>['table' => 'mk_page_files','type'=>'left','conditions'=>'p.id = m.mk_page_file_id']])
      ->join(['a'=>['table' => 'mk_auth_files','type'=>'left','conditions'=>'a.mk_page_file_id = p.id']])
      ->where(['a.auth_kbn' =>$auth_kbn])
      ->andwhere(['MkMenueKbnFiles.menue_kbn'=>"service"])
      ->andwhere(["p.del_flg !=" =>"1"])
      ->order(["p.sort"])
      ->select ([
        'id_page'=>'p.id_page',
        'page_nm'=>'p.page_nm',
        'url'=>'p.url',
        'file_nm'=>'p.file_nm',
      ])
      ->toArray();

    $session->write('SideMenue.service', $query);

    $query = $this->MkMenueKbnFiles->find()
      ->join(['m'=>['table' => 'mk_menue_files','type'=>'left','conditions'=>'m.mk_menue_kbn_file_id = MkMenueKbnFiles.id']])
      ->join(['p'=>['table' => 'mk_page_files','type'=>'left','conditions'=>'p.id = m.mk_page_file_id']])
      ->join(['a'=>['table' => 'mk_auth_files','type'=>'left','conditions'=>'a.mk_page_file_id = p.id']])
      ->where(['a.auth_kbn' =>$auth_kbn])
      ->andwhere(['MkMenueKbnFiles.menue_kbn'=>"ec"])
      ->andwhere(["p.del_flg !=" =>"1"])
      ->order(["p.sort"])
      ->select ([
        'id_page'=>'p.id_page',
        'page_nm'=>'p.page_nm',
        'url'=>'p.url',
        'file_nm'=>'p.file_nm',
      ])
      ->toArray();

    $session->write('SideMenue.ec', $query);

    $query = $this->MkMenueKbnFiles->find()
      ->join(['m'=>['table' => 'mk_menue_files','type'=>'left','conditions'=>'m.mk_menue_kbn_file_id = MkMenueKbnFiles.id']])
      ->join(['p'=>['table' => 'mk_page_files','type'=>'left','conditions'=>'p.id = m.mk_page_file_id']])
      ->join(['a'=>['table' => 'mk_auth_files','type'=>'left','conditions'=>'a.mk_page_file_id = p.id']])
      ->where(['a.auth_kbn' =>$auth_kbn])
      ->andwhere(['MkMenueKbnFiles.menue_kbn'=>"acc"])
      ->andwhere(["p.del_flg !=" =>"1"])
      ->order(["p.sort"])
      ->select ([
        'id_page'=>'p.id_page',
        'page_nm'=>'p.page_nm',
        'url'=>'p.url',
        'file_nm'=>'p.file_nm',
      ])
      ->toArray();

    $session->write('SideMenue.acc', $query);

    $query = $this->MkMenueKbnFiles->find()
      ->join(['m'=>['table' => 'mk_menue_files','type'=>'left','conditions'=>'m.mk_menue_kbn_file_id = MkMenueKbnFiles.id']])
      ->join(['p'=>['table' => 'mk_page_files','type'=>'left','conditions'=>'p.id = m.mk_page_file_id']])
      ->join(['a'=>['table' => 'mk_auth_files','type'=>'left','conditions'=>'a.mk_page_file_id = p.id']])
      ->where(['a.auth_kbn' =>$auth_kbn])
      ->andwhere(['MkMenueKbnFiles.menue_kbn'=>"parts"])
      ->andwhere(["p.del_flg !=" =>"1"])
      ->order(["p.sort"])
      ->select ([
        'id_page'=>'p.id_page',
        'page_nm'=>'p.page_nm',
        'url'=>'p.url',
        'file_nm'=>'p.file_nm',
      ])
      ->toArray();

    $session->write('SideMenue.parts', $query);

    $query = $this->MkMenueKbnFiles->find()
      ->join(['m'=>['table' => 'mk_menue_files','type'=>'left','conditions'=>'m.mk_menue_kbn_file_id = MkMenueKbnFiles.id']])
      ->join(['p'=>['table' => 'mk_page_files','type'=>'left','conditions'=>'p.id = m.mk_page_file_id']])
      ->join(['a'=>['table' => 'mk_auth_files','type'=>'left','conditions'=>'a.mk_page_file_id = p.id']])
      ->where(['a.auth_kbn' =>$auth_kbn])
      ->andwhere(['MkMenueKbnFiles.menue_kbn'=>"system"])
      ->andwhere(["p.del_flg !=" =>"1"])
      ->order(["p.sort"])
      ->select ([
        'id_page'=>'p.id_page',
        'page_nm'=>'p.page_nm',
        'url'=>'p.url',
        'file_nm'=>'p.file_nm',
      ])
      ->toArray();

    $session->write('SideMenue.system', $query);

    $query = $this->MkMenueKbnFiles->find()
      ->join(['m'=>['table' => 'mk_menue_files','type'=>'left','conditions'=>'m.mk_menue_kbn_file_id = MkMenueKbnFiles.id']])
      ->join(['p'=>['table' => 'mk_page_files','type'=>'left','conditions'=>'p.id = m.mk_page_file_id']])
      ->join(['a'=>['table' => 'mk_auth_files','type'=>'left','conditions'=>'a.mk_page_file_id = p.id']])
      ->where(['a.auth_kbn' =>$auth_kbn])
      ->andwhere(['MkMenueKbnFiles.menue_kbn'=>"sales"])
      ->andwhere(["p.del_flg !=" =>"1"])
      ->order(["p.sort"])
      ->select ([
        'id_page'=>'p.id_page',
        'page_nm'=>'p.page_nm',
        'url'=>'p.url',
        'file_nm'=>'p.file_nm',
      ])
      ->toArray();

    $session->write('SideMenue.sales', $query);

    $query = $this->MkMenueKbnFiles->find()
      ->join(['m'=>['table' => 'mk_menue_files','type'=>'left','conditions'=>'m.mk_menue_kbn_file_id = MkMenueKbnFiles.id']])
      ->join(['p'=>['table' => 'mk_page_files','type'=>'left','conditions'=>'p.id = m.mk_page_file_id']])
      ->join(['a'=>['table' => 'mk_auth_files','type'=>'left','conditions'=>'a.mk_page_file_id = p.id']])
      ->where(['a.auth_kbn' =>$auth_kbn])
      ->andwhere(['MkMenueKbnFiles.menue_kbn'=>"logi"])
      ->andwhere(["p.del_flg !=" =>"1"])
      ->order(["p.sort"])
      ->select ([
        'id_page'=>'p.id_page',
        'page_nm'=>'p.page_nm',
        'url'=>'p.url',
        'file_nm'=>'p.file_nm',
      ])
      ->toArray();

    $session->write('SideMenue.logi', $query);

  }
}
