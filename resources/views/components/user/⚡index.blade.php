<?php

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Computed;

new class extends Component
{
    public User $user;
};
?>

<tr class="hover:bg-slate-800/40 transition">
  <td class="px-6 py-4 font-medium text-white">
    {{ $this->user->name }}
  </td>

  <td class="px-6 py-4 text-slate-300">
    {{ $this->user->email }}
  </td>

  <td class="px-6 py-4 text-slate-400">
    {{ $this->user->created_at->format('d/m/Y') }}
  </td>

  <td class="px-6 py-4 text-slate-400 text-center">
    {{ $this->user->posts_count }}
  </td>

  <td class="px-6 py-4 text-right space-x-3">
    <livewire:user.btn_edit :$user />
    <livewire:user.btn_delete />
  </td>
</tr>
