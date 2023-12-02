<?php

use App\Days\Day1;
use App\Days\Day2;

test('Day 1', function () {
    $this->assertEquals(55477, (new Day1)->part1());
    $this->assertEquals(54431, (new Day1)->part2());
});

test('Day 2', function () {
    $this->assertEquals(2913, (new Day2)->part1());
    $this->assertEquals(55593, (new Day2)->part2());
});
