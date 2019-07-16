<?php
/**
 * 数据供给器
 */
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [1,2,3],
            [1,1,2],
            [2,0,2]
        ];
    }
}