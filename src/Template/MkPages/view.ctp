<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkPage $mkPage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Page'), ['action' => 'edit', $mkPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Page'), ['action' => 'delete', $mkPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkPage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Page'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkPages view large-9 medium-8 columns content">
    <h3><?= h($mkPage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Page Id') ?></th>
            <td><?= h($mkPage->page_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Nm') ?></th>
            <td><?= h($mkPage->page_nm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($mkPage->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File Nm') ?></th>
            <td><?= h($mkPage->file_nm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Del Flg') ?></th>
            <td><?= h($mkPage->del_flg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkPage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($mkPage->category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sort') ?></th>
            <td><?= $this->Number->format($mkPage->sort) ?></td>
        </tr>
    </table>
</div>
