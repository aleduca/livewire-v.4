<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Blog Index')] class extends Component {
	public function render()
	{
		return $this->view()->layout('layouts::blog');
	}
};
