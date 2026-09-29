<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Acara 19 - 2) Eloquent Relationships</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; margin: 24px 0 4px; }
        table { border-collapse: collapse; background: #fff; margin-top: 8px; min-width: 420px; }
        th, td { border: 1px solid #ddd; padding: 7px 11px; font-size: 13px; text-align: left; }
        th { background: #eee; }
        ul { background: #fff; border: 1px solid #ddd; padding: 10px 10px 10px 30px; font-size: 13px; margin-top: 8px; }
        .kosong { background: #fff; border: 1px dashed #bbb; padding: 10px; font-size: 13px; margin-top: 8px; }
    </style>
</head>
<body>
    <h1>ACARA 19 &mdash; 2) Relasi Antar Model (Eloquent Relationships)</h1>

    @if (!$user)
        <div class="kosong">User dengan ID 1 tidak ditemukan.</div>
    @else
        <h2>User yang dipakai: User::with(['profile','posts','roles'])-&gt;find(1)</h2>
        <table>
            <tbody>
                <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
            </tbody>
        </table>

        <h2>a) One to One &mdash; $user-&gt;profile</h2>
        @if (!$user->profile)
            <div class="kosong">Belum ada baris di tabel profiles untuk user ini.</div>
        @else
            <table>
                <tbody>
                    <tr><th>Phone</th><td>{{ $user->profile->phone }}</td></tr>
                    <tr><th>Address</th><td>{{ $user->profile->address }}</td></tr>
                </tbody>
            </table>
        @endif

        <h2>b) One to Many &mdash; $user-&gt;posts</h2>
        @if ($user->posts->isEmpty())
            <div class="kosong">Belum ada baris di tabel posts untuk user ini.</div>
        @else
            <ul>
                @foreach ($user->posts as $post)
                    <li>{{ $post->title }}</li>
                @endforeach
            </ul>
        @endif

        <h2>c) Many to Many &mdash; $user-&gt;roles</h2>
        @if ($user->roles->isEmpty())
            <div class="kosong">Belum ada baris di tabel roles / role_user untuk user ini.</div>
        @else
            <ul>
                @foreach ($user->roles as $role)
                    <li>{{ $role->name }}</li>
                @endforeach
            </ul>
        @endif
    @endif
</body>
</html>
