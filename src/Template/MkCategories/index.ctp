<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkCategory[]|\Cake\Collection\CollectionInterface $mkCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Category'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkCategories index large-9 medium-8 columns content">
    <h3><?= __('Mk Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkCategories as $mkCategory): ?>
            <tr>
                <td><?= $this->Number->format($mkCategory->id) ?></td>
                <td><?= $mkCategory->has('parent_mk_category') ? $this->Html->link($mkCategory->parent_mk_category->name, ['controller' => 'MkCategories', 'action' => 'view', $mkCategory->parent_mk_category->id]) : '' ?></td>
                <td><?= h($mkCategory->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkCategory->id)]) ?>
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
