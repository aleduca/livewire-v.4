<div>
  <div class="max-w-5xl mx-auto">
    <div class="rounded-xl border border-slate-800 bg-slate-900 shadow-sm">
      <!-- Header -->
      <div class="flex items-center justify-between px-6 py-4 border-b border-slate-800">
        <div>
          <h2 class="text-lg font-semibold text-white">
            Usuários ({{ $this->users->count() }})
          </h2>
          <p class="text-sm text-slate-400">
            Listagem de usuários
          </p>
        </div>

        <button class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500 transition">
          Novo usuário
        </button>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-slate-800/50 text-slate-400">
            <tr>
              <th class="px-6 py-3 text-left font-medium">Nome</th>
              <th class="px-6 py-3 text-left font-medium">Email</th>
              <th class="px-6 py-3 text-left font-medium">Criado em</th>
              <th class="px-6 py-3 text-center font-medium">Ações</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-slate-800">
            <!-- Linha -->
            @foreach($this->users as $user)
            <livewire:user.index :$user :key="$user->id" />
            @endforeach

            <!-- Repete -->
          </tbody>
        </table>

        <div class="flex items-center justify-center px-6 py-4 border-t border-slate-800 text-sm text-slate-400">
          <div class="flex items-center gap-2">
            {{ $this->users->links() }}
          </div>
        </div>

      </div>

    </div>
  </div>


</div>
