<?php

namespace App\Days;

use App\Helpers\DayConstructor;
use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;

class Day1 implements DayInterface
{
    public Collection $values;

    public function __construct($values = null)
    {
        $this->values = DayConstructor::construct($values, 1);
    }

    public function part1(): int
    {
        $sum = 0;
        foreach ($this->values as $value) {
            $sum = $sum + $this->getValueFromString($value);
        }

        return $sum;
    }

    public function part2(): int
    {
        $sum = 0;
        foreach ($this->values as $value) {
            $sum = $sum + $this->getValueFromString($value, true);
        }

        return $sum;
    }

    private function getValueFromString($string, $convertLetters = false): int
    {
        if ($convertLetters) {
            $string = $this->convertLettersToNumbers($string);
        }
        $numbers = str($string)->matchAll('/[0-9]/');

        return (int) ($numbers->first() . $numbers->last());
    }

    private function convertLettersToNumbers($string): string
    {
        $lettersToNumbers = collect([
            'one' => '1e',
            'two' => '2o',
            'three' => '3e',
            'four' => '4r',
            'five' => '5e',
            'six' => '6x',
            'seven' => '7n',
            'eight' => '8t',
            'nine' => '9e',
        ]);
        $convertedString = '';

        $parts = str_split($string);
        foreach ($parts as $part) {
            $convertedString .= $part;
            $convertedString = str($convertedString)->replace($lettersToNumbers->keys(), $lettersToNumbers->values());
        }

        return $convertedString;
    }
}
