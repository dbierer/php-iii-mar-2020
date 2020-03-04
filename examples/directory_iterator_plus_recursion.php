<?php
$dir = '/home/vagrant/Zend/workspaces/DefaultWorkspace';
$recurse = new RecursiveDirectoryIterator($dir,  FilesystemIterator::SKIP_DOTS);
$deeper = new RecursiveIteratorIterator($recurse);
foreach ($deeper as $key => $value) {
	echo $key . "\n";
}
