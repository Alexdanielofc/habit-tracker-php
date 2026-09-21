@php use Illuminate\Support\Facades\Vite; @endphp
  <!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    {{config('app.name')}}
  </title>

  @vite('resources/css/app.css')
</head>

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="bg-hcbg flex flex-col min-h-screen font-ibm relative">

{{--  HEADER --}}
<x-header/>

<main class="flex-1">
  {{$slot}}
</main>

{{--  FOOTER --}}
<x-footer/>

{{-- TOAST --}}
<x-toast/>
<script src="{{ Vite::asset('resources/js/app.js') }}" />

</body>
</html>
