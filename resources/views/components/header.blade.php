<header class="bg-white border-b-2 flex items-center justify-between p-4">
  {{--  LOGO --}}
  <div class="bg-orange-500 border-2 p-2 font-bold">
    logo
  </div>

  {{-- GitHub --}}
  <div>
    @auth
      <form action="{{ route('auth.logout') }}" method="POST">
        @csrf

        <button type="submit" class="bg-orange-500 border-2 p-2 font-bold hover:bg-orange-400 ">
          Sair
        </button>
      </form>
    @endauth

    @guest
        <a href="{{ route('site.login') }}" class="bg-orange-500 border-2 p-2 font-bold hover:bg-orange-400 ">
          Login
        </a>
    @endguest
  </div>
</header>
