@extends('layouts.app')

@section('title', 'ACARA 17 — 9) Subquery (Query di dalam Query)')

@section('content')
    <p class="ket">selectSub() menjalankan query lain di dalam sebuah kolom. Contoh di bawah menghitung jumlah order milik tiap user.</p>

    <h2>selectSub()</h2>
    <pre>$users = DB::table('users')
    ->select('name')
    ->selectSub(function ($query) {
        $query->from('orders')->selectRaw('count(*)')
            ->whereColumn('orders.user_id', 'users.id');
    }, 'order_count')
    ->get();</pre>

    @if ($users->isEmpty())
        <div class="kosong">Tabel users kosong.</div>
    @else
        <table>
            <thead><tr><th>name</th><th>order_count</th></tr></thead>
            <tbody>
                @foreach ($users as $u)
                    <tr><td>{{ $u->name }}</td><td>{{ $u->order_count }}</td></tr>
                @endforeach
            </tbody>
        </table>
        <p class="ket">Kolom order_count tidak ada di tabel users. Nilainya dihitung dari tabel orders oleh subquery.</p>
    @endif
@endsection
