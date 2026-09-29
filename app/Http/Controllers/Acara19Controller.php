<?php

namespace App\Http\Controllers;

use App\Models\User;

class Acara19Controller extends Controller
{
    public function conditionalClause()
    {
        $a = User::where('status', 'active')->get();

        $b = User::where('status', 'active')->orWhere('role', 'admin')->get();

        $c = User::whereBetween('age', [18, 30])->get();

        $d = User::whereIn('role', ['admin', 'editor'])->get();

        $e1 = User::whereNull('deleted_at')->get();

        $e2 = User::whereNotNull('email_verified_at')->get();

        $role = 'admin';
        $f = User::when($role, function ($query, $role) {
            return $query->where('role', $role);
        })->get();

        return view('acara19.conditional', compact('a', 'b', 'c', 'd', 'e1', 'e2', 'f'));
    }

    public function relationships()
    {
        $user = User::with(['profile', 'posts', 'roles'])->find(1);

        return view('acara19.relationships', compact('user'));
    }

    public function mutatorAccessor()
    {
        $user = User::find(1);

        return view('acara19.mutator', compact('user'));
    }

    public function softDeleteView()
    {
        $usersAktif = User::all();

        $usersSemua = User::withTrashed()->get();

        $usersTerhapus = User::onlyTrashed()->get();

        return view('acara19.softdelete', compact('usersAktif', 'usersSemua', 'usersTerhapus'));
    }

    public function softDeleteAction($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        return redirect('/acara19/softdelete');
    }

    public function restoreAction($id)
    {
        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->restore();
        }

        return redirect('/acara19/softdelete');
    }

    public function massAssignmentDemo()
    {
        User::where('email', 'percobaan@example.com')->forceDelete();

        try {
            $user = User::create([
                'id' => 999,
                'name' => 'Percobaan Mass Assignment',
                'email' => 'percobaan@example.com',
                'password' => '123456',
            ]);

            $pesan = "Berhasil dibuat. Kolom 'id' => 999 diabaikan karena tidak ada di \$fillable, "
                . "sehingga data tersimpan dengan ID asli dari database: " . $user->id . ".";
        } catch (\Exception $e) {
            $pesan = "Gagal / Mass Assignment Exception: " . $e->getMessage();
        }

        return view('acara19.massassignment', compact('pesan'));
    }

    public function queryScope()
    {
        $activeUsers = User::active()->get();

        return view('acara19.scope', compact('activeUsers'));
    }
}
