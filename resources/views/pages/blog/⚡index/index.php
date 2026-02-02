<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::blog')] class extends Component {
	public function render()
	{
		return $this->view(['name' => 'Alexandre'])->layout('layouts::blog', ['lang' => 'FR'])->title('');
	}
};
