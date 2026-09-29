@extends('layouts.app')

@section('title', 'ACARA 17 — 10) Query Raw (Raw SQL)')

@section('content')
    <p class="ket">selectRaw() dan whereRaw() dipakai kalau butuh fleksibilitas SQL mentah.</p>

    <h2>a) selectRaw() dengan groupBy()</h2>
    <pre>$users = DB::table('users')
    ->selectRaw('COUNT(*) as total_users, status')
    ->groupBy('status')
    ->get();</pre>
    @if ($users->isEmpty())
        <div class="kosong">Tabel users kosong.</div>
    @else
        <table>
            <thead><tr><th>total_users</th><th>status</th></tr></thead>
            <tbody>
                @foreach ($users as $u)
                    <tr><td>{{ $u->total_users }}</td><td>{{ $u->status }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>b) whereRaw() dengan parameter terikat</h2>
    <pre>$users = DB::table('users')
    ->whereRaw('age > ? AND status = ?', [18, 'active'])
    ->get();</pre>
    @if ($users2->isEmpty())
        <div class="kosong">Tidak ada baris yang cocok.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th></tr></thead>
            <tbody>
                @foreach ($users2 as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->age }}</td><td>{{ $u->status }}</td></tr>
                @endforeach
            </tbody>
        </table>
        <p class="ket">Tanda ? diganti nilai dari array [18, 'active'] secara berurutan, sehingga aman dari SQL injection.</p>
    @endif
@endsection
