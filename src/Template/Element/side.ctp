
<?php
  $menue_serv = $this->getRequest()->getSession()->read('SideMenue.serv');
  $menue_ec = $this->getRequest()->getSession()->read('SideMenue.ec');
  $menue_acc = $this->getRequest()->getSession()->read('SideMenue.acc');
  $menue_pert = $this->getRequest()->getSession()->read('SideMenue.pert');
  $menue_sys = $this->getRequest()->getSession()->read('SideMenue.sys');
  $menue_sale = $this->getRequest()->getSession()->read('SideMenue.sale');
  $menue_logi = $this->getRequest()->getSession()->read('SideMenue.logi');
?>
<div id="side_menue">
	<ul class="accordion_menue">
  	<li>
			<p>
				<a href="">TOP</a>
			</p>
		</li>
    <li>
      <p>▼営業</p>
        <ul class="inner">
          <?php
          if (isset($menue_sale)){
            foreach ($menue_sale as $row) {
              echo '<li>';
              echo $this->Html->link($row['mk_page_file']['page_nm'],$row['mk_page_file']['url'],array('escape' => false));
              echo '</li>';
            }
          }
          ?>
        </ul>
    </li>
  	<li>
			<p>▼パーツ</p>
	      <ul class="inner">
          <?php
            if (isset($menue_pert)){
              foreach ($menue_pert as $row) {
                echo '<li>';
                echo $this->Html->link($row['mk_page_file']['page_nm'],$row['mk_page_file']['url'],array('escape' => false));
                echo '</li>';
              }
            }
          ?>
	      </ul>
		</li>
    <li>
			<p>▼サービス</p>
	      <ul class="inner">
          <?php
            if (isset($menue_serv)){
              foreach ($menue_serv as $row) {
                echo '<li>';
                echo $this->Html->link($row['mk_page_file']['page_nm'],$row['mk_page_file']['url'],array('escape' => false));
                echo '</li>';
              }
            }
          ?>
	      </ul>
		</li>
		<li>
			<p>▼EC</p>
				<ul class="inner">
          <?php
            if (isset($menue_ec)){
              foreach ($menue_ec as $row) {
                echo '<li>';
                echo $this->Html->link($row['mk_page_file']['page_nm'],$row['mk_page_file']['url'],array('escape' => false));
                echo '</li>';
              }
            }
          ?>
				</ul>
		</li>
    <li>
      <p>▼倉庫</p>
        <ul class="inner">
          <?php
            if (isset($menue_logi)){
              foreach ($menue_logi as $row) {
                echo '<li>';
                echo $this->Html->link($row['mk_page_file']['page_nm'],$row['mk_page_file']['url'],array('escape' => false));
                echo '</li>';
              }
            }
          ?>
        </ul>
    </li>
    <li>
			<p>▼経理</p>
	      <ul class="inner">
          <?php
            if (isset($menue_acc)){
              foreach ($menue_acc as $row) {
                echo '<li>';
                echo $this->Html->link($row['mk_page_file']['page_nm'],$row['mk_page_file']['url'],array('escape' => false));
                echo '</li>';
              }
            }
          ?>
	      </ul>
		</li>
    <li>
			<p>▼情シス</p>
	      <ul class="inner">
          <?php
            if (isset($menue_sys)){
              foreach ($menue_sys as $row) {
                echo '<li>';
                echo $this->Html->link($row['mk_page_file']['page_nm'],$row['mk_page_file']['url'],array('escape' => false));
                echo '</li>';
              }
            }
          ?>
	      </ul>
		</li>
		<li>
			<p>▼マニュアル</p>
				<ul class="inner">
					<li><a href=manual.php?file_nm={"納品書印刷手順(上州屋).htm"|escape:"html"}>納品書印刷手順(上州屋)</a></li>
				</ul>
		</li>
		<li>
			<p>▼その他</p>
				<ul class="inner">
				</ul>
		</li>
	</ul>
</div>
