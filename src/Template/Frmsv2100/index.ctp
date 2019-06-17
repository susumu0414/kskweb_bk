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
      <table id="tbl_search">
        <tr>
        <td><div class="inline_blk margin_left_10"> 売上日(From)：</div></td>
        <td><div class="inline_blk"><?=$this->Form->input("YMD_From",["type"=>"text","label"=>false,"class"=>"float_left"]) ?></div></td>
        <td><div class="inline_blk margin_left_10">売上日(To)：</div></td>
        <td><div class="inline_blk"><?=$this->Form->input("YMD_To",["type"=>"text","label"=>false]) ?></div></td>
        </tr>
        <tr>
          <td><div class="inline_blk margin_left_10"> 伝票番号：</div></td>
          <td><div class="inline_blk"><?=$this->Form->input("den_no",["type"=>"text","maxlength"=>10,"label"=>false]) ?></div></td>
        </tr>
      </table>
      <input type="hidden" name="btn_nm">
      <a class="square_btn" href="" id="btn_search" >検索</a>
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
