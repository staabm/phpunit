<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestFixture\Issue2155;

use PHPUnit\Framework\TestCase;

class FooBar
{
    public function doFoo()
    {
        return '';
    }
}

final class Issue2155Test_NoErrorLog extends TestCase
{
    public function testOne(): void
    {
        $foo = new FooBar;

        $this->assertSame('', $foo->doFoo());
        $this->expectErrorLog();
    }
}
