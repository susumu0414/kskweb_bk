<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TkUpdatelogFile $tkUpdatelogFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tkUpdatelogFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tkUpdatelogFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tk Updatelog Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tkUpdatelogFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($tkUpdatelogFile) ?>
    <fieldset>
        <legend><?= __('Edit Tk Updatelog File') ?></legend>
        <?php
            echo $this->Form->control('release_ymd');
            echo $this->Form->control('version');
            echo $this->Form->control('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
