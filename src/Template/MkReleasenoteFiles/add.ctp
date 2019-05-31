<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkReleasenoteFile $mkReleasenoteFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mk Releasenote Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mkReleasenoteFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mkReleasenoteFile) ?>
    <fieldset>
        <legend><?= __('Add Mk Releasenote File') ?></legend>
        <?php
            echo $this->Form->control('release_ymd');
            echo $this->Form->control('version');
            echo $this->Form->control('title');
            echo $this->Form->control('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
