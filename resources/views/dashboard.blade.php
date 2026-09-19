<x-layout>
  <main class="py-10">
    <h1 class="font-bold text-4xl text-center mb-8">
      Dashboard
    </h1>

    <section class="bg-white max-w-600px mx-auto p-10 pb-6 border-2">
      <a href="{{ route('habit.create') }}" class="p-2 border-2 bg-orange-500 font-bold hover:bg-orange-400">
        Cadastrar Hábito
      </a>

      @session('success')
        <div class="flex">
          <p class="bg-green-100 border-2 border-green-400 text-green-700 p-3 mt-4">
            {{ session('success') }}
          </p>
        </div>
      @endsession

      <div>
        <h2 class="text-xl mt-4">
          Listagem dos Hábitos
        </h2>

        <ul class="flex flex-col gap-2">
          @forelse ($habits as $item)
            <li class="pl-4">
              <div class="flex gap-2 items-center">
                <p class="font-bold text-xl">
                  - {{ $item->name }}
                </p>

                <p>
                  [{{ $item->habitLogs->count() }} registros]
                </p>
              </div>
            </li>
          @empty
            <p class="mb-4">
              Ainda não tem nenhum hábito cadastrado.
            </p>
            <a href="{{ route('habit.create') }}" class="bg-white p-2 border-2 hover:underline">
              Cadastre um novo hábito agora
            </a>
          @endforelse
        </ul>

      </div>
    </section>
  </main>
</x-layout>
