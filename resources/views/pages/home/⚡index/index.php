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
		return User::paginate(10);
	}
};
