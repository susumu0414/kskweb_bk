<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkPageFile $mkPageFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mkPageFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mkPageFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Mk Auth Files'), ['controller' => 'MkAuthFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Auth File'), ['controller' => 'MkAuthFiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mk Menue Files'), ['controller' => 'MkMenueFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Menue File'), ['controller' => 'MkMenueFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkPageFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mkPageFile) ?>
    <fieldset>
        <legend><?= __('Edit Mk Page File') ?></legend>
        <?php
            echo $this->Form->control('id_page');
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
