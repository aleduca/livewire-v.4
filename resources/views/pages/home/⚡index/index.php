<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\User;
use Livewire\WithPagination;

new class extends Component {
	use WithPagination;

	public function rendering()
	{
		dump('rendering');
	}

	public function rendered()
	{
		dump('rendered');
	}

	#[Computed]
	public function users()
	{
		return User::paginate(10);
	}

	public function render()
	{
		return $this->view();
	}
};
