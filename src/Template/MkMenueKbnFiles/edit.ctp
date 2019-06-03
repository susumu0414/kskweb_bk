<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkMenueKbnFile $mkMenueKbnFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mkMenueKbnFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mkMenueKbnFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mk Menue Kbn Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Mk Menue Files'), ['controller' => 'MkMenueFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Menue File'), ['controller' => 'MkMenueFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkMenueKbnFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mkMenueKbnFile) ?>
    <fieldset>
        <legend><?= __('Edit Mk Menue Kbn File') ?></legend>
        <?php
            echo $this->Form->control('menue_kbn');
            echo $this->Form->control('menue_kbn_nm');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
