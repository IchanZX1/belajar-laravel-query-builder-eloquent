@extends('layouts.app')

@section('title', 'ACARA 17 — 8) Pengurutan, Limit, dan Offset')

@section('content')
    <p class="ket">orderBy() mengurutkan, limit() membatasi jumlah baris, offset() melewati sejumlah baris untuk pagination.</p>

    <h2>a) orderBy('name', 'asc')</h2>
    <pre>$users = DB::table('users')->orderBy('name', 'asc')->get();</pre>
    @if ($users->isEmpty())
        <div class="kosong">Tabel users kosong.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>
            <tbody>
                @foreach ($users as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->email }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>b) limit(10)</h2>
    <pre>$users = DB::table('users')->limit(10)->get();</pre>
    @if ($usersLimit->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>
            <tbody>
                @foreach ($usersLimit as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->email }}</td></tr>
                @endforeach
            </tbody>
        </table>
        <p class="ket">Jumlah baris yang diambil: {{ $usersLimit->count() }} (limit maksimal 10).</p>
    @endif

    <h2>c) offset(10)->limit(10)</h2>
    <pre>$users = DB::table('users')->offset(10)->limit(10)->get();</pre>
    @if ($usersPage2->isEmpty())
        <div class="kosong">Kosong — jumlah baris di tabel users belum melewati 10, jadi tidak ada data di halaman kedua.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>
            <tbody>
                @foreach ($usersPage2 as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->email }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
