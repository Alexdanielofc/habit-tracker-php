<x-layout>
  <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">
    <h1 class="font-bold text-2xl text-center ">
      Cadastrar novo Hábito
    </h1>

    <section class="habit-shadow-lg bg-white max-w-150 mx-auto p-10 pb-6 mt-4">
      <form action="{{ route('habits.store') }}" method="POST" class="flex flex-col">
        @csrf

        <div class="flex flex-col gap-2 mb-4">
          <label for="name" class="text-xl font-bold">
            Nome do Hábito
          </label>
          <input
            type="text"
            name="name"
            placeholder="Ex: Beber 2L de água"
            class="habit-shadow bg-white p-2 @error('name') border-red-500 @enderror"
          >

          @error('name')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror

          <button
            type="submit"
            class="habit-btn bg-hc1 mt-2"
          >
            Cadastrar Hábito
          </button>

        </div>

      </form>
    </section>
  </main>
</x-layout>
