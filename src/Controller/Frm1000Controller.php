<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class Frm1000Controller extends AppController
{
  public function initialize() {
    parent::initialize();
    // t_uriテーブルのモデル呼び出し
    $this->loadModel('TUri');

    // レイアウトの設定
    $this->viewBuilder()->setLayout('kskweb_default');
  }

  public function index() {
    // tk_updatelogsテーブルから更新履歴情報取得
    $t_uri = $this->TUri->find('all')->limit(10);;
    $this->log($t_uri, LOG_DEBUG);
    $this->set('t_uri',$t_uri);
  }
}
