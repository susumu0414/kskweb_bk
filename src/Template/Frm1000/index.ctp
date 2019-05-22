<h2><?= $page_nm ?></h2>

<div>
    <h3>検索条件入力</h3>
    <?=$this->Form->create(null,[
        'type' => 'post',
        'url' => ['controller' => 'Frm1000', 'action' => 'index']]
    ) ?>
    <?=$this->Form->input("jyucyu_no",["type"=>"text","maxlength"=>10,"label"=>"受注番号："]) ?>
    <h3>EXCELへ書込み</h3>
    <?=$this->Form->input("biko",["type"=>"text","maxlength"=>50,"label"=>"引き取り予定日："]) ?>
    <?=$this->Form->submit('検索') ?>
    <?=$this->Form->submit('印刷') ?>
    <?=$this->Form->end() ?>
    </form>
</div>

<?php foreach ($t_uri as $row): ?>
    <tr>
        <td><?=  h($row->den_no) ?></td>
        <td><?= h($row->tokusaki_nm) ?></td>
        <br>
    </tr>
<?php endforeach; ?>
