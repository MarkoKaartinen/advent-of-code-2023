<?php

use App\Days\Day1;

test('Part 1', function () {
    $input = '1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet';
    $day = new Day1(collect(Str::of($input)->explode("\n")));
    $this->assertEquals(142, $day->part1());
});

test('Part 2', function () {
    $input = 'two1nine
eightwothree
abcone2threexyz
xtwone3four
4nineeightseven2
zoneight234
7pqrstsixteen';
    $day = new Day1(collect(Str::of($input)->explode("\n")));
    $this->assertEquals(281, $day->part2());
});

test('Extra 1', function () {
    $input = 'eighthree
sevenine';
    $day = new Day1(collect(Str::of($input)->explode("\n")));
    $this->assertEquals(162, $day->part2());
});

test('Extra 2', function(){
    $input = 'abcone2threexyz';
    $day = new Day1(collect(Str::of($input)->explode("\n")));
    $this->assertEquals(13, $day->part2());
});
