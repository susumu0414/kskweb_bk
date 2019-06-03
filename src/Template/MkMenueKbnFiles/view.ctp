<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkMenueKbnFile $mkMenueKbnFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Menue Kbn File'), ['action' => 'edit', $mkMenueKbnFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Menue Kbn File'), ['action' => 'delete', $mkMenueKbnFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkMenueKbnFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Menue Kbn Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Menue Kbn File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mk Menue Files'), ['controller' => 'MkMenueFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Menue File'), ['controller' => 'MkMenueFiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkMenueKbnFiles view large-9 medium-8 columns content">
    <h3><?= h($mkMenueKbnFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menue Kbn') ?></th>
            <td><?= h($mkMenueKbnFile->menue_kbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menue Kbn Nm') ?></th>
            <td><?= h($mkMenueKbnFile->menue_kbn_nm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkMenueKbnFile->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Mk Menue Files') ?></h4>
        <?php if (!empty($mkMenueKbnFile->mk_menue_files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Mk Menue Kbn File Id') ?></th>
                <th scope="col"><?= __('Mk Page File Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mkMenueKbnFile->mk_menue_files as $mkMenueFiles): ?>
            <tr>
                <td><?= h($mkMenueFiles->id) ?></td>
                <td><?= h($mkMenueFiles->mk_menue_kbn_file_id) ?></td>
                <td><?= h($mkMenueFiles->mk_page_file_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MkMenueFiles', 'action' => 'view', $mkMenueFiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MkMenueFiles', 'action' => 'edit', $mkMenueFiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MkMenueFiles', 'action' => 'delete', $mkMenueFiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkMenueFiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
