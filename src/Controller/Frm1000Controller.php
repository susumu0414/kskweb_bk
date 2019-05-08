<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class Frm1000Controller extends AppController
{
  public function initialize() {
    parent::initialize();

    // コンポーネントの読み込み
    $this->loadComponent('Common');

    //権限チェック

    // t_uriテーブルのモデル呼び出し
    $this->loadModel('TUri');

    // レイアウトの設定
    $this->viewBuilder()->setLayout('kskweb_default');
  }

  public function index() {
    $t_uri=[];
    if ($this->request->is('post')) {
      // t_uriテーブルから更新履歴情報取得
      $t_uri = $this->TUri->find('all')->limit(10);
      $this->log($t_uri, LOG_DEBUG);
      $this->set('t_uri',$t_uri);
    }
    else{
      $this->set('t_uri',$t_uri);
    }
  }
}
