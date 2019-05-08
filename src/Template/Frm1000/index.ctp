<h1>Top</h1>

<?php foreach ($t_uri as $row): ?>
    <tr>
        <td><?=  h($row->den_no) ?></td>
        <td><?= h($row->tokusaki_nm) ?></td>
        <br>
    </tr>
<?php endforeach; ?>
