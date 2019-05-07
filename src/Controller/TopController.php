<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class TopController extends AppController
{
  public function initialize() {
    parent::initialize();
    // tk_updatelogsテーブルのモデル呼び出し
    $this->loadModel('TkUpdatelogs');
    // mkCategoriesテーブルのモデル呼び出し
    $this->loadModel('MkCategories');

    // レイアウトの設定
    $this->viewBuilder()->setLayout('kskweb_default');
  }

  public function index() {
    // tk_updatelogsテーブルから更新履歴情報取得
    $tk_updatelogs = $this->TkUpdatelogs->find('all');
    $this->log($tk_updatelogs, LOG_DEBUG);
    $this->set('tk_updatelogs',$tk_updatelogs);

    $mk_Categories = TableRegistry::getTableLocator()->get('mkCategories');

    // $this->set('mk_Categories',$this->mkCategories->find('all'));

    $datas = $mk_Categories
      ->find('treeList');
        // ->find('children', ['for' => 1])
        // ->find('threaded')
        // ->toArray();
    $this->set('mk_Categories',$datas);
  }
}
