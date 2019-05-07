<div>
    <h3>Find TkUpdatelogs</h3>
    <?= $msg ?>
    <!-- <?= $this->Form->create($entity) ?> -->
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('release_ymd'); ?>
        <?= $this->Form->control('version'); ?>
        <?= $this->Form->control('note'); ?>
        <?= $this->Form->control('sample'); ?>
        <?= $this->Form->button('Submit') ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <table>
    <thead>
        <tr>
            <th>id</th>
            <th>release_ymd</th>
            <th>version</th>
            <th>note</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tkUpdatelogs as $tkUpdatelog): ?>
        <tr>
            <td><?= h($tkUpdatelog->id) ?></td>
            <td><?= h($tkUpdatelog->release_ymd) ?></td>
            <td><?= h($tkUpdatelog->version) ?></td>
            <td><?= h($tkUpdatelog->note) ?></td>
        </tr>
            <?php endforeach; ?>
            </tbody>
    </table>
</div>
