<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
  #[Reactive]
  public $users;

  #[Computed]
  public function sales(){
    return Number::currency(mt_rand(1000,5000), 'BRL', 'pt_BR');
  }


};
?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
  <x-dashboard.card :data="$this->sales" text="Sales" subtext="Sales of the month" />
  <x-dashboard.card :data="$this->users" text="Users" subtext="Users registered" />
</div>
