<?php

namespace App\Days;

use App\Helpers\DayConstructor;
use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;

class Day2 implements DayInterface
{
    public Collection $records;

    public function __construct($records = null)
    {
        $this->records = DayConstructor::construct($records, 2);
    }

    public function part1(): int
    {
        $rules = [
            'red' => 12,
            'green' => 13,
            'blue' => 14,
        ];
        $sum = 0;
        foreach ($this->records as $game) {
            $isGamePossible = true;
            $parts = explode(':', $game);
            $gameID = trim(str_replace('Game', '', $parts[0]));
            $sets = trim($parts[1]);
            $setsArr = explode(';', $sets);
            foreach ($setsArr as $set) {
                $set = trim($set);
                $cubes = explode(',', $set);
                foreach ($cubes as $cube) {
                    $cube = trim($cube);
                    $res = explode(' ', $cube);
                    $color = $res[1];
                    $value = $res[0];
                    if ($rules[$color] < $value) {
                        $isGamePossible = false;
                    }
                }
            }
            if ($isGamePossible) {
                $sum += (int) $gameID;
            }
        }

        return $sum;
    }

    public function part2(): int
    {
        $sum = 0;
        foreach ($this->records as $game) {
            $reds = 0;
            $blues = 0;
            $greens = 0;
            $parts = explode(':', $game);
            $sets = trim($parts[1]);
            $setsArr = explode(';', $sets);
            foreach ($setsArr as $set) {
                $set = trim($set);
                $cubes = explode(',', $set);
                foreach ($cubes as $cube) {
                    $cube = trim($cube);
                    $res = explode(' ', $cube);
                    $color = $res[1];
                    $value = $res[0];
                    switch ($color) {
                        case 'red':
                            if ($reds < $value) {
                                $reds = $value;
                            }
                            break;
                        case 'blue':
                            if ($blues < $value) {
                                $blues = $value;
                            }
                            break;
                        case 'green':
                            if ($greens < $value) {
                                $greens = $value;
                            }
                            break;
                    }
                }
            }
            $sum += $greens * $reds * $blues;
        }

        return $sum;
    }
}
