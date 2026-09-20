<nav>
  <ul class="flex g-4 items-center">
    <li>
      <a href="{{ route('habits.index') }}"
         class="{{ Route::is('habits.index')? 'font-bold underline' : '' }} border-r-2 border-hc1 pr-2 hover:underline" >
        Hoje
      </a>
    </li>
    <li>
      <a href="#" class=" border-r-2 border-hc1 pr-2 pl-2 hover:underline" >
        Histórico
      </a>
    </li>
    <li>
      <a href="#" class=" border-r-2 border-hc1 pr-2 pl-2 hover:underline" >
        Calendário
      </a>
    </li>
    <li>
      <a href="{{ route('habit.settings') }}"
         class="{{ Route::is('habit.settings')? 'font-bold underline' : '' }} pl-2 hover:underline" >
        Gerenciar Hábitos
      </a>
    </li>
  </ul>
</nav>
