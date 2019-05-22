<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * Common component
 */
class CommonComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function initialize(array $config) {
      parent::initialize($config);

      // コンポーネント内でセッション変数を使うためにコントローラの取得が必要
      $this->controller = $this->_registry->getController();
      $this->session = $this->controller->request->session();

      $this->MkPages = TableRegistry::get('MkPages');
      $this->MkAuthpages = TableRegistry::get('MkAuthpages');
    }

    public function checkAuth($file_name)
    {
      // セッション変数からログイン情報取得
      $tan_cd=$this->session->read('MTanto.tan_cd');
      $auth_kbn=$this->session->read('MTanto.auth_kbn');

      // mk_pagesテーブルから取得
      $mk_authpages = $this->MkAuthpages->find('all',
        array('conditions'=>
        array('auth_kbn'=>$auth_kbn,'MkPages.file_nm'=>$file_name)))
        ->contain('MkPages');
      if (!$mk_authpages->isEmpty()) {
        $result=$mk_authpages->toarray();
        return $result[0]->mk_page->page_nm;
      }
      else{
        return false;
      }
    }
}
