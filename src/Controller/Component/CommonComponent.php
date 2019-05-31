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

      $this->MkPageFiles = TableRegistry::get('MkPageFiles');
      $this->MkAuthFiles = TableRegistry::get('MkAuthFiles');
    }

    public function checkAuth($file_name)
    {
      // セッション変数からログイン情報取得
      $tan_cd=$this->session->read('MTanto.tan_cd');
      $auth_kbn=$this->session->read('MTanto.auth_kbn');

      // mk_auth_filesテーブルから取得
      $mkAuthFiles = $this->MkAuthFiles->find()->contain(['MkPageFiles'])
        ->where(["auth_kbn" =>$auth_kbn])
        ->andwhere(["MkPageFiles.file_nm" =>$file_name])
        ->andwhere(["MkPageFiles.del_flg" =>"0"])
        ->toArray();
      if (isset($mkAuthFiles)) {
        $result=$mkAuthFiles;
        $this->log($result, LOG_DEBUG);
        // ページ名称を戻り値にセット
        return $result[0]['mk_page_file']['page_nm'];
      }
      else {
        return false;
      }
    }
}
