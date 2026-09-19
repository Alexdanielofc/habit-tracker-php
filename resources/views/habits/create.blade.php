<x-layout>
  <main class="py-10">
    <h1 class="font-bold text-4xl text-center mb-8">
      Cadastrar novo Hábito
    </h1>

    <section class="bg-white max-w-600px mx-auto p-10 pb-6 border-2 mt-4">
      <form action="{{ route('habit.store') }}" method="POST" class="flex flex-col">
        @csrf

        <div class="flex flex-col gap-2 mb-4">
          <label for="name" class="font-bold">
            Nome do Hábito
          </label>
          <input
            type="text"
            name="name"
            placeholder="Ex: Beber 2L de água"
            class="bg-white p-2 border-2 @error('name') border-red-500 @enderror"
          >

          @error('name')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror

          <button
            type="submit"
            class="mt-4 mb-4 bg-orange-500 border-2 p-2 font-bold hover:bg-orange-600 "
          >
            Cadastrar Hábito
          </button>

        </div>

      </form>
    </section>
  </main>
</x-layout>
