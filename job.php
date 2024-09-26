<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = 'C:\dvl\Workspace\phpunit\tests\end-to-end\regression' . '/2137/Issue2137Test.php';
$_SERVER['argv'][] = '--filter';
$_SERVER['argv'][] = 'BrandService';

require 'C:\dvl\Workspace\phpunit\vendor/autoload.php';
(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
