<h1>Top</h1>

<?php foreach ($tk_updatelog_files as $tk_updatelog_file): ?>
    <tr>
        <td><?=  h($tk_updatelog_file->id) ?></td>
        <td><?= h($tk_updatelog_file->release_ymd) ?></td>
        <td><?= h($tk_updatelog_file->version) ?></td>
        <td><?= h($tk_updatelog_file->note) ?></td>
        <br>
    </tr>
<?php endforeach; ?>
