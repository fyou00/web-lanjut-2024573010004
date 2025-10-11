<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogicController extends Controller
{
    public function show() {
        $isLoggedIn = true;
        $users = [
            ['name' => 'Fathur', 'role' => 'admin'],
            ['name' => 'Maila', 'role' => 'editor'],
            ['name' => 'Rizky', 'role' => 'subscriber'],
        ];
        $products = [];
        $profile = [
            'name' => 'Fathur',
            'email' => 'fathur@gmail.com'
        ];
        $status = 'active';

        return view('logic', compact('isLoggedIn', 'users', 'products', 'profile', 'status'));
    }
}
