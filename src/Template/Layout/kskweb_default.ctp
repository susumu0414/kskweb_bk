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
      <title>
        <?= $this->fetch('title') ?>
      </title>
      <?= $this->Html->meta('icon') ?>

      <!-- <?= $this->Html->css('base.css') ?> -->
      <!-- <?= $this->Html->css('style.css') ?> -->
      <?= $this->Html->css('kisaka.css') ?>

      <?= $this->fetch('meta') ?>
      <?= $this->fetch('css') ?>
      <?= $this->fetch('script') ?>
  </head>

  <body>
    <!-- ヘッダーをElementファイルから読み込む -->
    <?= $this->element('header') ?>

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
