@extends('layouts.app')

@section('title', 'ACARA 18 — 3) Memperbarui Data (Update)')

@section('content')
    <p class="ket">Eloquent menyediakan update() dan save() untuk mengubah data.</p>

    @if ($hasil)
        <div class="sukses">{{ $hasil }}</div>
    @else
        <div class="info">Klik tombol di bawah untuk menjalankan kedua cara update.</div>
    @endif

    <h2>Data sebelum diupdate</h2>
    @if (!$user)
        <div class="kosong">john@example.com tidak ditemukan. Jalankan poin 1) Create dulu.</div>
    @else
        <table>
            <tbody>
                <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
            </tbody>
        </table>
    @endif

    <h2>a) update()</h2>
    <pre>User::where('email', 'john@example.com')->update(['name' => 'John Updated']);</pre>

    <h2>b) save()</h2>
    <pre>$user = User::find(1);
$user->name = 'John Updated';
$user->save();</pre>

    <form action="/acara18/update" method="POST">
        @csrf
        <button class="tombol" type="submit">Jalankan update() dan save()</button>
    </form>

    <a class="tombol abu" href="/acara18/retrieve">Lihat hasilnya di 2) Retrieve &raquo;</a>
@endsection
