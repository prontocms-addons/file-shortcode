<?php

use Pronto\ShortcodeContainer;
use Pronto\GlobalContainer;
use Pronto\HelperContainer;

ShortcodeContainer::add('file', function($attributes) {
	$page = GlobalContainer::get('page');
	$file = array_shift($attributes);
	if(HelperContainer::relative($file)) {
		$file = $page->folder().$file;
	}
	$defaults = array(
		'text' => basename($file)
	);
	$options = array_merge($defaults, $attributes);
	$append = array();
	foreach($options as $key => $val) {
		$append[] = ' '.$key.'="'.html($val).'"';
	}
	return '<a href="'.$file.'"'.implode($append).'>'.html($options['text']).'</a>';
});

?>
