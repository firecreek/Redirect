<?php

Router::connect('/redirect-example', array('plugin'=>'redirect', 'controller'=>'redirect', 'action'=>'go', 'forward'=>'/', 'code'=>'301'));
Router::connect('/redirect-example-2', array('plugin'=>'redirect', 'controller'=>'redirect', 'action'=>'go', 'forward'=>'http://www.google.com', 'code'=>'301'));

?>