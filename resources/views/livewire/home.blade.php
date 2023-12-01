<div class="space-y-8">
    <div class="space-y-8">
        <div>
            <h2 class="uppercase font-bold text-nord-14 text-3xl">Opened days</h2>
        </div>
        <div class="overflow-hidden">
            <div class="flex flex-wrap -m-4">
                @foreach($days as $day)
                    <div class="px-4 py-4">
                        <a href="{{ route('day', ['number' => $day]) }}" class="flex items-center justify-center w-24 h-24 border-4 border-dashed border-nord-14 hover:bg-nord-14 text-center text-nord-14 text-3xl font-bold duration-300 transition-colors hover:text-nord-0">
                            {{ $day }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="space-y-8">
        <div>
            <h2 class="uppercase font-bold text-nord-11 text-3xl">Closed days</h2>
        </div>
        <div class="overflow-hidden">
            <div class="flex flex-wrap -m-4">
                @for($day = count($days)+1; $day <= 25; $day++)
                    <div class="px-4 py-4">
                        <div class="flex items-center justify-center w-24 h-24 border-4 border-dashed border-nord-11 text-nord-11 text-center text-3xl font-bold cursor-not-allowed transition-colors duration-300 hover:bg-nord-11 hover:text-nord-0">
                            {{ $day }}
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
