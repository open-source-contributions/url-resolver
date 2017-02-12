<?php
declare(strict_types = 1);

namespace Tests\Innmind\UrlResolver\Specification;

use Innmind\UrlResolver\{
    Specification\RelativePath,
    Url
};
use PHPUnit\Framework\TestCase;

class RelativePathTest extends TestCase
{
    public function testIsSatisfiedBy()
    {
        $s = new RelativePath;

        $this->assertTrue($s->isSatisfiedBy(new Url('./path/to/content')));
        $this->assertTrue($s->isSatisfiedBy(new Url('../path/to/content')));
        $this->assertTrue($s->isSatisfiedBy(new Url('path/to/content')));
        $this->assertTrue($s->isSatisfiedBy(new Url('_path/to/content')));
        $this->assertTrue($s->isSatisfiedBy(new Url('.path/to/content')));
        $this->assertTrue($s->isSatisfiedBy(new Url('42path/to/content')));
        $this->assertTrue($s->isSatisfiedBy(new Url('!path/to/content')));
        $this->assertFalse($s->isSatisfiedBy(new Url('?foo')));
        $this->assertFalse($s->isSatisfiedBy(new Url('#blabla')));
    }
}