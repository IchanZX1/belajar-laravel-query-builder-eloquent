@extends('layouts.app')

@section('title', 'ACARA 18 — 1) Menambahkan Data (Create)')

@section('content')
    <p class="ket">Eloquent menyediakan create() dan save() untuk menambah data. Pastikan $fillable sudah didefinisikan di model User.</p>

    @if ($hasil)
        <div class="sukses">{{ $hasil }}</div>
    @else
        <div class="info">Klik tombol di bawah untuk menjalankan kedua cara penambahan data.</div>
    @endif

    <h2>$fillable pada app/Models/User.php</h2>
    <pre>protected $fillable = ['name', 'email', 'password', 'status', 'role', 'age',
                       'points', 'first_name', 'last_name', 'active'];</pre>

    <h2>a) create()</h2>
    <pre>User::create([
    'name'     => 'John Doe',
    'email'    => 'john@example.com',
    'password' => bcrypt('password')
]);</pre>

    <h2>b) save()</h2>
    <pre>$user = new User;
$user->name = 'Jane Doe';
$user->email = 'jane@example.com';
$user->password = bcrypt('password');
$user->save();</pre>

    <form action="/acara18/create" method="POST">
        @csrf
        <button class="tombol" type="submit">Jalankan create() dan save()</button>
    </form>

    <a class="tombol abu" href="/acara18/retrieve">Lanjut ke 2) Retrieve &raquo;</a>
@endsection
