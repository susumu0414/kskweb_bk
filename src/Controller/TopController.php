<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class TopController extends AppController
{
  public function initialize() {
    parent::initialize();
    // tk_updatelogsテーブルのモデル呼び出し
    $this->loadModel('TkUpdatelogFiles');

    // レイアウトの設定
    $this->viewBuilder()->setLayout('kskweb_default');
  }

  public function index() {
    // tk_updatelogsテーブルから更新履歴情報取得
    $TkUpdatelogFiles = $this->TkUpdatelogFiles->find('all');
    $this->log($TkUpdatelogFiles, LOG_DEBUG);
    $this->set('tk_updatelog_files',$TkUpdatelogFiles);
  }
}
