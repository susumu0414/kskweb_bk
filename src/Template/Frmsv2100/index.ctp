<!-- レイアウトファイルでページごとのjsファイルを読み込む -->
<?= $this->Html->script('Frmsv2100',['block' => true]) ?>
<div id="wrapper">
  <div id="main">
    <div id="page_title">
      <h2><?= $page_nm ?></h2>
    </div>
    <div id="contents_search">
      <h3>検索条件入力</h3>
      <?=$this->Form->create(null,[
          'type' => 'post',
          'url' => ['controller' => 'Frmsv2100', 'action' => 'index'],
          'name' => 'form_input','id' => 'form_input'])
      ?>
        <div class="inline_blk margin_left_10"> 売上日(From)：</div>
        <div class="inline_blk"><?=$this->Form->input("YMD_From",["type"=>"text","label"=>false,"class"=>"float_left"]) ?></div>
        <br>
        <div class="inline_blk margin_left_10">売上日(To)：</div>
        <div class="inline_blk"><?=$this->Form->input("YMD_To",["type"=>"text","label"=>false]) ?></div>
        <h3>EXCELへ書込み</h3>
        <div class="inline_blk margin_left_10">引き取り予定日：</div>
        <div class="inline_blk"><?=$this->Form->input("biko",["type"=>"text","maxlength"=>50,"label"=>false]) ?></div>
        <input type="hidden" name="btn_nm">
        <br>
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
