<?php

namespace App\Livewire;

use Livewire\Attributes\Url;

trait HasUserFilter
{
	#[Url()]
	public string $age = '';
	#[Url()]
	public string $gender = '';

	public function filterAge(string $operator, int $age)
	{
		$item = $operator . ':' . $age;

		$items = $this->age === '' ? [] : explode(',', $this->age);

		$index = array_search($item, $items);

		if ($index !== false) {
			unset($items[$index]);
		} else {
			$items[] = $item;
		}

		$this->age = implode(',', $items); // <:18,>:30

		$this->resetPage();
	}

	public function filterGender(string $gender)
	{
		$item = '=:' . $gender;

		$items = $this->gender === '' ? [] : explode(',', $this->gender);

		$index = array_search($item, $items);

		if ($index !== false) {
			unset($items[$index]);
		} else {
			$items[] = $item;
		}

		$this->gender = implode(',', $items);

		$this->resetPage();
	}

	public function isChecked(string $filter, string $filterName)
	{
		return in_array($filter, explode(',', $this->$filterName));
	}

	private function apply($query, $filterColumn)
	{
		$query->where(function ($subQuery) use ($filterColumn) {
			foreach (explode(',', $this->$filterColumn) as $filter) {
				[$operator,$filter] = explode(':', $filter);

				$subQuery->orWhere($filterColumn, $operator, $filter);
			}
		});

		return $query;
	}

	public function applyFilters($query)
	{
		// AGE
		if ($this->age) {
			$query = $this->apply($query, 'age');
		}

		// GENDER
		if ($this->gender) {
			$query = $this->apply($query, 'gender');
		}

		return $query;
	}
}
