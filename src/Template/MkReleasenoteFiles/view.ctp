<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkReleasenoteFile $mkReleasenoteFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Releasenote File'), ['action' => 'edit', $mkReleasenoteFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Releasenote File'), ['action' => 'delete', $mkReleasenoteFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkReleasenoteFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Releasenote Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Releasenote File'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkReleasenoteFiles view large-9 medium-8 columns content">
    <h3><?= h($mkReleasenoteFile->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Release Ymd') ?></th>
            <td><?= h($mkReleasenoteFile->release_ymd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= h($mkReleasenoteFile->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($mkReleasenoteFile->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($mkReleasenoteFile->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkReleasenoteFile->id) ?></td>
        </tr>
    </table>
</div>
