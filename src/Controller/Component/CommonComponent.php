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

    public function initialize(array $config) {
      parent::initialize($config);

      // コンポーネント内でセッション変数を使うためにコントローラの取得が必要
      $this->controller = $this->_registry->getController();
      $this->session = $this->controller->request->session();
    }

    public function checkAuth($file_name)
    {
      $this->log("ふぁいる名：".$file_name, LOG_DEBUG);

      // $this->Hogege = TableRegistry::get('Hogege');

      // セッション変数からログイン情報取得
      $tan_cd=$this->session->read('MTanto.tan_cd');
      $auth_kbn=$this->session->read('MTanto.auth_kbn');
      $this->log("たんとうしゃ：".$tan_cd, LOG_DEBUG);
      $this->log("けんげん：".$auth_kbn, LOG_DEBUG);
    }
}
