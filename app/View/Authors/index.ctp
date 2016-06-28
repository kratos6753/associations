<table>
	<thead>
		<tr>
			<th>S.No</th><th>Name</th><th>Password</th><th>Edit</th>
		</tr>
	</thead>
	<tbody>
<?php 
foreach($authors as $author):
	echo "<tr><td>".$author['Author']['id']."</td><td>".$author['Author']['name']."</td><td>".$author['Author']['password']."</td><td>".$this->HTML->link('Edit', array('controller' => 'authors', 'action' => 'edit', $author['Author']['id']))."</td></tr>"; 
endforeach;
unset($authors);
?>
	</tbody>
</table>
