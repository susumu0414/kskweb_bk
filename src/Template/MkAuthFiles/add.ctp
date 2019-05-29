<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkAuthFile $mkAuthFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mk Auth Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['controller' => 'MkPageFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Page File'), ['controller' => 'MkPageFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkAuthFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mkAuthFile) ?>
    <fieldset>
        <legend><?= __('Add Mk Auth File') ?></legend>
        <?php
            echo $this->Form->control('auth_kbn');
            echo $this->Form->control('mk_page_file_id', ['options' => $mkPageFiles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
