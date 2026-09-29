<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Acara17Controller extends Controller
{
    public function insert()
    {
        return view('acara17.insert', ['hasil' => session('hasil')]);
    }

    public function insertAction()
    {
        if (DB::table('users')->where('email', 'johndoe@example.com')->exists()) {
            return redirect('/acara17/insert')->with('hasil', 'insert() dilewati: johndoe@example.com sudah ada di tabel users.');
        }

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123')
        ]);

        $id = DB::table('users')->insertGetId([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => bcrypt('password123')
        ]);

        return redirect('/acara17/insert')->with('hasil', "insert() berhasil menambah John Doe. insertGetId() berhasil menambah Jane Doe dengan ID yang dihasilkan: $id");
    }

    public function getData()
    {
        $users = DB::table('users')->get();

        $user = DB::table('users')->where('email', 'johndoe@example.com')->first();

        $users2 = DB::table('users')->select('id', 'name')->get();

        $users3 = DB::table('users')->where('status', 'active')->where('role', 'admin')->get();

        $users4 = DB::table('users')->where('age', '>=', 18)->get();

        return view('acara17.get', compact('users', 'user', 'users2', 'users3', 'users4'));
    }

    public function update()
    {
        $user = DB::table('users')->where('email', 'johndoe@example.com')->first();

        return view('acara17.update', ['hasil' => session('hasil'), 'user' => $user]);
    }

    public function updateAction()
    {
        $baris = DB::table('users')
            ->where('email', 'johndoe@example.com')
            ->update(['status' => 'inactive']);

        DB::table('users')->where('id', 1)->increment('points', 10);

        DB::table('users')->where('id', 1)->decrement('points', 5);

        $user = DB::table('users')->where('id', 1)->first();

        $points = $user ? $user->points : '-';

        return redirect('/acara17/update')->with('hasil', "update() mengubah $baris baris: status johndoe@example.com menjadi inactive. increment('points', 10) lalu decrement('points', 5) pada id 1 menghasilkan points = $points.");
    }

    public function delete()
    {
        $users = DB::table('users')->get();

        return view('acara17.delete', ['hasil' => session('hasil'), 'users' => $users]);
    }

    public function deleteAction()
    {
        $baris = DB::table('users')->where('email', 'johndoe@example.com')->delete();

        return redirect('/acara17/delete')->with('hasil', "delete() berhasil menghapus $baris baris dengan email johndoe@example.com.");
    }

    public function truncateAction()
    {
        DB::table('users')->truncate();

        return redirect('/acara17/delete')->with('hasil', 'truncate() berhasil. Seluruh isi tabel users dihapus dan auto-increment direset.');
    }

    public function pluck()
    {
        $names = DB::table('users')->pluck('name');

        $usersKV = DB::table('users')->pluck('name', 'email');

        return view('acara17.pluck', compact('names', 'usersKV'));
    }

    public function aggregate()
    {
        $totalUsers = DB::table('users')->count();

        $totalPoints = DB::table('users')->sum('points');

        $averageAge = DB::table('users')->avg('age');

        $maxSalary = DB::table('employees')->max('salary');

        $minSalary = DB::table('employees')->min('salary');

        return view('acara17.aggregate', compact('totalUsers', 'totalPoints', 'averageAge', 'maxSalary', 'minSalary'));
    }

    public function join()
    {
        $inner = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.name', 'orders.total_price')
            ->get();

        $left = DB::table('users')
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.name', 'orders.total_price')
            ->get();

        return view('acara17.join', compact('inner', 'left'));
    }

    public function sortLimit()
    {
        $users = DB::table('users')->orderBy('name', 'asc')->get();

        $usersLimit = DB::table('users')->limit(10)->get();

        $usersPage2 = DB::table('users')->offset(10)->limit(10)->get();

        return view('acara17.sortlimit', compact('users', 'usersLimit', 'usersPage2'));
    }

    public function subquery()
    {
        $users = DB::table('users')
            ->select('name')
            ->selectSub(function ($query) {
                $query->from('orders')->selectRaw('count(*)')
                    ->whereColumn('orders.user_id', 'users.id');
            }, 'order_count')
            ->get();

        return view('acara17.subquery', compact('users'));
    }

    public function raw()
    {
        $users = DB::table('users')
            ->selectRaw('COUNT(*) as total_users, status')
            ->groupBy('status')
            ->get();

        $users2 = DB::table('users')
            ->whereRaw('age > ? AND status = ?', [18, 'active'])
            ->get();

        return view('acara17.raw', compact('users', 'users2'));
    }
}
