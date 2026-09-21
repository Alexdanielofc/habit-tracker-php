@php
  $type = session()->has('success') ? 'success'
      : (session()->has('error') ? 'error'
      : 'warning');

  $message = session($type);

  $styles = [
    'success' => 'bg-green-100 border-green-400 text-green-700',
    'error' => 'bg-red-100 border-red-400 text-red-700',
    'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700'
  ];
@endphp

@if(session()->has('success') || session()->has('error') || session()->has('warning'))
  <div id="toast" class="flex gap-2 absolute top-22 right-10 border-2 p-3 mt-4 items-center
  {{ $styles[$type] }}">

    {{-- ICON --}}
    <x-dynamic-component :component="'icons.' . $type" class="mt-4" />

    {{-- MESSAGE --}}
    <p>
      {{ $message }}
    </p>
  </div>

  <script>
     setTimeout(() => {
       const $toast = document.getElementById('toast');
       if ($toast) {
         $toast.remove();
       }
     }, 3000);
  </script>
@endif
