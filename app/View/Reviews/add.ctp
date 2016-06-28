<?php

echo $this->Form->create('Review');
$type = $this->Review->getColumnType('rating');
preg_match_all("/'(.*?)'/", $type, $options);
echo $this->Form->select('rating', $options);
echo $this->Form->input('title');
echo $this->Form->input('body');
echo $this->Form->end('Submit Review');