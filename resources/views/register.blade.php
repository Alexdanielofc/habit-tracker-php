<x-layout>
  <main class="py-10">
    <section class="bg-white max-w-600px mx-auto p-10 pb-6 border-2 mt-4">

      <h1 class="font-bold text-2xl">
        Registre-se
      </h1>

      <p class="mt-4 mb-4 ">
        Preencha as informações para cadastrar seus hábitos
      </p>

      <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col">
        @csrf

        <div class="flex flex-col gap-2 mb-4">
          <label for="name" class="font-bold">
            Name
          </label>
          <input
            type="text"
            name="name"
            placeholder="Your Name"
            class="bg-white p-2 border-2 @error('name') border-red-500 @enderror"
          >

          @error('name')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror


        <div class="flex flex-col gap-2 mb-4">
          <label for="email" class="font-bold">
            Email
          </label>
          <input
          type="email"
          name="email"
          placeholder="your@email.com"
          class="bg-white p-2 border-2 @error('email') border-red-500 @enderror"
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
            class="bg-white p-2 border-2 @error('password') border-red-500 @enderror"
          >

          @error('password')
            <p class="text-red-500 text-sm">
              {{ $message }}
            </p>
          @enderror

        </div>

          <div class="flex flex-col gap-2 mb-4">
            <label for="password_confirmation" class="font-bold">
              Repita sua senha
            </label>
            <input
              type="password"
              name="password_confirmation"
              placeholder="********"
              class="bg-white p-2 border-2 @error('password_confirmation') border-red-500 @enderror"
            >

            @error('password')
            <p class="text-red-500 text-sm">
              {{ $message }}
            </p>
            @enderror

          </div>


        <button
          type="submit"
          class="mt-4 mb-4 bg-orange-500 border-2 p-2 font-bold hover:bg-orange-600 "
        >
          Cadastrar
        </button>

        <p class="text-center">
          Já tem uma conta?
          <a href="{{ route('site.login') }}" class="underline hover:opacity-50 transition">
            Faça login
          </a>
        </div>
      </form>
    </section>
  </main>
</x-layout>
