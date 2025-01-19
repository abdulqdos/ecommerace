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


    public function authenticate()
    {
        $data = $this->validate();

        if (!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry , the email or password is incorrect.',
                'password' => 'Sorry , the email or password is incorrect.',
            ]);
        }

        $user = Auth::user();

        if ($user['role'] == 'admin') {
            return 'Welcome Back !!';
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
