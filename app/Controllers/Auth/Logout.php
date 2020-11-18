<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Logout extends BaseController
{
    public function index()
    {
        session()->destroy();

        return redirect()->to('/auth/login');
    }
}
