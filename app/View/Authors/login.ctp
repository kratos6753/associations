<h2>Login</h2>
<?php

echo $this->Form->create('Author');
echo $this->Form->input('name');
echo $this->Form->input('password');
echo $this->Form->end('Login');