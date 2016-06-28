<?php 
if(empty($recipes)) { ?>
	<h2 style="text-align:center">No recipes created yet</h2>
<?php echo $this->HTML->link('Create a New Recipe', array('controller' => 'recipes', 'action' => 'add')); } else { 
	foreach ($recipes as $recipe):
		echo $recipe['Recipe']['name'].' prepared by '.$recipe['Author']['name']."<br>";
	endforeach;
	unset($recipes);
} ?>