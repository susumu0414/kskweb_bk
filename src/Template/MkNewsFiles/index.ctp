<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkNewsFile[]|\Cake\Collection\CollectionInterface $mkNewsFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk News File'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkNewsFiles index large-9 medium-8 columns content">
    <h3><?= __('Mk News Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkNewsFiles as $mkNewsFile): ?>
            <tr>
                <td><?= $this->Number->format($mkNewsFile->id) ?></td>
                <td><?= h($mkNewsFile->message) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkNewsFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkNewsFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkNewsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkNewsFile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
