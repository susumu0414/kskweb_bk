<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkMenueFile[]|\Cake\Collection\CollectionInterface $mkMenueFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Menue File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['controller' => 'MkPageFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Page File'), ['controller' => 'MkPageFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkMenueFiles index large-9 medium-8 columns content">
    <h3><?= __('Mk Menue Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mk_menue_kbn_file_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mk_page_file_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkMenueFiles as $mkMenueFile): ?>
            <tr>
                <td><?= $this->Number->format($mkMenueFile->id) ?></td>
                <td><?= h($mkMenueFile->mk_menue_kbn_file->menue_kbn) ?></td>
                <td><?= $mkMenueFile->has('mk_page_file') ? $this->Html->link($mkMenueFile->mk_page_file->page_nm, ['controller' => 'MkPageFiles', 'action' => 'view', $mkMenueFile->mk_page_file->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkMenueFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkMenueFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkMenueFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkMenueFile->id)]) ?>
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
