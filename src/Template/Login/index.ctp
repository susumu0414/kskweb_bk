<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>キサカWEB</title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <?= $this->Html->css('kisaka_login.css') ?>
    <?= $this->Html->script('Login',['block' => true]) ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>

  <body>
    <div id = "main_login">
      <!-- 背景用の動画ファイル -->
      <video id="bg-video" src="/kskweb/video/sample1.mp4" autoplay loop muted></video>

      <div id="web_title">
        <div class="animated fadeInLeftBig logo-animation1"><span>Kisaka Web System.<span></div>
      </div>
      <div id="contents_login">
    		<!-- <h3 class="animated fadeInLeftBig logo-animation2">ログイン入力</h3> -->
        <?=$this->Form->create(null,['type' => 'post',
                        'url' => ['controller' => 'Login', 'action' => 'index'],
                        'class' =>'animated fadeInLeftBig  logo-animation2',
                        'id' =>'form_input',
                        'name' => 'form_input'])?>
          <table>
            <tr>
            <td><div><span> Login ID：</span></div></td>
            <td><?=$this->Form->input('tan_cd',array('type'=>'text','label' => false,'maxlength'=>15,'autofocus'=>'autofocus')) ?></td>
            </tr>
            <tr>
            <td><div><span> Password：</span></div></td>
            <td><?=$this->Form->input('user_pass',array('type'=>'password','label' => false,'maxlength'=>15)) ?></td>
            </tr>
          </table>
          <input type="hidden" name="btn_nm" value="btn_login">
          <a class="square_btn" href="#" id="btn_login" >Login</a>
        <?=$this->Form->end()?>
    	</div>
    </div>
  </body>
</html>
