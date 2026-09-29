<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function createData()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password')
        ]);

        $user = new User;
        $user->name = 'Jane Doe';
        $user->email = 'jane@example.com';
        $user->password = bcrypt('password');
        $user->save();

        return redirect('/users')->with('success', 'Data berhasil ditambahkan');
    }

    public function retrieveData()
    {
        $users = User::all();

        $user = User::find(1);

        $users2 = User::where('email', 'john@example.com')->get();

        try {
            $user2 = User::where('email', 'john@example.com')->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $user2 = null;
        }

        return view('users.index', compact('users', 'user', 'users2', 'user2'));
    }

    public function updateData()
    {
        User::where('email', 'john@example.com')->update(['name' => 'John Updated']);

        $user = User::find(1);

        if ($user) {
            $user->name = 'John Updated';
            $user->save();
        }

        return redirect('/users')->with('success', 'Data berhasil diupdate');
    }

    public function deleteData()
    {
        $user = User::find(1);

        if ($user) {
            $user->delete();
        }

        User::destroy(1);

        return redirect('/users')->with('success', 'Data berhasil dihapus');
    }

    // INI ACARA KE 19 TOLONG BEDAKAN!!
    public function conditionalQuery()
    {
        $users = User::where('status', 'active')->get();
        $users2 = User::where('status', 'active')->orWhere('role', 'admin')->get();
        $users3 = User::whereBetween('age', [18, 30])->get();
        $users4 = User::whereIn('role', ['admin', 'editor'])->get();
        $users5 = User::whereNull('deleted_at')->get();
        $users6 = User::whereNotNull('email_verified_at')->get();

        $role = 'admin';
        $users7 = User::when($role, function ($query, $role) {
            return $query->where('role', $role);
        })->get();

        return $users7;
    }
}
