<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TkUpdatelog $tkUpdatelog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tk Updatelog'), ['action' => 'edit', $tkUpdatelog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tk Updatelog'), ['action' => 'delete', $tkUpdatelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tkUpdatelog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tk Updatelogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tk Updatelog'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tkUpdatelogs view large-9 medium-8 columns content">
    <h3><?= h($tkUpdatelog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Release Ymd') ?></th>
            <td><?= h($tkUpdatelog->release_ymd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= h($tkUpdatelog->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($tkUpdatelog->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tkUpdatelog->id) ?></td>
        </tr>
    </table>
</div>
