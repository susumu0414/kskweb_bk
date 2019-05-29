<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkAuthFile[]|\Cake\Collection\CollectionInterface $mkAuthFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Auth File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['controller' => 'MkPageFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Page File'), ['controller' => 'MkPageFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkAuthFiles index large-9 medium-8 columns content">
    <h3><?= __('Mk Auth Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auth_kbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mk_page_file_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mk_page_file_page_nm') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkAuthFiles as $mkAuthFile): ?>
            <tr>
                <td><?= $this->Number->format($mkAuthFile->id) ?></td>
                <td><?= h($mkAuthFile->auth_kbn) ?></td>
                <td><?= $mkAuthFile->has('mk_page_file') ? $this->Html->link($mkAuthFile->mk_page_file->id, ['controller' => 'MkPageFiles', 'action' => 'view', $mkAuthFile->mk_page_file->id]) : '' ?></td>
                <td><?= h($mkAuthFile->mk_page_file->page_nm) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkAuthFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkAuthFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkAuthFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkAuthFile->id)]) ?>
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
