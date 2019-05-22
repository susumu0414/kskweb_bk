<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkAuthpage[]|\Cake\Collection\CollectionInterface $mkAuthpages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mk Authpage'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mk Pages'), ['controller' => 'MkPages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mk Page'), ['controller' => 'MkPages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mkAuthpages index large-9 medium-8 columns content">
    <h3><?= __('Mk Authpages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auth_kbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mk_pages_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mkAuthpages as $mkAuthpage): ?>
            <tr>
                <td><?= $this->Number->format($mkAuthpage->id) ?></td>
                <td><?= h($mkAuthpage->auth_kbn) ?></td>
                <td><?= $mkAuthpage->has('mk_page') ? $this->Html->link($mkAuthpage->mk_page->page_id, ['controller' => 'MkPages', 'action' => 'view', $mkAuthpage->mk_page->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mkAuthpage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mkAuthpage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mkAuthpage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkAuthpage->id)]) ?>
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
