<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkNewsFile $mkNewsFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk News File'), ['action' => 'edit', $mkNewsFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk News File'), ['action' => 'delete', $mkNewsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkNewsFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk News Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk News File'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkNewsFiles view large-9 medium-8 columns content">
    <h3><?= h($mkNewsFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($mkNewsFile->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkNewsFile->id) ?></td>
        </tr>
    </table>
</div>
