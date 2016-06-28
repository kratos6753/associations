<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<nav class="navbar navbar-inverse navbar-static-top" >
			 <div class="container-fluid">
			  <div class="navbar-header">
			   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span> 
			   </button>
			   <a class="navbar-brand" href="#">Bookmarks</a>
			  </div>
			 <div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
			    <li class=""><a href="#">Add Bookmarks</a></li>
			    <li><a href="#">Export Data Modified</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			  	<?php
			  		if (AuthComponent::user()) 
			 		echo "<li>Hello Mr. ".AuthComponent::user('name')."</li><li>".$this->HTML->link('Logout', array('controller' => 'authors', 'action' => 'logout'))."</li>";
			 		else echo "<li>".$this->HTML->link('Register', array('controller' => 'authors', 'action' => 'add'))."</li><li>".$this->HTML->link('Login', array('controller' => 'authors', 'action' => 'login'))."</li>";
			 	?>
			  </ul>
			  </div>
			 </div>
			</nav>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>
