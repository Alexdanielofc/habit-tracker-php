<x-layout>
  <main class="py-10">
    <h1>
      Faça Login
    </h1>
    <section class="mt-4">
      <form action="/login" method="POST">
        @csrf

        @error('email')
          <p class="text-red-500 text-xl mt-1">
            {{ $message }}
          </p>
        @enderror

        <input
        type="email"
        name="email"
        placeholder="your@email.com"
        class="bg-with p-2 border-2"
        >

        <input
          type="password"
          name="password"
          placeholder="********"
          class="bg-with p-2 border-2 "
        >

        <button
          type="submit"
          class="bg-white border-2 p-2"
        >
          Entrar
        </button>
      </form>
    </section>
  </main>
</x-layout>
