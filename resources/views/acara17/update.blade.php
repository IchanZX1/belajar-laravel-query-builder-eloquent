@extends('layouts.app')

@section('title', 'ACARA 17 — 3) Memperbarui Data')

@section('content')
    <p class="ket">update() mengubah nilai kolom. increment() dan decrement() menambah atau mengurangi nilai kolom angka.</p>

    @if ($hasil)
        <div class="sukses">{{ $hasil }}</div>
    @else
        <div class="info">Klik tombol di bawah untuk menjalankan semua query update.</div>
    @endif

    <h2>Data sebelum diupdate</h2>
    @if (!$user)
        <div class="kosong">johndoe@example.com tidak ditemukan. Jalankan poin 1) Insert dulu.</div>
    @else
        <table>
            <tbody>
                <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                <tr><th>Status</th><td>{{ $user->status }}</td></tr>
                <tr><th>Points</th><td>{{ $user->points }}</td></tr>
            </tbody>
        </table>
    @endif

    <h2>update()</h2>
    <pre>DB::table('users')
    ->where('email', 'johndoe@example.com')
    ->update(['status' => 'inactive']);</pre>

    <h2>increment() dan decrement()</h2>
    <pre>DB::table('users')->where('id', 1)->increment('points', 10);
DB::table('users')->where('id', 1)->decrement('points', 5);</pre>

    <form action="/acara17/update" method="POST">
        @csrf
        <button class="tombol" type="submit">Jalankan update(), increment(), decrement()</button>
    </form>

    <a class="tombol abu" href="/acara17/get">Lihat hasilnya di 2) Get &raquo;</a>
@endsection
