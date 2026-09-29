@extends('layouts.app')

@section('title', 'ACARA 17 — 2) Mengambil Data dari Database')

@section('content')
    <p class="ket">get(), first(), where(), select(), dan operator pembanding.</p>

    <h2>a) get() — mengambil semua data</h2>
    <pre>$users = DB::table('users')->get();</pre>
    @if ($users->isEmpty())
        <div class="kosong">Tabel users kosong. Jalankan poin 1) Insert dulu.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Status</th><th>Role</th><th>Age</th><th>Points</th></tr></thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->status }}</td>
                        <td>{{ $u->role }}</td>
                        <td>{{ $u->age }}</td>
                        <td>{{ $u->points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>b) first() — satu baris pertama yang cocok</h2>
    <pre>$user = DB::table('users')->where('email', 'johndoe@example.com')->first();</pre>
    @if (!$user)
        <div class="kosong">johndoe@example.com tidak ditemukan.</div>
    @else
        <table>
            <tbody>
                <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                <tr><th>Status</th><td>{{ $user->status }}</td></tr>
            </tbody>
        </table>
    @endif

    <h2>c) select() — menentukan kolom yang diambil</h2>
    <pre>$users = DB::table('users')->select('id', 'name')->get();</pre>
    <table>
        <thead><tr><th>ID</th><th>Name</th></tr></thead>
        <tbody>
            @foreach ($users2 as $u)
                <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td></tr>
            @endforeach
        </tbody>
    </table>

    <h2>d) where() dengan banyak kondisi</h2>
    <pre>$users = DB::table('users')
    ->where('status', 'active')
    ->where('role', 'admin')
    ->get();</pre>
    @if ($users3->isEmpty())
        <div class="kosong">Tidak ada baris yang cocok.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Status</th><th>Role</th></tr></thead>
            <tbody>
                @foreach ($users3 as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->status }}</td><td>{{ $u->role }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>e) where() dengan operator</h2>
    <pre>$users = DB::table('users')->where('age', '>=', 18)->get();</pre>
    @if ($users4->isEmpty())
        <div class="kosong">Tidak ada baris yang cocok.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Age</th></tr></thead>
            <tbody>
                @foreach ($users4 as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->age }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
