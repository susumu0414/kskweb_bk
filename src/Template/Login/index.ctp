<!-- <div>
    <h3>Index Page</h3>
    <p><?= $message ?></p>
      <?=$this->Form->create(null,[
          'type' => 'post',
          'url' => ['controller' => 'Login', 'action' => 'index']]
      ) ?>
      <?=$this->Form->input('tan_cd',array('type'=>'text','label' => 'ログインID','maxlength'=>15)) ?>
      <?=$this->Form->input('password',array('type'=>'password','label' => 'パスワード','maxlength'=>15)) ?>
      <?=$this->Form->submit('OK') ?>
      <?=$this->Form->end() ?>
    </form>
</div> -->


<h1>Database</h1>
<p><?= $message ?></p>
<?=$this->Form->create(null,['type' => 'post','url' => ['controller' => 'Login', 'action' => 'index']])?>
<fieldset>
  <?=$this->Form->input('tan_cd',array('type'=>'text','label' => 'ログインID','maxlength'=>15)) ?>
  <?=$this->Form->input('user_pass',array('type'=>'password','label' => 'パスワード','maxlength'=>15)) ?>
</fieldset>
<?=$this->Form->button("送信")?>
<?=$this->Form->end()?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $obj): ?>
        <tr>
            <td><?=$obj->tan_cd ?></td>
            <td><?=h($obj->tan_nm) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
