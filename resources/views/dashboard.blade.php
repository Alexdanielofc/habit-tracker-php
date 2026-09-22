@php use Carbon\Carbon; @endphp
<x-layout>
  <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">

    {{-- NAVBAR --}}
    <x-navbar/>


    {{-- CONTENT --}}
    <div class="flex flex-col gap-4 items-start">

      <x-title>
        {{ Carbon::now()->locale('pt_BR')->translatedFormat('l, d \d\e F') }}
      </x-title>


      <ul class="flex flex-col gap-2 w-full ">
        @forelse ($habits as $item)

          <li class="habit-shadow-lg p-2 bg-boxhab rounded cursor-pointer ">
            <form
              method="POST"
              action="{{ route('habit.toggle', $item->id) }}"
              class="flex gap-2 items-center"
              id="form-{{ $item->id }}"
            >
              @csrf

              <input
                type="checkbox"
                class="w-5 h-5"
                {{ $item->wasCompletedToday() ? 'checked' : '' }}
                onchange="document.getElementById('form-{{ $item->id }}').submit()"
              />

              <p class="font-bold text-md">
                {{ $item->name }}
              </p>

            </form>
          </li>
        @empty
          <p class="mb-4">
            Ainda não tem nenhum hábito cadastrado.
          </p>
          <a href="{{ route('habits.create') }}" class="bg-white p-2 border-2 hover:underline">
            Cadastre um novo hábito agora
          </a>
        @endforelse
      </ul>

      <a href="{{ route('habits.create') }}" class="habit-btn font-bold bg-hc1 px-2 py-1">
        + Adicionar
      </a>

    </div>
  </main>
</x-layout>
