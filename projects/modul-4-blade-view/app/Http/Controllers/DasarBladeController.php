<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasarBladeController extends Controller
{
    public function showData() {
        $name = 'Fathur';
        $fruits = ['Apple', 'Banana', 'Orange'];
        $user = [
            'name' => 'Fathur',
            'email' => 'fathur@gmail.com',
            'is_active' => true
        ];
        $product = (object) [
            'id' => 1,
            'name' => 'Laptop',
            'price' => 15000000
        ];

        return view('dasar', compact('name', 'fruits', 'user', 'product'));
    }
}
