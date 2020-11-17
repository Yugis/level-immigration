<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
    public function __construct()
    {
        $this->data['title'] = 'Register Page';
    }
    public function index()
    {
        echo view('partials/header', $this->data);
        echo view('auth/register');
        return view('partials/footer');
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required',
            'password_confirmation' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            $this->data['validation'] = $this->validator;

            echo view('partials/header', $this->data);
            echo view('auth/register');
            return view('partials/footer');
        } else {
            $user = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password')
            ];
            // die(json_encode($data));
            $user->save($data);
            return redirect()->to('/properties/create');
            // die(json_encode($this->request->getRawInput()));
        }
    }
}
