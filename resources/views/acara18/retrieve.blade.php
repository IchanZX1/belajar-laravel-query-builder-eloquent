@extends('layouts.app')

@section('title', 'ACARA 18 — 2) Mengambil Data (Retrieve)')

@section('content')
    <p class="ket">all(), find(), where()->get(), dan firstOrFail().</p>

    <h2>a) all() — mengambil semua data</h2>
    <pre>$users = User::all();</pre>
    @if ($users->isEmpty())
        <div class="kosong">Tabel users kosong. Jalankan poin 1) Create dulu.</div>
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

    <h2>b) find() — berdasarkan ID</h2>
    <pre>$user = User::find(1);</pre>
    @if (!$user)
        <div class="kosong">User dengan ID 1 tidak ditemukan.</div>
    @else
        <table>
            <tbody>
                <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
            </tbody>
        </table>
    @endif

    <h2>c) where()->get() — memakai query builder</h2>
    <pre>$users = User::where('email', 'john@example.com')->get();</pre>
    @if ($users2->isEmpty())
        <div class="kosong">Tidak ada baris yang cocok.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>
            <tbody>
                @foreach ($users2 as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->email }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>d) firstOrFail() — error 404 kalau data tidak ada</h2>
    <pre>$user = User::where('email', 'john@example.com')->firstOrFail();</pre>
    @if (!$user2)
        <div class="kosong">Data tidak ditemukan. Di kondisi ini firstOrFail() akan melempar ModelNotFoundException &rarr; halaman 404. Di sini ditangkap agar halaman tetap tampil.</div>
    @else
        <table>
            <tbody>
                <tr><th>ID</th><td>{{ $user2->id }}</td></tr>
                <tr><th>Name</th><td>{{ $user2->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user2->email }}</td></tr>
            </tbody>
        </table>
    @endif
@endsection
