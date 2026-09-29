<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Acara 19 - 1) Conditional Clause</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; margin: 26px 0 4px; }
        code { background: #eee; padding: 2px 6px; font-size: 13px; }
        table { border-collapse: collapse; width: 100%; background: #fff; margin-top: 8px; }
        th, td { border: 1px solid #ddd; padding: 7px 11px; font-size: 13px; text-align: left; }
        th { background: #eee; }
        .kosong { background: #fff; border: 1px dashed #bbb; padding: 10px; font-size: 13px; margin-top: 8px; }
    </style>
</head>
<body>
    <h1>ACARA 19 &mdash; 1) Menggunakan Conditional Clause dalam Query</h1>

    <h2>a) where('status', 'active')-&gt;get()</h2>
    @if ($a->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Status</th><th>Role</th><th>Age</th></tr></thead>
            <tbody>
                @foreach ($a as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->status }}</td><td>{{ $u->role }}</td><td>{{ $u->age }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>b) where('status','active')-&gt;orWhere('role','admin')-&gt;get()</h2>
    @if ($b->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Status</th><th>Role</th></tr></thead>
            <tbody>
                @foreach ($b as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->status }}</td><td>{{ $u->role }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>c) whereBetween('age', [18, 30])-&gt;get()</h2>
    @if ($c->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Age</th></tr></thead>
            <tbody>
                @foreach ($c as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->age }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>d) whereIn('role', ['admin', 'editor'])-&gt;get()</h2>
    @if ($d->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Role</th></tr></thead>
            <tbody>
                @foreach ($d as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->role }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>e) whereNull('deleted_at')-&gt;get()</h2>
    @if ($e1->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>deleted_at</th></tr></thead>
            <tbody>
                @foreach ($e1 as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->deleted_at ?? 'NULL' }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>e) whereNotNull('email_verified_at')-&gt;get()</h2>
    @if ($e2->isEmpty())
        <div class="kosong">Tidak ada data (semua email_verified_at masih NULL).</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>email_verified_at</th></tr></thead>
            <tbody>
                @foreach ($e2 as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->email_verified_at }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>f) when($role, ...)-&gt;get() dengan $role = 'admin'</h2>
    @if ($f->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Role</th></tr></thead>
            <tbody>
                @foreach ($f as $u)
                    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->role }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
