<?php
use function Laravel\Folio\name;

name('day');

if(isset($number)){
    $class = 'App\Days\Day'.$number;
    $day = new $class;
}
?>

<x-layout>
    <h2 class="text-3xl font-bold text-nord-14 uppercase mb-4">Day {{ $number }}</h2>

    <div class="flex space-x-4">
        <div class="border-nord-14 border-2 border-dashed p-4">
            <div class="text-nord-14 font-bold uppercase text-xl">Part 1:</div>
            <div class="font-bold">{{ $day->part1() }}</div>
        </div>
        <div class="border-nord-14 border-2 border-dashed p-4">
            <div class="text-nord-14 font-bold uppercase text-xl">Part 2:</div>
            <div class="font-bold">{{ $day->part2() }}</div>
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('home') }}" class="border-nord-6 hover:bg-nord-6 hover:text-nord-0 inline-block p-2 border-2 border-dashed">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
    </div>
</x-layout>
