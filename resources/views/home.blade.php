<x-layout>
  <main class="max-w-5xl mx-auto py-10 px-4 w-full ">

  <div class="text-center">
    <x-title>
      Veja seu hábitos ganharem vida
    </x-title>


    <div class=" flex justify-center gap-4 m-4 p-4">

      @auth
        <a href="{{ route('habits.index') }}" class="habit-btn bg-hc1 px-2 py-2">
            DASHBOARD
        </a>
      @endauth

      @guest
          <a href="{{ route('site.login') }}" class="habit-btn bg-hc1 px-2 py-2">
            LOGUE
          </a>
      @endguest
    </div>
  </div>
  </main>
</x-layout>
