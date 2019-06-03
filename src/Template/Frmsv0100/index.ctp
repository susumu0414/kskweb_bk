<!-- レイアウトファイルでページごとのjsファイルを読み込む -->
<?= $this->Html->script('Frmsv0100',['block' => true]) ?>

<h2><?= $page_nm ?></h2>

<div>
    <h3>検索条件入力</h3>
    <?=$this->Form->create(null,[
        'type' => 'post',
        'url' => ['controller' => 'Frmsv0100', 'action' => 'index'],
        'name' => 'form_input','id' => 'form_input'
      ]
    ) ?>
      <?=$this->Form->input("jyucyu_no",["type"=>"text","maxlength"=>10,"label"=>"受注番号："]) ?>
      <h3>EXCELへ書込み</h3>
      <?=$this->Form->input("biko",["type"=>"text","maxlength"=>50,"label"=>"引き取り予定日："]) ?>
      <div style="display:inline-flex">
        <input type="hidden" name="btn_nm">
        <td> <a class="square_btn" href="" id="btn_search" >検索</a> </td>
        <td> <a class="square_print_btn" HREF="" onclick="form_input.btn_nm.value='btn_print';document.form_input.submit();return false;">印刷</a></td>
      </div>
    <?=$this->Form->end() ?>
</div>

<div id="contents_result">
  <h3>検索結果</h3>
  <table id="tbl_result" class="stripe compact cell-border">
    <thead>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>