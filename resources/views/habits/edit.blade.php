<x-layout>
  <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">
    <h1 class="font-bold text-2xl text-center">
      Editar Hábito
    </h1>

    <section class="habit-shadow-lg bg-white max-w-150 mx-auto p-10 pb-6 mt-4">
      <form action="{{ route('habits.update', $habit->id) }}" method="POST" class="flex flex-col">
        @csrf
        @method('PUT')

        <div class="flex flex-col gap-2 mb-4">
          <label for="name" class="text-xl font-bold">
            Nome do Hábito
          </label>
          <input
            type="text"
            name="name"
            placeholder="Ex: Beber 2L de água"
            class="bg-white p-2 border-2 habit-shadow @error('name') border-red-500 @enderror"
            value="{{ old('name', $habit->name) }}"
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
            Editar Hábito
          </button>

        </div>

      </form>
    </section>
  </main>
</x-layout>
