<?php

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
  // #[Reactive]
  // public $users;

  #[Computed]
  public function sales(){
    return Number::currency(mt_rand(1000,5000), 'BRL', 'pt_BR');
  }

   #[Computed]
  public function users(){
    return User::count();
  }

};
?>
<div>
  {{-- <x-refresh wire:click="$refresh" wire:target="$refresh" wire:island="stats" /> --}}
  <button wire:click="$refresh" wire:target="$refresh" wire:island="stats" class="bg-indigo-600 text-white p-1 rounded mb-1 cursor-pointer">Load</button>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
    @island(skip:true, name:'stats')
    @placeholder
    <x-dashboard.loading-card />
    @endplaceholder
    <x-dashboard.card :data="$this->sales" text="Sales" subtext="Sales of the month">
      {{-- <x-refresh wire:click="$refresh" wire:target="$refresh" /> --}}
    </x-dashboard.card>
    @endisland
    @island(skip:true, name:'stats')
    @placeholder
    <x-dashboard.loading-card />
    @endplaceholder
    <x-dashboard.card :data="$this->users" text="Users" subtext="Users registered">
      {{-- <x-refresh wire:click="$refresh" wire:target="$refresh" /> --}}
    </x-dashboard.card>
    @endisland
  </div>
</div>
