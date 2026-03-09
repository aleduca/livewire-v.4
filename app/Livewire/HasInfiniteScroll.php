<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;

trait HasInfiniteScroll
{
	public int $perPage = 10;
	public int $page = 1;
	public array $items = [];
	public bool $hasMorePages = false;

	public function loadMore()
	{
		$this->page++;
	}

	abstract public function query(): Builder;

	protected function resetInfiniteScroll()
	{
		$this->page = 1;
		$this->items = [];
		$this->hasMorePages = false;
	}

	protected function resolveInfiniteScroll()
	{
		// 10 + 1 = 11
		// 1 - 1 = 0 * 10 = 0
		// 2 - 1 = 1 * 10 = 10
		// 3 - 1 = 2 * 10 = 20
		$results = $this->query()->
		limit($this->perPage + 1)
		->offset(($this->page - 1) * $this->perPage)
		->get();

		$this->hasMorePages = $results->count() > $this->perPage;

		$newItems = $results->take($this->perPage)->toArray();

		$this->items = array_merge($this->items, $newItems);
	}
}
