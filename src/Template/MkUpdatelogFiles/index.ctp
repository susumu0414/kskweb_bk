<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkUpdatelogFile[]|\Cake\Collection\CollectionInterface $mkUpdatelogFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Updatelog File'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkUpdatelogFiles index large-9 medium-8 columns content">
    <h3><?= __('Mk Updatelog Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('release_ymd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkUpdatelogFiles as $mkUpdatelogFile): ?>
            <tr>
                <td><?= $this->Number->format($mkUpdatelogFile->id) ?></td>
                <td><?= h($mkUpdatelogFile->release_ymd) ?></td>
                <td><?= h($mkUpdatelogFile->version) ?></td>
                <td><?= h($mkUpdatelogFile->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkUpdatelogFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkUpdatelogFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkUpdatelogFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkUpdatelogFile->id)]) ?>
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
