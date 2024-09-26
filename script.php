<?php
$directory = new RecursiveDirectoryIterator(__DIR__ . '/src');
$fullTree = new RecursiveIteratorIterator($directory);
$phpFiles = new RegexIterator($fullTree, '/.+((?<!Test)+\.php$)/i', RecursiveRegexIterator::GET_MATCH, );

foreach ($phpFiles as $key => $file) {
    echo "require_once '". str_replace(DIRECTORY_SEPARATOR, '/', $file[0]) ."';\n";
}
?>
