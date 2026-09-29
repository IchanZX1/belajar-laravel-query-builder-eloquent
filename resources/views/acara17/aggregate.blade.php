@extends('layouts.app')

@section('title', 'ACARA 17 — 6) Aggregate')

@section('content')
    <p class="ket">Query Builder mendukung count(), sum(), avg(), max(), dan min().</p>

    <h2>a) count() — menghitung jumlah baris</h2>
    <pre>$totalUsers = DB::table('users')->count();</pre>
    <div class="angka"><span class="label">totalUsers</span><span class="nilai">{{ $totalUsers }}</span></div>

    <h2>b) sum() — menjumlahkan nilai kolom</h2>
    <pre>$totalPoints = DB::table('users')->sum('points');</pre>
    <div class="angka"><span class="label">totalPoints</span><span class="nilai">{{ $totalPoints ?? 0 }}</span></div>

    <h2>c) avg() — nilai rata-rata</h2>
    <pre>$averageAge = DB::table('users')->avg('age');</pre>
    <div class="angka"><span class="label">averageAge</span><span class="nilai">{{ $averageAge ?? 0 }}</span></div>

    <h2>d) max() dan min() pada tabel employees</h2>
    <pre>$maxSalary = DB::table('employees')->max('salary');
$minSalary = DB::table('employees')->min('salary');</pre>
    @if ($maxSalary === null)
        <div class="kosong">Tabel employees kosong. Jalankan php artisan db:seed dulu.</div>
    @else
        <div class="angka"><span class="label">maxSalary</span><span class="nilai">{{ $maxSalary }}</span></div>
        <div class="angka"><span class="label">minSalary</span><span class="nilai">{{ $minSalary }}</span></div>
    @endif
@endsection
