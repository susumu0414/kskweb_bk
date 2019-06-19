<!-- レイアウトファイルでページごとのjsファイルを読み込む -->
<?= $this->Html->script('Frmsv0110',['block' => true]) ?>
<div id="wrapper">
  <div id="main">
    <div id="page_title">
      <h2><?= $page_nm ?></h2>
    </div>
    <div id="contents_search">
      <h3>検索条件入力</h3>
      <?=$this->Form->create(null,[
          'type' => 'post',
          'url' => ['controller' => 'Frmsv0110', 'action' => 'index'],
          'name' => 'form_input','id' => 'form_input'
        ]
      ) ?>
        <div class="margin_left_10"> <?=$this->Form->input("work_no",["type"=>"text","maxlength"=>10,"label"=>"作業カード番号：","autofocus"=>"autofocus"]) ?></div>
        <h3>EXCELへ書込み</h3>
        <div class="margin_left_10"> <?=$this->Form->input("biko",["type"=>"text","maxlength"=>50,"label"=>"引き取り予定日："]) ?> </div>
          <input type="hidden" name="btn_nm">
          <a class="square_btn" href="" id="btn_search" >検索</a>
          <a class="square_print_btn" HREF="" onclick="form_input.btn_nm.value='btn_print';document.form_input.submit();return false;">印刷</a>
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
  </div>
</div>
