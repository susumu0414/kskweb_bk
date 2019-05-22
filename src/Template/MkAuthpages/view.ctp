<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkAuthpage $mkAuthpage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Authpage'), ['action' => 'edit', $mkAuthpage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Authpage'), ['action' => 'delete', $mkAuthpage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkAuthpage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Authpages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Authpage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mk Pages'), ['controller' => 'MkPages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Page'), ['controller' => 'MkPages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkAuthpages view large-9 medium-8 columns content">
    <h3><?= h($mkAuthpage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Auth Kbn') ?></th>
            <td><?= h($mkAuthpage->auth_kbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mk Page') ?></th>
            <td><?= $mkAuthpage->has('mk_page') ? $this->Html->link($mkAuthpage->mk_page->page_id, ['controller' => 'MkPages', 'action' => 'view', $mkAuthpage->mk_page->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkAuthpage->id) ?></td>
        </tr>
    </table>
</div>
