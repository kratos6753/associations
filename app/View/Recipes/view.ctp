<h2><?php echo $recipe['Recipe']['name']; ?></h2>
<?php if (empty($recipe['Review'])): ?>
	<p>No Reviews yet. <?php echo $this->HTML->link('Be the first to create a review.', array('controller' => 'reviews', 'action' => 'add', $recipe['Recipe']['id'])); ?></p>
<?php endif ?>