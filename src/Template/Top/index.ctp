<div id="wrapper">
  <div id="main">
    <div id="page_title">
      <h2>Top</h2>
    </div>
    <div id="contents_rireki">
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
</div>
