<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MkPage $mkPage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mk Pages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mkPages form large-9 medium-8 columns content">
    <?= $this->Form->create($mkPage) ?>
    <fieldset>
        <legend><?= __('Add Mk Page') ?></legend>
        <?php
            echo $this->Form->control('page_id');
            echo $this->Form->control('category_id');
            echo $this->Form->control('page_nm');
            echo $this->Form->control('url');
            echo $this->Form->control('file_nm');
            echo $this->Form->control('sort');
            echo $this->Form->control('del_flg');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
