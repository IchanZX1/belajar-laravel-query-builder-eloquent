<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilder extends Controller
{
    public function insertData()
    {
        if (DB::table('users')->where('email', 'johndoe@example.com')->exists()) {
            return redirect('/get-data')->with('success', 'Data sudah ada di database.');
        }

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
            'status' => 'active',
            'role' => 'admin',
            'age' => 25,
            'points' => 10
        ]);

        $id = DB::table('users')->insertGetId([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => bcrypt('password123'),
            'status' => 'active',
            'role' => 'user',
            'age' => 17,
            'points' => 5
        ]);

        return redirect('/get-data')->with('success', "Data berhasil ditambahkan, ID terakhir: $id");
    }

    public function getData()
    {
        $users = DB::table('users')->get();

        $user = DB::table('users')->where('email', 'johndoe@example.com')->first();

        $users2 = DB::table('users')->select('id', 'name')->get();

        $users3 = DB::table('users')->where('status', 'active')->where('role', 'admin')->get();

        $users4 = DB::table('users')->where('age', '>=', 18)->get();

        return view('users.index', compact('users', 'user', 'users2', 'users3', 'users4'));
    }

    public function updateData()
    {
        DB::table('users')
        ->where('email', 'johndoe@example.com')
        ->update(['status' => 'inactive']);

        DB::table('users')->where('id', 1)->increment('points', 10);

        DB::table('users')->where('id', 1)->decrement('points', 5);

        return redirect('/get-data')->with('success', 'Data berhasil diupdate');
    }

    public function dropData()
    {

        DB::table('users')->where('email', 'johndoe@example.com')->delete();

        DB::table('users')->truncate();

        return redirect('/get-data')->with('success', 'Data berhasil dihapus');
    }

    public function pluckData()
    {
        $names = DB::table('users')->pluck('name');

        $usersKV = DB::table('users')->pluck('name', 'email');

        dd($names, $usersKV);
    }

    public function aggregateData()
    {
        $totalUsers = DB::table('users')->count();

        $totalPoints = DB::table('users')->sum('points');

        $averageAge = DB::table('users')->avg('age');

        $maxSalary = DB::table('employees')->max('salary');
        $minSalary = DB::table('employees')->min('salary');

        dd($totalUsers, $totalPoints, $averageAge);
    }

    public function joinData()
    {
        $users = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.name', 'orders.total_price')
            ->get();

        $usersS = DB::table('users')
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->get();

        return $users;
    }

    public function sortLimitData()
    {
        $users = DB::table('users')->orderBy('name', 'asc')->get();

        $usersLimit = DB::table('users')->limit(10)->get();

        $usersPage2 = DB::table('users')->offset(10)->limit(10)->get();

        return $usersPage2;
    }

    public function subqueryData()
    {
        $users = DB::table('users')
            ->selectRaw('COUNT(*) as total_users, status')
            ->groupBy('status')
            ->get();

        $users = DB::table('users')
            ->whereRaw('age > ? AND status = ?', [18,'active'])->get();

        return $users;
    }

}
