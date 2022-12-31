<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Update extends Component
{
    use AuthorizesRequests;

    public ?Group $group = null;

    protected array $rules = [
        'group.name' => ['required', 'min:3', 'max:30', 'string', 'unique:groups.name']
    ];

    public function mount()
    {
        $this->authorize('update', $this->group);
    }

    public function save()
    {
        $this->validate();

        $this->group->save();
    }

    public function render()
    {
        return view('livewire.groups.update');
    }
}
