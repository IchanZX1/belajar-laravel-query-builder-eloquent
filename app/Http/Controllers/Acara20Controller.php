<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class Acara20Controller extends Controller
{
    public function index()
    {
        return view('acara20.form');
    }

    public function submit(Request $request)
    {
        $messages = [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'Email tidak boleh kosong!',
            'password.confirmed' => 'Password tidak cocok!'
        ];

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ], $messages);

        return "Data berhasil divalidasi!";
    }

    public function submitWithRequest(UserRequest $request)
    {
        return "Data berhasil divalidasi!";
    }

    public function submitWithRule(Request $request)
    {
        $request->validate([
            'name' => ['required', new Uppercase]
        ]);

        return "Nama valid dan dalam huruf kapital!";
    }
}
