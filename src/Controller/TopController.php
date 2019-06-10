<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class TopController extends AppController
{
  public function initialize() {
    parent::initialize();
    // テーブルのモデル呼び出し
    $this->loadModel('MkReleasenoteFiles');
    $this->loadModel('MkNewsFiles');

    // レイアウトの設定
    $this->viewBuilder()->setLayout('kskweb_default');
  }

  public function index() {
    // お知らせ情報取得
    $MkNewsFiles = $this->MkNewsFiles->find('all',array('limit' => 1))->toArray();
    $this->log($MkNewsFiles, LOG_DEBUG);
    // 更新履歴情報取得
    $MkReleasenoteFiles = $this->MkReleasenoteFiles->find('all',array('order' =>'release_ymd desc'))->toArray();
    // $this->log($MkReleasenoteFiles, LOG_DEBUG);
    $this->set('mk_news_files',$MkNewsFiles);
    $this->set('mk_updatelog_files',$MkReleasenoteFiles);
  }
}
