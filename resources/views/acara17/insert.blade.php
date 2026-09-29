@extends('layouts.app')

@section('title', 'ACARA 17 — 1) Pengenalan & Pembuatan Data Baru')

@section('content')
    <p class="ket">Query Builder memakai DB::table() untuk mengakses tabel. Data baru disisipkan dengan insert() atau insertGetId().</p>

    @if ($hasil)
        <div class="sukses">{{ $hasil }}</div>
    @else
        <div class="info">Klik tombol di bawah untuk menjalankan kedua query ini.</div>
    @endif

    <h2>insert() — menambah John Doe</h2>
    <pre>DB::table('users')->insert([
    'name'     => 'John Doe',
    'email'    => 'johndoe@example.com',
    'password' => bcrypt('password123')
]);</pre>

    <h2>insertGetId() — menambah Jane Doe dan mengambil ID-nya</h2>
    <pre>$id = DB::table('users')->insertGetId([
    'name'     => 'Jane Doe',
    'email'    => 'janedoe@example.com',
    'password' => bcrypt('password123')
]);</pre>
    <p class="ket">insertGetId() menyisipkan data sekaligus mengembalikan id dari baris yang baru dibuat.</p>

    <form action="/acara17/insert" method="POST">
        @csrf
        <button class="tombol" type="submit">Jalankan insert() dan insertGetId()</button>
    </form>

    <a class="tombol abu" href="/acara17/get">Lanjut ke 2) Get &raquo;</a>
@endsection
