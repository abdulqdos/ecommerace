<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Signup extends Component
{
    #[Title('Signup')]

    #[validate('required|min:3|max:12|regex:/^[a-zA-Z\s]+$/')]
    public $name;

    #[validate('required|email|unique:users,email')]
    public $email;


    #[validate('required|min:3|max:12|confirmed')]
    public $password;
    public $password_confirmation ;

    public $remember_me;


    protected $messages = [
        'name.regex' => 'The name must only contain letters and spaces.',
    ];

    public function authenticate()
    {
        $data = $this->validate();


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user'
        ]);

        $remember = $this->remember_me ;

        Auth::login($user, $remember);

        session()->flash('success', 'congratulations! you account has been created.');

        $this->redirectRoute( 'home' , navigate: true );
    }
    public function render()
    {
        return view('livewire.signup');
    }
}
