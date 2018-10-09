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
        $items = SampleEnum1::items();

        $this->assertSame($this->sample1, $items);
    }

    public function test_keys_method()
    {
        $keys = SampleEnum1::keys();

        $this->assertSame($this->sample1Keys, $keys);
    }

    public function test_values_method()
    {
        $values = SampleEnum1::values();

        $this->assertSame($this->sample1Values, $values);
    }

    public function test_hasKey_method()
    {
        $this->assertTrue(SampleEnum1::hasKey($this->sample1Keys[0]));
        $this->assertFalse(SampleEnum1::hasKey(''));
    }

    public function test_hasValue_method()
    {
        $this->assertTrue(SampleEnum1::hasValue($this->sample1Values[0]));
        $this->assertFalse(SampleEnum1::hasValue(''));
    }
}