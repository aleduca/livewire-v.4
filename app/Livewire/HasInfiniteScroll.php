<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;

trait HasInfiniteScroll
{
	public int $perPage = 10;
	public bool $hasMorePages = false;

	public function loadMore()
	{
		$this->perPage += 10;
	}

	abstract public function query(): Builder;

	protected function resetInfiniteScroll()
	{
		$this->reset('perPage');
	}

	protected function resolveInfiniteScroll()
	{
		// 10 + 1 = 11
		$results = $this->query()->limit($this->perPage + 1)->get();

		$this->hasMorePages = $results->count() > $this->perPage;

		return $results->take($this->perPage);
	}
}
