<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkUpdatelogFile $mkUpdatelogFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mkUpdatelogFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mkUpdatelogFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mk Updatelog Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mkUpdatelogFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mkUpdatelogFile) ?>
    <fieldset>
        <legend><?= __('Edit Mk Updatelog File') ?></legend>
        <?php
            echo $this->Form->control('release_ymd');
            echo $this->Form->control('version');
            echo $this->Form->control('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
