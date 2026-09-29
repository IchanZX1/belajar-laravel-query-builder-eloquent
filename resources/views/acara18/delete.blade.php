@extends('layouts.app')

@section('title', 'ACARA 18 — 4) Menghapus Data (Delete)')

@section('content')
    <p class="ket">Eloquent menyediakan delete() dan destroy() untuk menghapus data.</p>

    @if ($hasil)
        <div class="sukses">{{ $hasil }}</div>
    @else
        <div class="info">Klik tombol di bawah untuk menjalankan delete() dan destroy().</div>
    @endif

    <h2>a) delete()</h2>
    <pre>$user = User::find(1);
$user->delete();</pre>

    <h2>b) destroy()</h2>
    <pre>User::destroy(1);</pre>

    <div class="bahaya">
        Model User memakai <strong>SoftDeletes</strong>. Jadi kedua perintah ini tidak menghapus baris dari database &mdash;
        hanya mengisi kolom <code>deleted_at</code>. Setelah dijalankan, user dengan ID 1 akan hilang dari daftar di bawah
        (karena query otomatis menyaring data yang sudah dihapus), tetapi datanya masih tersimpan.
    </div>

    <form action="/acara18/delete" method="POST">
        @csrf
        <button class="tombol merah" type="submit">Jalankan delete() dan destroy(1)</button>
    </form>

    <h2>Kondisi tabel users saat ini</h2>
    @if ($users->isEmpty())
        <div class="kosong">Tidak ada data aktif. Jalankan poin 1) Create dulu.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>deleted_at</th></tr></thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->deleted_at ?? 'NULL' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a class="tombol abu" href="/acara19/softdelete">Lihat data yang terhapus di Acara 19 poin 4 &raquo;</a>
@endsection
