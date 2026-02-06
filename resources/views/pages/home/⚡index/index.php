<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\User;
use Livewire\WithPagination;

new class extends Component {
	use WithPagination;

	#[Computed]
	public function users()
	{
		return User::withCount('posts')->paginate(10);
	}
};

// Computed - dentro proprio componente mesma request
// Computed - persist - dentro do component entre multiplas request do livewire
// Computed - cache - dentro da mesma instância de um component chamado várias vezes e o cache é compartilhado nessas instâncias
