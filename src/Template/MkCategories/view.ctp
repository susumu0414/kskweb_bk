<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkCategory $mkCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mk Category'), ['action' => 'edit', $mkCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mk Category'), ['action' => 'delete', $mkCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mkCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mk Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mk Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Mk Categories'), ['controller' => 'MkCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Mk Category'), ['controller' => 'MkCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Mk Categories'), ['controller' => 'MkCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Mk Category'), ['controller' => 'MkCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mkCategories view large-9 medium-8 columns content">
    <h3><?= h($mkCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Parent Mk Category') ?></th>
            <td><?= $mkCategory->has('parent_mk_category') ? $this->Html->link($mkCategory->parent_mk_category->name, ['controller' => 'MkCategories', 'action' => 'view', $mkCategory->parent_mk_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mkCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mkCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($mkCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($mkCategory->rght) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Mk Categories') ?></h4>
        <?php if (!empty($mkCategory->child_mk_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mkCategory->child_mk_categories as $childMkCategories): ?>
            <tr>
                <td><?= h($childMkCategories->id) ?></td>
                <td><?= h($childMkCategories->parent_id) ?></td>
                <td><?= h($childMkCategories->lft) ?></td>
                <td><?= h($childMkCategories->rght) ?></td>
                <td><?= h($childMkCategories->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MkCategories', 'action' => 'view', $childMkCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MkCategories', 'action' => 'edit', $childMkCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MkCategories', 'action' => 'delete', $childMkCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childMkCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
