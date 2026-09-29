@extends('layouts.app')

@section('title', 'ACARA 17 — 4) Menghapus Data')

@section('content')
    <p class="ket">delete() menghapus baris tertentu. truncate() menghapus seluruh isi tabel dan mereset auto-increment.</p>

    @if ($hasil)
        <div class="sukses">{{ $hasil }}</div>
    @else
        <div class="info">Pilih salah satu tombol di bawah.</div>
    @endif

    <h2>delete() — menghapus satu baris</h2>
    <pre>DB::table('users')->where('email', 'johndoe@example.com')->delete();</pre>
    <form action="/acara17/delete" method="POST">
        @csrf
        <button class="tombol merah" type="submit">Jalankan delete()</button>
    </form>

    <h2>truncate() — menghapus SEMUA baris (gunak&#8203;an dengan hati-hati)</h2>
    <pre>DB::table('users')->truncate();</pre>
    <p class="ket">Setelah truncate(), semua halaman Acara 17 dan Acara 19 akan tampil kosong. Jalankan ini paling akhir.</p>
    <form action="/acara17/truncate" method="POST" onsubmit="return confirm('Yakin? Seluruh isi tabel users akan dihapus.');">
        @csrf
        <button class="tombol merah" type="submit">Jalankan truncate()</button>
    </form>

    <h2>Kondisi tabel users saat ini</h2>
    @if ($users->isEmpty())
        <div class="kosong">Tabel users kosong.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Status</th></tr></thead>
            <tbody>
                @foreach ($users as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->email }}</td><td>{{ $u->status }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
