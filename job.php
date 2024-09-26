<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = __DIR__.'/tests/end-to-end/regression/2137/Issue2137Test.php';
$_SERVER['argv'][] = '--filter';
$_SERVER['argv'][] = 'BrandService';

require __DIR__.'/vendor/autoload.php';
(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
