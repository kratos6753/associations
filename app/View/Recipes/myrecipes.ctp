<?php
if(empty($myrecipes)) { ?>
	<h2 style="text-align:center">No recipes created yet</h2>
<?php echo $this->HTML->link('Create a New Recipe', array('controller' => 'recipes', 'action' => 'add')); } else { ?>
<h2>My Recipes are: </h2>
<?php
	$counter = 1;
	foreach ($myrecipes as $recipe):
		echo $counter.'. '.$this->HTML->link(ucwords($recipe['Recipe']['name']), array('action' => 'view'))."<br>";
		$counter++;
	endforeach;
	unset($myrecipes);
	unset($counter);
} ?>