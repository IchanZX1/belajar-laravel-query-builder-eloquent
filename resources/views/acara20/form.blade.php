<!DOCTYPE html>
<html>
<head>
    <title>Acara 20 - Form and Validation</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 32px; background: #f5f5f5; color: #222; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; margin-top: 30px; }
        .kotak-form { background: #fff; border: 1px solid #ddd; padding: 18px; margin-top: 10px; max-width: 520px; }
        label { display: block; font-size: 13px; margin-bottom: 3px; }
        input { width: 100%; padding: 6px 8px; font-size: 13px; border: 1px solid #bbb; box-sizing: border-box; margin-bottom: 12px; }
        button { background: #2563eb; color: #fff; border: 0; padding: 8px 16px; font-size: 13px; cursor: pointer; }
        .alert-danger { background: #fee2e2; border: 1px solid #ef4444; padding: 12px 16px; margin-top: 16px; max-width: 520px; }
        .alert-danger ul { margin: 0; padding-left: 20px; }
        .alert-danger li { font-size: 13px; color: #991b1b; }
        .sukses { background: #d1fae5; border: 1px solid #10b981; padding: 12px 16px; margin-top: 16px; max-width: 520px; font-size: 14px; }
        code { background: #eee; padding: 2px 6px; font-size: 13px; }
    </style>
</head>
<body>
    <h1>ACARA 20 &mdash; Form and Validation</h1>

    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('sukses'))
        <div class="sukses">{{ session('sukses') }}</div>
    @endif

    <h2>Poin 1, 2, 3 &mdash; Validasi di Controller + Pesan Error + Custom Message</h2>
    <p><code>POST /acara20/submit</code></p>
    <div class="kotak-form">
        <form action="/acara20/submit" method="POST">
            @csrf
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">

            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation">

            <button type="submit">Kirim</button>
        </form>
    </div>

    <h2>Poin 4 &mdash; Validasi Menggunakan Form Request (UserRequest)</h2>
    <p><code>POST /acara20/submit-request</code> &mdash; rule <code>unique:users,email</code> ikut diuji di sini</p>
    <div class="kotak-form">
        <form action="/acara20/submit-request" method="POST">
            @csrf
            <label for="req_name">Nama:</label>
            <input type="text" name="name" id="req_name" value="{{ old('name') }}">

            <label for="req_email">Email:</label>
            <input type="email" name="email" id="req_email" value="{{ old('email') }}">

            <label for="req_password">Password:</label>
            <input type="password" name="password" id="req_password">

            <label for="req_password_confirmation">Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" id="req_password_confirmation">

            <button type="submit">Kirim (Form Request)</button>
        </form>
    </div>

    <h2>Poin 5 &mdash; Validasi Kustom (Rule Uppercase)</h2>
    <p><code>POST /acara20/submit-rule</code> &mdash; nama wajib HURUF KAPITAL semua</p>
    <div class="kotak-form">
        <form action="/acara20/submit-rule" method="POST">
            @csrf
            <label for="rule_name">Nama:</label>
            <input type="text" name="name" id="rule_name" value="{{ old('name') }}" placeholder="Ketik nama (harus KAPITAL semua)">

            <button type="submit">Kirim (Custom Rule)</button>
        </form>
    </div>
</body>
</html>
