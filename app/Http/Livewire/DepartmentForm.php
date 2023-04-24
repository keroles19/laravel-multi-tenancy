<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Tenant;
use Livewire\Component;

class DepartmentForm extends Component
{
    public $name = '';
    protected $rules = [
        'name' => 'required',
    ];

    public function mount($department_id = null)
    {
        if ($department_id) {
            $this->name = Department::findOrFail($department_id)->name;
        }

    }

    public function submit()
    {
        $this->validate();

        Department::create([
            'name' => $this->name
        ]);
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.department-form');
    }
}
