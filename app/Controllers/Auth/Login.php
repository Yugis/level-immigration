<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->data['title'] = 'Login Page';
    }
    public function index()
    {
        echo view('partials/header', $this->data);
        echo view('auth/login');
        return view('partials/footer');
    }

    public function store()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|validateUser[email,password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'Either email or password are invalid!'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            $this->data['validation'] = $this->validator;
            echo view('partials/header', $this->data);
            echo view('auth/login');
            return view('partials/footer');
        } else {
            $user = (new UserModel())->where('email', $this->request->getVar('email'))->first();

            $this->setUserSession($user);

            return redirect()->to('/dashboard');
        }
    }

    private function setUserSession($user)
    {
        $data['user'] = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'isLoggedIn' => true,
        ];
        return session()->set($data);
    }
}
