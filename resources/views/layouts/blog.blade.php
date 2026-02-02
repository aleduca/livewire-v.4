<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title ?? 'Livewire 4' }}</title>

  @vite('resources/css/app.css')
  @livewireStyles
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">

  <!-- Header -->
  <header class="border-b border-slate-200 bg-white">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
      <span class="text-sm font-semibold tracking-wide text-slate-900">
        Livewire 4
      </span>

      <span class="text-xs text-slate-500">
        Meu blog
      </span>
    </div>
  </header>

  <!-- Conteúdo -->
  <main class="max-w-6xl mx-auto px-6 py-10">
    <div class="rounded-xl bg-white border border-slate-200 shadow-sm p-6">
      {{ $menu ?? 'Menu' }}
      {{ $slot }}
    </div>
  </main>

  <!-- Footer -->
  <footer class="border-t border-slate-200 bg-white">
    <div class="max-w-6xl mx-auto px-6 py-4 text-xs text-slate-500 text-center">
      Exemplo de layout de um blog • Livewire 4
    </div>
  </footer>

  @livewireScripts
</body>
</html>
