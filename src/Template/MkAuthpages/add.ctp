<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkAuthpage $mkAuthpage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mk Authpages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Mk Pages'), ['controller' => 'MkPages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Page'), ['controller' => 'MkPages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkAuthpages form large-9 medium-8 columns content">
    <?= $this->Form->create($mkAuthpage) ?>
    <fieldset>
        <legend><?= __('Add Mk Authpage') ?></legend>
        <?php
            echo $this->Form->control('auth_kbn');
            echo $this->Form->control('mk_pages_id', ['options' => $mkPages]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
