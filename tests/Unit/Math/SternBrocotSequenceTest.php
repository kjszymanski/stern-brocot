<?php

namespace App\Tests\Unit\Math;

use App\Math\SternBrocotSequence;
use PHPUnit\Framework\TestCase;

class SternBrocotSequenceTest extends TestCase
{
    /**
     * @test
     * @dataProvider nsAndNthSequenceValues
     */
    public function shouldReturnNthSequenceValue($n, $expectedValue)
    {
        $this->assertEquals($expectedValue, SternBrocotSequence::calculateNthSequenceValue($n));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidNs
     */
    public function shouldThrowsException($invalidN)
    {
        SternBrocotSequence::calculateNthSequenceValue($invalidN);
    }

    /**
     * @test
     * @dataProvider nsAndMaxValueInSentence
     */
    public function shouldReturnMaxValueInSentence($n, $expectedMax)
    {
        $this->assertEquals($expectedMax, SternBrocotSequence::calculateMaxValueInSentence($n));
    }

    public function nsAndNthSequenceValues()
    {
        return [
            [0, 0],
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 1],
            [5, 3],
            [9, 4],
            [10, 3],
            [91, 19],
            [99998, 557],
            [99999, 684],
        ];
    }

    public function invalidNs()
    {
        return [
            [-1],
            [100000],
        ];
    }

    public function nsAndMaxValueInSentence()
    {
        return [
            [0, 0],
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 2],
            [5, 3],
            [9, 4],
            [10, 4],
            [91, 21],
            [99998, 2584],
            [99999, 2584],
        ];
    }
}
