
<?php
  $menue_service = $this->getRequest()->getSession()->read('SideMenue.service');
  $menue_ec = $this->getRequest()->getSession()->read('SideMenue.ec');
  $menue_acc = $this->getRequest()->getSession()->read('SideMenue.acc');
  $menue_parts = $this->getRequest()->getSession()->read('SideMenue.parts');
  $menue_system = $this->getRequest()->getSession()->read('SideMenue.system');
  $menue_sales = $this->getRequest()->getSession()->read('SideMenue.sales');
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
          if (isset($menue_sales)){
            foreach ($menue_sales as $row) {
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
            if (isset($menue_parts)){
              foreach ($menue_parts as $row) {
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
            if (isset($menue_service)){
              foreach ($menue_service as $row) {
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
            if (isset($menue_system)){
              foreach ($menue_system as $row) {
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
