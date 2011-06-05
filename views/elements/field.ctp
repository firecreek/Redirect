<?php

  $uuid = String::uuid();

  $url = isset($data['url']) ? $data['url'] : null;
  $forward = isset($data['forward']) ? $data['forward'] : null;
  $status = isset($data['code']) ? $data['code'] : null;

?>
<div class="route clearfix">
  <div class="actions">
    <?php echo $this->Html->link('Remove','#',array('class'=>'remove-route')); ?>
  </div>
  <?php
    echo $this->Form->input('Route.'.$uuid.'.url',array('type'=>'text','label'=>'URL','div'=>'input text url','value'=>$url));
    echo $this->Form->input('Route.'.$uuid.'.forward',array('type'=>'text','label'=>'Forward To','div'=>'input text forward','value'=>$forward));
    echo $this->Form->input('Route.'.$uuid.'.code',array('type'=>'text','label'=>'Status Code','div'=>'input text code','value'=>$status));
  ?>
</div>
