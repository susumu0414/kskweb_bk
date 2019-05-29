<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkUpdatelogFile $mkUpdatelogFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Updatelog File'), ['action' => 'edit', $mkUpdatelogFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Updatelog File'), ['action' => 'delete', $mkUpdatelogFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkUpdatelogFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Updatelog Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Updatelog File'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkUpdatelogFiles view large-9 medium-8 columns content">
    <h3><?= h($mkUpdatelogFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Release Ymd') ?></th>
            <td><?= h($mkUpdatelogFile->release_ymd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= h($mkUpdatelogFile->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($mkUpdatelogFile->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkUpdatelogFile->id) ?></td>
        </tr>
    </table>
</div>
