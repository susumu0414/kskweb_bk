<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkPageFile $mkPageFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Page File'), ['action' => 'edit', $mkPageFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Page File'), ['action' => 'delete', $mkPageFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkPageFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Page Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Page File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mk Auth Files'), ['controller' => 'MkAuthFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Auth File'), ['controller' => 'MkAuthFiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkPageFiles view large-9 medium-8 columns content">
    <h3><?= h($mkPageFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Page Id') ?></th>
            <td><?= h($mkPageFile->page_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Nm') ?></th>
            <td><?= h($mkPageFile->page_nm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($mkPageFile->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File Nm') ?></th>
            <td><?= h($mkPageFile->file_nm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Del Flg') ?></th>
            <td><?= h($mkPageFile->del_flg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkPageFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menue Kbn') ?></th>
            <td><?= $this->Number->format($mkPageFile->menue_kbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sort') ?></th>
            <td><?= $this->Number->format($mkPageFile->sort) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Mk Auth Files') ?></h4>
        <?php if (!empty($mkPageFile->mk_auth_files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Auth Kbn') ?></th>
                <th scope="col"><?= __('Mk Page File Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mkPageFile->mk_auth_files as $mkAuthFiles): ?>
            <tr>
                <td><?= h($mkAuthFiles->id) ?></td>
                <td><?= h($mkAuthFiles->auth_kbn) ?></td>
                <td><?= h($mkAuthFiles->mk_page_file_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MkAuthFiles', 'action' => 'view', $mkAuthFiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MkAuthFiles', 'action' => 'edit', $mkAuthFiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MkAuthFiles', 'action' => 'delete', $mkAuthFiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkAuthFiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
