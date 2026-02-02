<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('My title attribute')] class extends Component {
	public function render()
	{
		return $this->view(['name' => 'Alexandre'])->layout('layouts::blog');
	}
};
