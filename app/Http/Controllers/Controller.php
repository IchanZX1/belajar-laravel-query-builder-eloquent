<?php

namespace App\Http\Controllers;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

abstract class Controller
{
    public function submitForm(Request $request){
        $messages = [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'Email tidak boleh kosong!',
            'password.confirmed' => 'Password tidak cocok!'
        ];

        $request->validate([
            'name'=> ['required', 'min:3', 'max:50', new Uppercase],
            'email'=> 'required|email',
            'password' => 'required|min:6|confirmed'
        ], $messages);
        return "Data berhasil divalidasi!";
    }
}
