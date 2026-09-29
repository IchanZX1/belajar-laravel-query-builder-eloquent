<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Acara 19 - 5) Mass Assignment Protection</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; margin: 24px 0 4px; }
        pre { background: #1e293b; color: #e2e8f0; padding: 14px; font-size: 13px; overflow-x: auto; }
        .kotak { background: #fff; border: 1px solid #ddd; padding: 14px; font-size: 14px; }
    </style>
</head>
<body>
    <h1>ACARA 19 &mdash; 5) Mass Assignment Protection</h1>

    <h2>Isi $fillable pada app/Models/User.php</h2>
    <pre>protected $fillable = ['name', 'email', 'password', 'status', 'role', 'age', 'points', 'first_name', 'last_name', 'active'];</pre>

    <h2>Percobaan User::create([...]) dengan field 'id' =&gt; 999</h2>
    <pre>User::create([
    'id'         => 999,
    'name'       => 'Percobaan Mass Assignment',
    'email'      => 'percobaan@example.com',
    'password'   => '123456',
]);</pre>

    <h2>Hasil</h2>
    <div class="kotak">{{ $pesan }}</div>
</body>
</html>
