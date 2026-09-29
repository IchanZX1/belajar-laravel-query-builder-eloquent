<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Acara 19 - 6) Query Scopes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; margin: 24px 0 4px; }
        pre { background: #1e293b; color: #e2e8f0; padding: 14px; font-size: 13px; overflow-x: auto; }
        table { border-collapse: collapse; width: 100%; background: #fff; margin-top: 8px; }
        th, td { border: 1px solid #ddd; padding: 7px 11px; font-size: 13px; text-align: left; }
        th { background: #eee; }
        .kosong { background: #fff; border: 1px dashed #bbb; padding: 10px; font-size: 13px; margin-top: 8px; }
    </style>
</head>
<body>
    <h1>ACARA 19 &mdash; 6) Query Scopes</h1>

    <h2>Local Scope di app/Models/User.php</h2>
    <pre>public function scopeActive($query)
{
    return $query->where('active', 1);
}</pre>

    <h2>Penggunaan: $activeUsers = User::active()-&gt;get()</h2>
    @if ($activeUsers->isEmpty())
        <div class="kosong">Tidak ada user dengan active = 1.</div>
    @else
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Status</th><th>Active</th></tr></thead>
            <tbody>
                @foreach ($activeUsers as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->status }}</td>
                        <td>{{ $u->active }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
