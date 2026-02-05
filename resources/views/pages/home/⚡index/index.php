<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\User;
use Livewire\WithPagination;

new class extends Component {
	use WithPagination;

	public string $name;
	public string $age;

	public function mount()
	{
		$this->name = 'Alexandre';
		$this->age = 43;
	}

	public function updatedName($property)
	{
		dump('updated ' . $property);
	}

	public function rendering()
	{
		dump('rendering');
	}

	public function rendered()
	{
		dump('rendered');
	}

	public function edit()
	{
	}

	#[Computed]
	public function users()
	{
		return User::paginate(10);
	}
};
