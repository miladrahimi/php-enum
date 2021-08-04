<?php

namespace MiladRahimi\Enum\Tests;

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

    public function test_all_method()
    {
        $items = SampleEnum::all();

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

    public function test_value_of_method()
    {
        $this->assertSame('sth', SampleEnum::valueOf('STR'));
        $this->assertSame(1, SampleEnum::valueOf('ONE'));
        $this->assertSame(1, SampleEnum::valueOf('UNO'));
    }

    public function test_keys_of_method()
    {
        $this->assertSame(['STR'], SampleEnum::keysOf('sth'));
        $this->assertSame(['ONE', 'UNO'], SampleEnum::keysOf(1));
    }

    public function test_key_of_method()
    {
        $this->assertSame('STR', SampleEnum::keyOf('sth'));
        $this->assertSame('ONE', SampleEnum::keyOf(1));
    }

    public function test_random_key()
    {
        $this->assertArrayHasKey(SampleEnum::randomKey(), SampleEnum::all());
    }

    public function test_random_key_except_keys()
    {
        $this->assertContains(SampleEnum::randomKeyExceptKeys(['ONE', 'TWO']), ['UNO', 'STR']);
    }

    public function test_random_key_except_values()
    {
        $this->assertContains(SampleEnum::randomKeyExceptValues([SampleEnum::STR, SampleEnum::TWO]), ['ONE', 'UNO']);
    }

    public function test_random_value()
    {
        $this->assertContains(SampleEnum::randomValue(), SampleEnum::all());
    }

    public function test_random_value_except_values()
    {
        $this->assertContains(SampleEnum::randomValueExceptValues([SampleEnum::STR, SampleEnum::TWO]),
            [SampleEnum::ONE]
        );
    }

    public function test_random_value_except_keys()
    {
        $this->assertContains(SampleEnum::randomValueExceptKeys(['STR', 'TWO']), [SampleEnum::ONE]);
    }
}
