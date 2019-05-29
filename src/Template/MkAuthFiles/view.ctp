<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkAuthFile $mkAuthFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Auth File'), ['action' => 'edit', $mkAuthFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Auth File'), ['action' => 'delete', $mkAuthFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkAuthFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Auth Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Auth File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['controller' => 'MkPageFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Page File'), ['controller' => 'MkPageFiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkAuthFiles view large-9 medium-8 columns content">
    <h3><?= h($mkAuthFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Auth Kbn') ?></th>
            <td><?= h($mkAuthFile->auth_kbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mk Page File') ?></th>
            <td><?= $mkAuthFile->has('mk_page_file') ? $this->Html->link($mkAuthFile->mk_page_file->page_nm, ['controller' => 'MkPageFiles', 'action' => 'view', $mkAuthFile->mk_page_file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkAuthFile->id) ?></td>
        </tr>
    </table>
</div>
