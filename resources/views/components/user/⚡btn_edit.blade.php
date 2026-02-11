<?php

use Livewire\Component;
use App\Models\User;

new class extends Component
{
  public User $user;

  public function edit(){
     $this->dispatch('openSaveUser',id:$this->user->id);
  }
};
?>
<button wire:click="edit" class="text-indigo-400 hover:text-indigo-300 cursor-pointer">
  <span wire:loading.remove wire:target="edit">Edit</span>
  <span wire:loading wire:target="edit">
    <x-loading />
  </span>
</button>
