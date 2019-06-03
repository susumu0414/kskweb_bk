<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkMenueKbnFile[]|\Cake\Collection\CollectionInterface $mkMenueKbnFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Menue Kbn File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mk Menue Files'), ['controller' => 'MkMenueFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Menue File'), ['controller' => 'MkMenueFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkMenueKbnFiles index large-9 medium-8 columns content">
    <h3><?= __('Mk Menue Kbn Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menue_kbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menue_kbn_nm') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkMenueKbnFiles as $mkMenueKbnFile): ?>
            <tr>
                <td><?= $this->Number->format($mkMenueKbnFile->id) ?></td>
                <td><?= h($mkMenueKbnFile->menue_kbn) ?></td>
                <td><?= h($mkMenueKbnFile->menue_kbn_nm) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkMenueKbnFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkMenueKbnFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkMenueKbnFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkMenueKbnFile->id)]) ?>
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
