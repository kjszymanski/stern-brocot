<?php
declare(strict_types=1);

namespace App\Math;

class SternBrocotSequence
{
    private static $sequence = [
        0 => 0,
        1 => 1
    ];

    public static function calculateNthSequenceValue(int $n) : int
    {
        if ($n < 0 || $n > 99999) {
            throw new \InvalidArgumentException('n should be in range between 0 and 99999');
        }

        if (array_key_exists($n, self::$sequence)) {
            return self::$sequence[$n];
        } elseif ($n % 2 == 0) {
            $i = $n / 2;
            self::$sequence[$n] = self::calculateNthSequenceValue($i);
        } else {
            $i = ($n - 1) / 2;
            self::$sequence[$n] = self::calculateNthSequenceValue($i) + self::calculateNthSequenceValue($i + 1);
        }

        return self::$sequence[$n];
    }

    public static function calculateMaxValueInSentence(int $n) : int
    {
        for ($i = 2; $i <= $n; $i++) {
            self::$sequence[$i] = self::calculateNthSequenceValue($i);
        }

        ksort(self::$sequence);

        return max(array_slice(self::$sequence, 0, $n + 1));
    }
}
