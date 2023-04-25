<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddUser extends Component
{
    use WithFileUploads;

    public $name = "Kevin McKee";
    public $email = "kevin@lc.com";
    public $department = 'information_technology';
    public $title = "Instructor";
    public $photo;
    public $status = 1;
    public $role = 'admin';

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'department' => 'required|string',
            'title' => 'required|string',
            'status' => 'required|boolean',
            'role' => 'required|string',
            'photo' => 'image|max:1024',
        ]);
        $fileName = $this->photo->store('photos');

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'department' => $this->department,
            'title' =>  $this->title,
            'status' => $this->status,
            'role' => $this->role,
            'photo' => $fileName,
            'password' => bcrypt('password')
        ]);


    }

    public function render()
    {
        return view('livewire.add-user');
    }
}
