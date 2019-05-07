<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TkUpdatelog[]|\Cake\Collection\CollectionInterface $tkUpdatelogs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tk Updatelog'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tkUpdatelogs index large-9 medium-8 columns content">
    <h3><?= __('Tk Updatelogs') ?></h3>
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
            <?php foreach ($tkUpdatelogs as $tkUpdatelog): ?>
            <tr>
                <td><?= $this->Number->format($tkUpdatelog->id) ?></td>
                <td><?= h($tkUpdatelog->release_ymd) ?></td>
                <td><?= h($tkUpdatelog->version) ?></td>
                <td><?= h($tkUpdatelog->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tkUpdatelog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tkUpdatelog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tkUpdatelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tkUpdatelog->id)]) ?>
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
