<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkPageFile $mkPageFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Mk Auth Files'), ['controller' => 'MkAuthFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Auth File'), ['controller' => 'MkAuthFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkPageFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mkPageFile) ?>
    <fieldset>
        <legend><?= __('Add Mk Page File') ?></legend>
        <?php
            echo $this->Form->control('page_id');
            echo $this->Form->control('menue_kbn');
            echo $this->Form->control('page_nm');
            echo $this->Form->control('url');
            echo $this->Form->control('file_nm');
            echo $this->Form->control('sort');
            echo $this->Form->control('del_flg');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
