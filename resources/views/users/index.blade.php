<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 17px; margin: 28px 0 4px; }
        p.query { margin: 0 0 10px; font-family: Consolas, monospace; font-size: 13px; color: #555; }
        nav { margin-bottom: 8px; }
        nav a { margin-right: 16px; color: #2563eb; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 8px 12px; font-size: 14px; text-align: left; }
        th { background: #eee; }
        .pesan { background: #d1fae5; border: 1px solid #10b981; padding: 10px 14px; margin-top: 20px; font-size: 14px; }
        .kosong { background: #fff; border: 1px dashed #bbb; padding: 12px; font-size: 14px; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Form</a>
        <a href="/insert-data">Insert Data</a>
        <a href="/get-data">Get Data</a>
        <a href="/users">Users</a>
        <a href="/users/create">Create</a>
        <a href="/users/update">Update</a>
        <a href="/users/delete">Delete</a>
    </nav>

    @if (session('success'))
        <div class="pesan">{{ session('success') }}</div>
    @endif

    <h1>Semua Data User</h1>
    <p class="query">DB::table('users')-&gt;get() &nbsp;/&nbsp; User::all()</p>

    @if ($users->isEmpty())
        <div class="kosong">Belum ada data. Klik <a href="/insert-data">Insert Data</a> atau <a href="/users/create">Create</a> terlebih dahulu.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Age</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->role }}</td>
                        <td>{{ $row->age }}</td>
                        <td>{{ $row->points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h1>Detail User</h1>
    <p class="query">where('email', 'johndoe@example.com')-&gt;first() &nbsp;/&nbsp; User::find(1)</p>

    @if ($user)
        <table>
            <tbody>
                <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                <tr><th>Status</th><td>{{ $user->status }}</td></tr>
                <tr><th>Role</th><td>{{ $user->role }}</td></tr>
                <tr><th>Age</th><td>{{ $user->age }}</td></tr>
            </tbody>
        </table>
    @else
        <div class="kosong">Data tidak ditemukan.</div>
    @endif

    <h1>ID dan Nama User</h1>
    <p class="query">select('id', 'name')-&gt;get() &nbsp;/&nbsp; where('email', 'john@example.com')-&gt;get()</p>

    @if ($users2->isEmpty())
        <div class="kosong">Tidak ada data.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users2 as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @isset($user2)
        <h1>User Pertama Berdasarkan Email</h1>
        <p class="query">where('email', 'john@example.com')-&gt;firstOrFail()</p>

        <table>
            <tbody>
                <tr><th>ID</th><td>{{ $user2->id }}</td></tr>
                <tr><th>Nama</th><td>{{ $user2->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user2->email }}</td></tr>
            </tbody>
        </table>
    @endisset

    @isset($users3)
        <h1>User Aktif dengan Role Admin</h1>
        <p class="query">where('status', 'active')-&gt;where('role', 'admin')-&gt;get()</p>

        @if ($users3->isEmpty())
            <div class="kosong">Tidak ada user aktif dengan role admin.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users3 as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->status }}</td>
                            <td>{{ $row->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endisset

    @isset($users4)
        <h1>User Umur 18 Tahun ke Atas</h1>
        <p class="query">where('age', '&gt;=', 18)-&gt;get()</p>

        @if ($users4->isEmpty())
            <div class="kosong">Tidak ada user dengan umur 18 tahun ke atas.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users4 as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->age }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endisset
</body>
</html>
