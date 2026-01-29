<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\User;

class Home extends Component
{
	#[Computed()]
	public function users()
	{
		return User::all();
	}

	public function render()
	{
		return view('home');
	}
}
