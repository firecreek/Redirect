<?php

  $this->Html->css('/redirect/css/redirect.css', null, array('inline' => false));
  $this->Html->script('/redirect/js/redirect.js', false);

?>

<h2>Redirect</h2>

<?php
  echo $this->Form->create('Redirect',array('url'=>$this->here));
?>

<div id="route-fields">

  <?php
    foreach($routes as $route)
    {
      echo $this->element('field',array('data'=>$route,'plugin'=>'Redirect'));
    }
  ?> 
  
</div>

<a class="add-redirect" href="#">Add another redirect</a>

<div class="buttons">
<?php echo $this->Form->submit('Save'); ?>
</div>

<?php
  echo $this->Form->input('token_key', array(
      'type' => 'hidden',
      'value' => $this->params['_Token']['key'],
  ));
  echo $this->Form->end();
?>