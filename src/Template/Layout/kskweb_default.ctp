<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>

  <head>
      <?= $this->Html->charset() ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.6/css/select.dataTables.css"/>

      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.5/js/dataTables.fixedColumns.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.6/js/dataTables.select.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

      <!-- サイドメニュー用jsファイル読み込み -->
      <?= $this->Html->script('side_menue',['block' => true]) ?>

      <title> <?= $this->fetch('title') ?> </title>
      <?= $this->Html->meta('icon') ?>

      <?= $this->Html->css('kisaka.css') ?>
      <?= $this->fetch('meta') ?>
      <?= $this->fetch('css') ?>
      <!-- 各ページごとのテンプレートファイルで呼び出すjsファイルを定義 -->
      <?= $this->fetch('script') ?>
  </head>

  <body>
    <!-- ヘッダーをElementファイルから読み込む -->
    <?= $this->element('header') ?>
    <!-- Flashメッセージを表示 -->
    <?= $this->Flash->render() ?>
    <div class="main_flxcont">
      <div class="main_flxitem1">
        <!-- サイドバーをElementファイルから読み込む -->
        <?= $this->element('side') ?>
      </div>
      <div class="main_flxitem2">
        <!-- メインコンテンツを読み込む -->
        <?= $this->fetch('content') ?>
      </div>
    </div>

    <!-- フッターをElementファイルから読み込む -->
    <?= $this->element('footer') ?>
  </body>
</html>
