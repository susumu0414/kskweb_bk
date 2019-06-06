<div id="wrapper">
  <div id="main">
    <h1>Top</h1>

    <?php foreach ($mk_updatelog_files as $mk_updatelog_file): ?>
      <tr>
        <td><?= h($mk_updatelog_file->release_ymd) ?></td>
        <td><?= h($mk_updatelog_file->version) ?></td>
        <td><?= h($mk_updatelog_file->title) ?></td>
        <td><?= h($mk_updatelog_file->note) ?></td>
        <br>
      </tr>
    <?php endforeach; ?>
  </div>
</div>
