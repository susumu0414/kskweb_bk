<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkNewsFile $mkNewsFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mkNewsFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mkNewsFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mk News Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mkNewsFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mkNewsFile) ?>
    <fieldset>
        <legend><?= __('Edit Mk News File') ?></legend>
        <?php
            echo $this->Form->control('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
