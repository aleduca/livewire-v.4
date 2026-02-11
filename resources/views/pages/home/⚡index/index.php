<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

new class extends Component {
	use WithPagination;

	#[Url(as:'q')]
	public string $searched = '';

	protected $listeners = [
		'user-created' => 'userCreated',
	];

	public function userCreated()
	{
		$this->reset('searched');

		$this->resetPage();
	}

	public function updatingSearched()
	{
		$this->resetPage();
	}

	public function openCreateUser()
	{
		$this->dispatch('openSaveUser');
	}

	#[Computed]
	public function users()
	{
		return User::where(function ($query) {
			$query->where('name', 'like', '%' . $this->searched . '%')
			->orWhere('email', 'like', '%' . $this->searched . '%');
		})
			->withCount('posts')
			->paginate(10);
	}
};
