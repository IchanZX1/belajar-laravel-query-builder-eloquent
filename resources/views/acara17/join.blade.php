@extends('layouts.app')

@section('title', 'ACARA 17 — 7) Join (Menggabungkan Tabel)')

@section('content')
    <p class="ket">join() menggabungkan dua tabel yang berhubungan. Inner join hanya menampilkan baris yang punya pasangan, left join menampilkan semua baris tabel kiri.</p>

    <h2>a) Inner Join</h2>
    <pre>$users = DB::table('users')
    ->join('orders', 'users.id', '=', 'orders.user_id')
    ->select('users.name', 'orders.total_price')
    ->get();</pre>
    @if ($inner->isEmpty())
        <div class="kosong">Tidak ada data. Tabel orders masih kosong — jalankan php artisan db:seed.</div>
    @else
        <table>
            <thead><tr><th>users.name</th><th>orders.total_price</th></tr></thead>
            <tbody>
                @foreach ($inner as $row)
                    <tr><td>{{ $row->name }}</td><td>{{ $row->total_price }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>b) Left Join</h2>
    <pre>$users = DB::table('users')
    ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    ->select('users.name', 'orders.total_price')
    ->get();</pre>
    @if ($left->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>users.name</th><th>orders.total_price</th></tr></thead>
            <tbody>
                @foreach ($left as $row)
                    <tr><td>{{ $row->name }}</td><td>{{ $row->total_price ?? '(tidak punya order)' }}</td></tr>
                @endforeach
            </tbody>
        </table>
        <p class="ket">Bandingkan dengan inner join di atas: user yang tidak punya order tetap muncul di sini dengan total_price kosong.</p>
    @endif
@endsection
