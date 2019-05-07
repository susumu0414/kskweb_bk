<h1>Top</h1>
<p><?= $message ?></p>


<?php foreach ($tk_updatelogs as $tk_updatelog): ?>
    <tr>
        <td><?=  h($tk_updatelog->id) ?></td>
        <td><?= h($tk_updatelog->release_ymd) ?></td>
        <td><?= h($tk_updatelog->version) ?></td>
        <td><?= h($tk_updatelog->note) ?></td>
        <br>
    </tr>
<?php endforeach; ?>

<!-- <?php foreach ($mk_Categories as $mk_Category): ?>
    <tr>
        <td><?=  h($mk_Category->id) ?></td>
        <td><?= h($mk_Category->parent_id) ?></td>
        <td><?= h($mk_Category->name) ?></td>
        <br>
    </tr>
<?php endforeach; ?> -->
<?php echo $this->Form->control('MkCategories', ['options' => $mk_Categories]);  ?>
