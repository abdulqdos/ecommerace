<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login')]

    #[validate('required|email')]
    public $email = '';

    #[validate('required|min:4|max:12')]
    public $password = '';


    public $remember_me = false;
    public function authenticate()
    {
        $data = $this->validate();

        if (!Auth::attempt($data,$this->remember_me)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry , the email or password is incorrect.',
                'password' => 'Sorry , the email or password is incorrect.',
            ]);
        }

        $user = Auth::user();

        if ($user['role'] == 'admin') {
            session()->flash('success', 'Hello Admin');
            $this->redirect('/admin', navigate: true);
        } else {
            session()->flash('success', 'Welcome Back');
            $this->redirect('/', navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
