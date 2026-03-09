<?php

use App\Livewire\HasFilterUsers;
use App\Livewire\HasInfiniteScroll;
use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

new class extends Component {
	// use WithPagination;
	use HasFilterUsers;
	use HasInfiniteScroll;

	public $orderAscDesc = 'asc';
	public $orderColumn = 'name';

	#[Url(as:'q')]
	public string $searched = '';

	protected $listeners = [
		'user-created' => 'userCreated',
	];

	public function userCreated()
	{
		$this->reset('searched');

		$this->resetInfiniteScroll();
	}

	public function updatingSearched()
	{
		$this->resetInfiniteScroll();
	}

	public function openCreateUser()
	{
		$this->dispatch('openSaveUser');
	}

	public function order(string $orderBy)
	{
		$this->orderAscDesc = ($this->orderColumn !== $orderBy) ? 'asc' : (($this->orderAscDesc === 'asc') ? 'desc' : 'asc');
		$this->orderColumn = $orderBy;

		$this->resetInfiniteScroll();
	}

	public function iconOrder(string $column)
	{
		return ($this->orderColumn === $column) ? 'icon-' . $this->orderAscDesc : 'icon-neutro';
	}

	public function query(): Builder
	{
		$query = User::query()->where(function ($query) {
			$query->where('name', 'like', '%' . $this->searched . '%')
			->orWhere('email', 'like', '%' . $this->searched . '%');
		});

		$query = $this->applyFilters($query, ['age', 'gender']);

		return $query->orderBy($this->orderColumn, $this->orderAscDesc)
		->withCount('posts');
	}

	public function render()
	{
		$this->resolveInfiniteScroll();

		return $this->view();
	}
};
