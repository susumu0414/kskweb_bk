<!-- レイアウトファイルでページごとのjsファイルを読み込む -->
<?= $this->Html->script('Frmsv0130',['block' => true]) ?>

<div id="wrapper">
  <div id="main">
    <div id="page_title">
      <h2><?= $page_nm ?></h2>
    </div>
    <div id="contents_search">
      <h3>検索条件入力</h3>
      <?=$this->Form->create(null,[
          'type' => 'post',
          'url' => ['controller' => 'Frmsv0130', 'action' => 'outputCSV'],
          'name' => 'form_input','id' => 'form_input'])
      ?>
      <table id="tbl_search">
        <tr>
        <td><div class="inline_blk margin_left_10"> 受注日(From)：</div></td>
        <td><div class="inline_blk"><?=$this->Form->input("create_date_from",["type"=>"text","label"=>false,"class"=>"float_left txt_width_130 datepicker","default"=>$sysdate,"maxlength"=>10,"autofocus"=>"autofocus"]) ?></div></td>
        <td><div class="inline_blk margin_left_10">受注日(To)：</div></td>
        <td><div class="inline_blk"><?=$this->Form->input("create_date_to",["type"=>"text","label"=>false,"class"=>"float_left txt_width_130 datepicker","maxlength"=>10]) ?></div></td>
        </tr>
        <tr>
          <td><div class="inline_blk margin_left_10"> 注文番号(From)：</div></td>
          <td><div class="inline_blk"><?=$this->Form->input("order_id_from",["type"=>"text","class"=>"txt_width_130","maxlength"=>10,"label"=>false]) ?></div></td>
          <td><div class="inline_blk margin_left_10"> 注文番号(To)：</div></td>
          <td><div class="inline_blk"><?=$this->Form->input("order_id_to",["type"=>"text","class"=>"txt_width_130","maxlength"=>10,"label"=>false]) ?></div></td>
        </tr>
        <tr>
          <td><div class="inline_blk margin_left_10"> 対応状況：</div></td>
          <td><div class="inline_blk"><?=$this->Form->input("status_id",["type"=>"select","options"=>$order_status_list,"label"=>false,"empty"=>true]) ?></div></td>
        </tr>
      </table>
      <input type="hidden" name="btn_nm">
      <a class="square_btn" href="" id="btn_search" >検索</a>
      <a class="square_print_btn" HREF="" onclick="form_input.btn_nm.value='btn_csv';document.form_input.submit();return false;">csv出力</a>
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
