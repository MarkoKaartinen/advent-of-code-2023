<?php

use App\Days\Day1;

test('Day 1', function () {
    $this->assertEquals(55477, (new Day1)->part1());
    $this->assertEquals(54431, (new Day1)->part2());
});
