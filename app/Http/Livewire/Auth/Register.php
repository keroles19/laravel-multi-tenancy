<?php

namespace App\Http\Livewire\Auth;

use App\Models\Tenant;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $companyName = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:6'],
            'companyName' => ['required', 'string', 'unique:tenants,name', 'min:6'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);
        // crate new tenant
        $tenant = Tenant::create([
            'name' => $this->companyName,
        ]);
        // create new User
        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'role' => 'admin',
            'password' => Hash::make($this->password),
            'tenant_id' => $tenant->id,
        ]);

        $user->sendEmailVerificationNotification();

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function updated($value) {
        $this->resetErrorBag($value);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
