<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\User;

new class extends Component {
	#[Computed]
	public function users()
	{
		return User::all();
	}
};
