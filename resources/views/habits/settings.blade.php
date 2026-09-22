<x-layout>
  <main class="max-w-5xl mx-auto py-10 px-4 w-full ">

    {{-- NAVBAR --}}
    <x-navbar />


      <x-title>
        Configurar Hábitos
      </x-title>

      <ul class="flex flex-col gap-2 mt-2">
        @forelse ($habits as $item)
          <li class="flex gap-2  items-center justify-between w-full">

            {{-- ITEM --}}
            <div class="habit-shadow-lg p-2 bg-boxhab w-full">
              <p class="font-bold text-md">
                {{ $item->name }}
              </p>
            </div>

            {{-- EDIT --}}
            <a href="{{ route('habits.edit', $item) }}" class="habit-shadow-lg bg-pen p-2 border-2 hover:opacity-50 cursor-pointer">
              <x-icons.pen />
            </a>

            {{-- DELETE --}}
            <form action="{{ route('habits.destroy', $item) }}" method="POST" class="">
              @csrf
              @method('DELETE')

              <button type="submit" class="habit-shadow-lg bg-trash  p-2 border-2 hover:opacity-50">
                <x-icons.trash />
              </button>
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
  </main>
</x-layout>
