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
            $valuesFrom = $this->getValueFromString($value, true);
            $sum = $sum + $valuesFrom;
        }

        return $sum;
    }

    private function getValueFromString($string, $convertLetters = false): int
    {
        if ($convertLetters) {
            return $this->getValueWithLettersConverted($string);
        }

        $numbers = str($string)->matchAll('/[0-9]/');

        return (int) ($numbers->first() . $numbers->last());
    }

    private function getValueWithLettersConverted($string): string
    {
        $firstNumber = $this->getLastOrFirstNumber($string);
        $lastNumber = $this->getLastOrFirstNumber($string, false);

        return (int) ($firstNumber . $lastNumber);
    }

    private function getLastOrFirstNumber($string, $first = true): int
    {
        $lettersToNumbers = collect([
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
        ]);

        $regexp = '/one|two|three|four|five|six|seven|eight|nine/';

        $parts = str_split($string);
        $number = 0;

        if (! $first) {
            $parts = array_reverse($parts);
        }

        $numberString = '';
        foreach ($parts as $part) {
            if ($first) {
                $numberString .= $part;
            } else {
                $numberString = $part . $numberString;
            }

            if (is_numeric($part)) {
                $number = $part;
                break;
            } else {
                if (str($numberString)->isMatch($regexp)) {
                    $match = str($numberString)->match($regexp)->toString();
                    $number = $lettersToNumbers->only($match)->first();
                    break;
                }
            }
        }

        return (int) $number;
    }
}
