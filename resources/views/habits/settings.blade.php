<x-layout>
  <main class="py-10 px-4">

    <x-navbar />

    @session('success')
    <div class="flex">
      <p class="bg-green-100 border-2 border-green-400 text-green-700 p-3 mt-4">
        {{ session('success') }}
      </p>
    </div>
    @endsession

    <div>
      <h2 class="text-lg mt-8 mb-2">
        Configurar Hábitos
      </h2>

      <ul class="flex flex-col gap-2">
        @forelse ($habits as $item)
          <li class="habit-shadow-lg p-2 bg-boxhab">
            <div class="flex gap-2 items-center">
              <p class="font-bold text-md">
                {{ $item->name }}
              </p>

              <a href="{{ route('habits.edit', $item) }}" class="bg-pen p-1 border-2 hover:opacity-50 cursor-pointer">
                <x-icons.pen />
              </a>

              <form action="{{ route('habits.destroy', $item) }}" method="POST" class="">
                @csrf
                @method('DELETE')

                <button type="submit" class="bg-trash  p-1 border-2 hover:opacity-50">
                  <x-icons.trash />
                </button>
              </form>

            </div>
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

    </div>
  </main>
</x-layout>
