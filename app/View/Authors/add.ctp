<?php echo $this->Html->script('validate', array('block' => 'script')); ?>
<?php

echo $this->Html->tableCells(array(
	array('youvadajhd', 'chiru'),
	array('dasdasd', 'vinod')
	));

 ?>
<h2>Registration Form</h2>
<div id='success'></div>
<?php

echo $this->Form->create('Author');
echo $this->Form->input('name');
echo $this->Form->input('password');
echo $this->Js->submit('Register', array(
	'before' => $this->Js->get('#sending')->effect('fadeIn'),
	'success' => $this->Js->get('#sending')->effect('fadeOut'),
	'update' => '#success'
	));

?>

<div id="sending" style="display: none;">Sending...</div>