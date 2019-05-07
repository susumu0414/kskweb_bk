<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkCategory $mkCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mk Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Mk Categories'), ['controller' => 'MkCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Mk Category'), ['controller' => 'MkCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($mkCategory) ?>
    <fieldset>
        <legend><?= __('Add Mk Category') ?></legend>
        <?php
            echo $this->Form->control('parent_id', ['options' => $parentMkCategories, 'empty' => true]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
