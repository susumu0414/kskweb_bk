<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TkUpdatelogFile $tkUpdatelogFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tk Updatelog File'), ['action' => 'edit', $tkUpdatelogFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tk Updatelog File'), ['action' => 'delete', $tkUpdatelogFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tkUpdatelogFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tk Updatelog Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tk Updatelog File'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tkUpdatelogFiles view large-9 medium-8 columns content">
    <h3><?= h($tkUpdatelogFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Release Ymd') ?></th>
            <td><?= h($tkUpdatelogFile->release_ymd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= h($tkUpdatelogFile->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($tkUpdatelogFile->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tkUpdatelogFile->id) ?></td>
        </tr>
    </table>
</div>
