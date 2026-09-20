<header class="bg-white border-b-2 flex items-center justify-between p-4">

  {{--  LOGO --}}
  <div class="flex items-center gap-2">
    <a href="{{ route('site.index') }}" class="habit-btn bg-hc1 px-2 py-1">
      HT
    </a>
    <p class="font-bold">
      Habit Tracker
    </p>
  </div>

  {{-- GitHub --}}
  <div>
    @auth
      <form
        class="inline"
        action="{{ route('auth.logout') }}"
        method="POST">

        @csrf

        <button type="submit" class="habit-btn bg-white p-2">
          Sair
        </button>
      </form>
    @endauth

    @guest
      <div class="flex gap-2">
        <a href="{{ route('site.login') }}" class="habit-btn bg-hc1 px-2 py-1">
          Logar
        </a>

        <a href="{{ route('site.register') }}" class="habit-btn bg-white px-2 py-1">
          Cadastrar
        </a>
      </div>
    @endguest
  </div>
</header>
