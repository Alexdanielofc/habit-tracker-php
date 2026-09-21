@php use App\Models\Habit; @endphp
@props([
  'habit',
   'year' => null
])

@php
  $selectedYear = $year ?? now()->year;
  $weeks = Habit::generateYearGrid($selectedYear);
@endphp

<div class="mb-6">
  {{-- NOME + ANO --}}
  <h2 class="font-bold text-lg">
    {{ $habit->name }}
  </h2>

  {{-- GRID --}}
  <div class="bg-orange-50 p-2 habit-shadow-lg">
    <div class="flex gap-1 justify-between w-full">
      @foreach($weeks as $week)
        <div class="flex flex-col gap-1">
          @foreach($week as $day)
            @if($day === null)
              {{-- Espaço vazio para alinhar semanas --}}
              <div class="w-3 h-3"></div>
            @else
              {{-- DIA --}}
              <div class="w-3 h-3 rounded-xs cursor-pointer transition hover:ring-2 hover:ring-blue-400
                   {{ $habit->wasCompletedOn($day) ? 'bg-hc1' : 'bg-cinzac' }}"
                   title="{{ $day->format('d/m/Y') }} - {{ $day->translatedFormat('l') }}"
              ></div>
            @endif
          @endforeach
        </div>
      @endforeach
    </div>
  </div>

  {{-- LEGENDA --}}
  <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
    <div class="flex items-center gap-1.5">
      <div class="w-3 h-3 bg-cinzac rounded-xs"></div>
      <span>Não feito</span>
    </div>
    <div class="flex items-center gap-1.5">
      <div class="w-3 h-3 bg-hc1 rounded-xs"></div>
      <span>Feito</span>
    </div>
  </div>
</div>
