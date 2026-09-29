<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Acara 19 - 4) Soft Deletes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; margin: 26px 0 4px; }
        table { border-collapse: collapse; width: 100%; background: #fff; margin-top: 8px; }
        th, td { border: 1px solid #ddd; padding: 7px 11px; font-size: 13px; text-align: left; }
        th { background: #eee; }
        a.tombol { display: inline-block; background: #2563eb; color: #fff; padding: 4px 10px; font-size: 12px; text-decoration: none; }
        a.hijau { background: #059669; }
        .kosong { background: #fff; border: 1px dashed #bbb; padding: 10px; font-size: 13px; margin-top: 8px; }
    </style>
</head>
<body>
    <h1>ACARA 19 &mdash; 4) Soft Deletes</h1>

    <h2>b+c) User::all() &mdash; data yang BELUM dihapus</h2>
    @if ($usersAktif->isEmpty())
        <div class="kosong">Tidak ada data aktif.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>deleted_at</th><th>Aksi</th></tr></thead>
            <tbody>
                @foreach ($usersAktif as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->deleted_at ?? 'NULL' }}</td>
                        <td><a class="tombol" href="/acara19/softdelete/hapus/{{ $u->id }}">Soft Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>c) User::withTrashed()-&gt;get() &mdash; SEMUA data termasuk yang dihapus</h2>
    @if ($usersSemua->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>deleted_at</th></tr></thead>
            <tbody>
                @foreach ($usersSemua as $u)
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

    <h2>d+e) User::onlyTrashed()-&gt;get() &mdash; HANYA yang sudah dihapus</h2>
    @if ($usersTerhapus->isEmpty())
        <div class="kosong">Belum ada data yang di-soft delete.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>deleted_at</th><th>Aksi</th></tr></thead>
            <tbody>
                @foreach ($usersTerhapus as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->deleted_at }}</td>
                        <td><a class="tombol hijau" href="/acara19/softdelete/restore/{{ $u->id }}">Restore</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
