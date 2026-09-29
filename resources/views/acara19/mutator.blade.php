<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Acara 19 - 3) Mutators &amp; Accessors</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; margin: 24px 0 4px; }
        table { border-collapse: collapse; background: #fff; margin-top: 8px; min-width: 620px; }
        th, td { border: 1px solid #ddd; padding: 7px 11px; font-size: 13px; text-align: left; }
        th { background: #eee; width: 260px; }
        td.kode { font-family: Consolas, monospace; word-break: break-all; }
        .kosong { background: #fff; border: 1px dashed #bbb; padding: 10px; font-size: 13px; }
    </style>
</head>
<body>
    <h1>ACARA 19 &mdash; 3) Mutators &amp; Accessors</h1>

    @if (!$user)
        <div class="kosong">User dengan ID 1 tidak ditemukan.</div>
    @else
        <h2>$user = User::find(1)</h2>
        <table>
            <tbody>
                <tr><th>$user-&gt;first_name</th><td>{{ $user->first_name ?? '(NULL)' }}</td></tr>
                <tr><th>$user-&gt;last_name</th><td>{{ $user->last_name ?? '(NULL)' }}</td></tr>
                <tr><th>Accessor: $user-&gt;full_name</th><td>{{ $user->full_name }}</td></tr>
                <tr><th>Mutator: $user-&gt;password (hasil bcrypt)</th><td class="kode">{{ $user->password }}</td></tr>
            </tbody>
        </table>
    @endif
</body>
</html>
