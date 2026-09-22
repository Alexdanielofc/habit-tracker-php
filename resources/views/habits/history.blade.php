<x-layout>
  <main class="max-w-5xl mx-auto py-10 px-4 w-full ">

    {{--NAVBAR--}}
    <x-navbar />

    <x-title>
      Histórico
    </x-title>

    {{-- YAR SELECTION --}}
    <div class="my-4">
      @foreach($availableYears as $y)
        <a href="{{ route('habits.history', $y) }}"
           class="habit-btn inline-block
           {{ $selectedYear == $y ? 'bg-hc1' : 'bg-cinzac' }}">
          {{$y}}
        </a>
      @endforeach
    </div>

    {{-- HISTORICO --}}
    @forelse($habits as $habit)
      <x-contribution :$habit :year="$selectedYear"/>
    @empty
      <div>
        <p class="text-black">
          Nenhum hábito para exibir histórico.
        </p>
        <a href="{{ route('habits.create') }}" class="underline ">
          Crie um novo hábito
        </a>
      </div>
    @endforelse

  </main>
</x-layout>
