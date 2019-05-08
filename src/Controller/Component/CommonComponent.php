<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

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

    public function checkAuth($file_name)
    {
      $this->Hogege = TableRegistry::get('Hogege');

      // セッション変数からログイン情報取得
      $tan_cd=$this->getRequest()->getSession()->read('MTanto.tan_cd');
      $auth_kbn=$this->getRequest()->getSession()->read('MTanto.auth_kbn');

    }
}
