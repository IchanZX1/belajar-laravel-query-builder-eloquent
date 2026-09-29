<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Acara18Controller extends Controller
{
    public function create()
    {
        return view('acara18.create', ['hasil' => session('hasil')]);
    }

    public function createAction()
    {
        if (User::where('email', 'john@example.com')->exists()) {
            return redirect('/acara18/create')->with('hasil', 'create() dilewati: john@example.com sudah ada di tabel users.');
        }

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

        return redirect('/acara18/create')->with('hasil', 'create() berhasil menambah John Doe. save() berhasil menambah Jane Doe.');
    }

    public function retrieve()
    {
        $users = User::all();

        $user = User::find(1);

        $users2 = User::where('email', 'john@example.com')->get();

        try {
            $user2 = User::where('email', 'john@example.com')->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $user2 = null;
        }

        return view('acara18.retrieve', compact('users', 'user', 'users2', 'user2'));
    }

    public function update()
    {
        $user = User::where('email', 'john@example.com')->first();

        return view('acara18.update', ['hasil' => session('hasil'), 'user' => $user]);
    }

    public function updateAction()
    {
        $baris = User::where('email', 'john@example.com')->update(['name' => 'John Updated']);

        $user = User::find(1);

        if ($user) {
            $user->name = 'John Updated';
            $user->save();
        }

        return redirect('/acara18/update')->with('hasil', "update() mengubah $baris baris menjadi 'John Updated'. save() pada User::find(1) juga menyimpan nama yang sama.");
    }

    public function delete()
    {
        $users = User::all();

        return view('acara18.delete', ['hasil' => session('hasil'), 'users' => $users]);
    }

    public function deleteAction()
    {
        $user = User::find(1);

        if ($user) {
            $user->delete();
        }

        User::destroy(1);

        return redirect('/acara18/delete')->with('hasil', 'delete() dan destroy(1) dijalankan. Karena model User memakai SoftDeletes, baris tidak benar-benar hilang dari database, hanya ditandai deleted_at.');
    }
}
