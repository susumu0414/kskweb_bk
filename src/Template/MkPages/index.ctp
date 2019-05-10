<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkPage[]|\Cake\Collection\CollectionInterface $mkPages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Page'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkPages index large-9 medium-8 columns content">
    <h3><?= __('Mk Pages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_nm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_nm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('del_flg') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkPages as $mkPage): ?>
            <tr>
                <td><?= $this->Number->format($mkPage->id) ?></td>
                <td><?= h($mkPage->page_id) ?></td>
                <td><?= $this->Number->format($mkPage->category_id) ?></td>
                <td><?= h($mkPage->page_nm) ?></td>
                <td><?= h($mkPage->url) ?></td>
                <td><?= h($mkPage->file_nm) ?></td>
                <td><?= $this->Number->format($mkPage->sort) ?></td>
                <td><?= h($mkPage->del_flg) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkPage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkPage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkPage->id)]) ?>
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
