<!-- レイアウトファイルでページごとのjsファイルを読み込む -->
<?= $this->Html->script('Frmsv0120',['block' => true]) ?>

<div id="wrapper">
  <div id="main">
    <div id="page_title">
      <h2><?= $page_nm ?></h2>
    </div>
    <div id="contents_search">
      <h3>検索条件入力</h3>
      <?=$this->Form->create(null,[
          'type' => 'post',
          'url' => ['controller' => 'Frmsv0120', 'action' => 'index'],
          'name' => 'form_input','id' => 'form_input'])
      ?>
      <table id="tbl_search">
        <tr>
        <td><div class="inline_blk margin_left_10"> 売上日(From)：</div></td>
        <td><div class="inline_blk"><?=$this->Form->input("YMD_From",["type"=>"text","label"=>false,"class"=>"float_left txt_width_130 datepicker","default"=>$sysdate,"maxlength"=>10,"autofocus"=>"autofocus"]) ?></div></td>
        <td><div class="inline_blk margin_left_10">売上日(To)：</div></td>
        <td><div class="inline_blk"><?=$this->Form->input("YMD_To",["type"=>"text","label"=>false,"class"=>"float_left txt_width_130 datepicker","maxlength"=>10]) ?></div></td>
        </tr>
        <tr>
          <td><div class="inline_blk margin_left_10"> 伝票番号：</div></td>
          <td><div class="inline_blk"><?=$this->Form->input("den_no",["type"=>"text","class"=>"txt_width_130","maxlength"=>10,"label"=>false]) ?></div></td>
        </tr>
      </table>
      <input type="hidden" name="btn_nm">
      <a class="square_btn" href="" id="btn_search" >検索</a>
      <?=$this->Form->end() ?>
      <!-- <input type="text" id="datepicker"> -->
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
