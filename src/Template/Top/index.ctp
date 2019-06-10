<div id="wrapper">
  <div id="main">
    <div id="page_title">
      <h2>Top</h2>
    </div>
    <div id="contents_news">
      <marquee loop="3"><?= $mk_news_files[0]['message'] ?></marquee>
    </div>
    <div id="contents_rireki">
        <h3>更新履歴</h3>
      <div class="scrollArea deco">
        <table id="tbl_rireki">
          <tr>
            <th>リリース日</th>
            <th>バージョン</th>
            <th>タイトル</th>
            <th>詳細</th>
          </tr>
        <?php foreach ($mk_updatelog_files as $mk_updatelog_file): ?>
          <tr>
            <td><?= date('Y年m月d日',strtotime(h($mk_updatelog_file->release_ymd))) ?></td>
            <td><?= h($mk_updatelog_file->version) ?></td>
            <td><?= h($mk_updatelog_file->title) ?></td>
            <td><?= h($mk_updatelog_file->note) ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
      </div>
    </div>
  </div>
</div>
