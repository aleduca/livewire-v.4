<div class="rounded-xl border border-slate-800 bg-slate-900 shadow-sm p-6 mb-6">
  <h3 class="text-sm font-semibold text-white mb-4">Filtros</h3>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Age Filter -->
    <div>
      <label class="flex items-center gap-2 cursor-pointer">
        <input wire:click="filterAge('<',18)" type="checkbox" @checked($this->isChecked('<:18','age')) class="rounded border-slate-600 bg-slate-800 text-indigo-600 cursor-pointer">
          <span class="text-sm text-slate-300">Menor de 18 anos</span>
      </label>
      <label class="flex items-center gap-2 cursor-pointer">
        <input wire:click="filterAge('>', 30)" type="checkbox" @checked($this->isChecked('>:30','age')) class="rounded border-slate-600 bg-slate-800 text-indigo-600 cursor-pointer">
        <span class="text-sm text-slate-300">Maior de 30 anos</span>
      </label>
    </div>

    <!-- Gender Filter -->
    <div>
      <label class="flex items-center gap-2 cursor-pointer">
        <input wire:click="filterGender('male')" type="checkbox" @checked($this->isChecked('=:male','gender')) class="rounded border-slate-600 bg-slate-800 text-indigo-600 cursor-pointer">
        <span class="text-sm text-slate-300">Masculino</span>
      </label>
      <label class="flex items-center gap-2 cursor-pointer">
        <input wire:click="filterGender('female')" type="checkbox" @checked($this->isChecked('=:female','gender')) class="rounded border-slate-600 bg-slate-800 text-indigo-600 cursor-pointer">
        <span class="text-sm text-slate-300">Feminino</span>
      </label>
    </div>
  </div>
</div>
