<header>
  <div class="header_flxcont">
    <div class="header_flxitem1">
      <?php echo $this->Html->image('kisaka_S_logo.png',array('width'=>'116','height'=>'21')); ?>
    </div>
    <div class="header_flxitem2">
      <p>ユーザー名： <?php echo $this->getRequest()->getSession()->read('MTanto.tan_nm'); ?> </p>
      <?php echo $this->Html->link('ログオフ',"/login",array('escape' => false)); ?>
    </div>
  </div>
</header>
