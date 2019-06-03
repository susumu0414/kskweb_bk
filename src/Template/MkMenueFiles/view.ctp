<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkMenueFile $mkMenueFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Menue File'), ['action' => 'edit', $mkMenueFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Menue File'), ['action' => 'delete', $mkMenueFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkMenueFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Menue Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Menue File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['controller' => 'MkPageFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Page File'), ['controller' => 'MkPageFiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkMenueFiles view large-9 medium-8 columns content">
    <h3><?= h($mkMenueFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mk Page File') ?></th>
            <td><?= $mkMenueFile->has('mk_page_file') ? $this->Html->link($mkMenueFile->mk_page_file->page_nm, ['controller' => 'MkPageFiles', 'action' => 'view', $mkMenueFile->mk_page_file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkMenueFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mk Menue Kbn File Id') ?></th>
            <td><?= $this->Number->format($mkMenueFile->mk_menue_kbn_file_id) ?></td>
        </tr>
    </table>
</div>
