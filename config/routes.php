<?php
return array(
    'books/send' => 'IndexController/sendEmail',
	'books/search' => 'IndexController/searchIndex',
	'books/([0-9]+)' => 'IndexController/actionView/$1',
	'' => 'IndexController/actionIndex',
    
	);