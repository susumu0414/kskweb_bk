<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class TopController extends AppController
{
  public function initialize() {
    parent::initialize();
    // テーブルのモデル呼び出し
    $this->loadModel('MkUpdatelogFiles');

    // レイアウトの設定
    $this->viewBuilder()->setLayout('kskweb_default');
  }

  public function index() {
    // 更新履歴情報取得
    $MkUpdatelogFiles = $this->MkUpdatelogFiles->find('all');
    $this->log($MkUpdatelogFiles, LOG_DEBUG);
    $this->set('mk_updatelog_files',$MkUpdatelogFiles);
  }
}
