@extends('layouts.app')

@section('title', 'ACARA 17 — 5) Mengambil Daftar Nilai Kolom (pluck)')

@section('content')
    <p class="ket">pluck() mengambil daftar nilai dari satu kolom, atau dua kolom sebagai key dan value.</p>

    <h2>a) pluck() satu kolom</h2>
    <pre>$names = DB::table('users')->pluck('name');</pre>
    @if ($names->isEmpty())
        <div class="kosong">Tabel users kosong.</div>
    @else
        <ul class="data">
            @foreach ($names as $name)
                <li>{{ $name }}</li>
            @endforeach
        </ul>
    @endif

    <h2>b) pluck() dua kolom — email sebagai key, name sebagai value</h2>
    <pre>$users = DB::table('users')->pluck('name', 'email');</pre>
    @if ($usersKV->isEmpty())
        <div class="kosong">Tabel users kosong.</div>
    @else
        <table>
            <thead><tr><th>Key (email)</th><th>Value (name)</th></tr></thead>
            <tbody>
                @foreach ($usersKV as $email => $name)
                    <tr><td class="kode">{{ $email }}</td><td>{{ $name }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
