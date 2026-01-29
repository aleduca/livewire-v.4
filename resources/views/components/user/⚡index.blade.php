<?php

use Livewire\Component;
use App\Models\User;

new class extends Component
{
    public User $user;
};
?>

<div>
<tr class="hover:bg-slate-800/40 transition">
    <td class="px-6 py-4 font-medium text-white">
      {{ $user->name }}
    </td>

    <td class="px-6 py-4 text-slate-300">
      {{ $user->email }}
    </td>

    <td class="px-6 py-4 text-slate-400">
      {{ $user->created_at->format('d/m/Y') }}
    </td>

    <td class="px-6 py-4 text-right space-x-3">
     <livewire:user.edit />
     <livewire:user.delete />
    </td>
  </tr>
</div>