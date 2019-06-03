<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkPageFile[]|\Cake\Collection\CollectionInterface $mkPageFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Page File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mk Auth Files'), ['controller' => 'MkAuthFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Auth File'), ['controller' => 'MkAuthFiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mk Menue Files'), ['controller' => 'MkMenueFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Menue File'), ['controller' => 'MkMenueFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkPageFiles index large-9 medium-8 columns content">
    <h3><?= __('Mk Page Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_page') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_nm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_nm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('del_flg') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkPageFiles as $mkPageFile): ?>
            <tr>
                <td><?= $this->Number->format($mkPageFile->id) ?></td>
                <td><?= h($mkPageFile->id_page) ?></td>
                <td><?= h($mkPageFile->page_nm) ?></td>
                <td><?= h($mkPageFile->url) ?></td>
                <td><?= h($mkPageFile->file_nm) ?></td>
                <td><?= $this->Number->format($mkPageFile->sort) ?></td>
                <td><?= h($mkPageFile->del_flg) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkPageFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkPageFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkPageFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkPageFile->id)]) ?>
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
