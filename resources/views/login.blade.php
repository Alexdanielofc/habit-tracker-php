<x-layout>
  <main class="py-10">
    <section class="habit-shadow-lg bg-white max-w-150 mx-auto p-10 pb-6 mt-4">

      <h1 class="font-bold text-2xl">
        Logue
      </h1>

      <p class="mt-4 mb-4 ">
          Insira seus dados para acessar
      </p>

      <form
          action="{{ route('auth.login') }}"
          method="POST"
          class="flex flex-col">
        @csrf

        <div class="flex flex-col gap-2 mb-4">
          <label for="email" class="font-bold">
            Email
          </label>
          <input
            type="email"
            name="email"
            placeholder="your@email.com"
            class="bg-white p-2 habit-shadow @error('email') border-red-500 @enderror"
          >

          @error('email')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror

        </div>

        <div class="flex flex-col gap-2 mb-4">
          <label for="password" class="font-bold">
            Senha
          </label>
          <input
            type="password"
            name="password"
            placeholder="********"
            class="bg-white p-2 habit-shadow @error('password') border-red-500 @enderror"
          >

          @error('password')
            <p class="text-red-500 text-sm">
              {{ $message }}
            </p>
          @enderror

        </div>

        <button
          type="submit"
          class="mt-4 mb-4 p-2 habit-btn bg-hc1"
        >
          Login
        </button>

        <p class="text-center">
          Ainda não tem uma conta?
          <a href="{{ route('site.register') }}" class="underline hover:opacity-50 transition">
            Registre-se
          </a>

      </form>
    </section>
  </main>
</x-layout>
