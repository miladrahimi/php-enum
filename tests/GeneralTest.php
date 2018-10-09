<?php

namespace MiladRahimi\PhpEnum\Tests;

use PHPUnit\Framework\TestCase;

class GeneralTest extends TestCase
{
    private $sample1 = [
        'ONE' => 1,
        'UNO' => 1,
        'TWO' => 2,
        'STR' => 'sth',
    ];

    private $sample1Keys = ['ONE', 'UNO', 'TWO', 'STR'];

    private $sample1Values = [1, 1, 2, 'sth'];

    public function test_items_method()
    {
        $items = SampleEnum::items();

        $this->assertSame($this->sample1, $items);
    }

    public function test_keys_method()
    {
        $keys = SampleEnum::keys();

        $this->assertSame($this->sample1Keys, $keys);
    }

    public function test_values_method()
    {
        $values = SampleEnum::values();

        $this->assertSame($this->sample1Values, $values);
    }

    public function test_hasKey_method()
    {
        $this->assertTrue(SampleEnum::hasKey($this->sample1Keys[0]));
        $this->assertFalse(SampleEnum::hasKey(''));
    }

    public function test_hasValue_method()
    {
        $this->assertTrue(SampleEnum::hasValue($this->sample1Values[0]));
        $this->assertFalse(SampleEnum::hasValue(''));
    }
}