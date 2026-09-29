<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; margin: 0; background: #f5f5f5; color: #222; }
        nav { background: #1e293b; padding: 10px 24px; }
        nav .baris { margin: 3px 0; }
        nav .grup { color: #64748b; font-size: 11px; font-weight: bold; letter-spacing: .5px; margin-right: 10px; }
        nav a { color: #cbd5e1; text-decoration: none; font-size: 12.5px; margin-right: 12px; }
        nav a:hover { color: #fff; text-decoration: underline; }
        .wrap { max-width: 1080px; margin: 0 auto; padding: 26px 32px 70px; }
        h1 { font-size: 19px; margin: 0 0 6px; }
        h2 { font-size: 15px; margin: 28px 0 6px; color: #0f172a; }
        h3 { font-size: 13.5px; margin: 18px 0 5px; color: #334155; }
        p.ket { font-size: 13px; color: #555; margin: 0 0 12px; }
        pre { background: #1e293b; color: #e2e8f0; padding: 14px 16px; font-size: 12.5px; line-height: 1.5; overflow-x: auto; border-radius: 4px; margin: 0 0 14px; }
        table { border-collapse: collapse; width: 100%; background: #fff; margin-bottom: 8px; }
        th, td { border: 1px solid #ddd; padding: 7px 11px; font-size: 13px; text-align: left; vertical-align: top; }
        th { background: #eee; }
        td.kode { font-family: Consolas, monospace; word-break: break-all; }
        ul.data { background: #fff; border: 1px solid #ddd; padding: 10px 10px 10px 30px; font-size: 13px; margin: 0 0 8px; }
        .kosong { background: #fff; border: 1px dashed #bbb; padding: 11px; font-size: 13px; color: #666; margin-bottom: 8px; }
        .info { background: #dbeafe; border: 1px solid #3b82f6; padding: 11px 15px; font-size: 13px; margin-bottom: 16px; }
        .sukses { background: #d1fae5; border: 1px solid #10b981; padding: 11px 15px; font-size: 13px; margin-bottom: 16px; }
        .bahaya { background: #fee2e2; border: 1px solid #ef4444; padding: 11px 15px; font-size: 13px; margin-bottom: 16px; }
        .tombol { display: inline-block; background: #2563eb; color: #fff; padding: 8px 15px; font-size: 13px; text-decoration: none; border-radius: 4px; margin: 0 8px 8px 0; }
        .tombol:hover { opacity: .88; }
        .tombol.hijau { background: #059669; }
        .tombol.merah { background: #dc2626; }
        .tombol.abu { background: #64748b; }
        .angka { display: inline-block; background: #fff; border: 1px solid #ddd; padding: 12px 18px; margin: 0 10px 10px 0; min-width: 150px; }
        .angka .label { display: block; font-size: 12px; color: #666; margin-bottom: 4px; }
        .angka .nilai { font-size: 20px; font-weight: bold; color: #1e293b; }
    </style>
</head>
<body>
<nav>
    <div class="baris">
        <span class="grup">ACARA 17</span>
        <a href="/acara17/insert">1. Insert</a>
        <a href="/acara17/get">2. Get</a>
        <a href="/acara17/update">3. Update</a>
        <a href="/acara17/delete">4. Delete</a>
        <a href="/acara17/pluck">5. Pluck</a>
        <a href="/acara17/aggregate">6. Aggregate</a>
        <a href="/acara17/join">7. Join</a>
        <a href="/acara17/sort-limit">8. Order/Limit</a>
        <a href="/acara17/subquery">9. Subquery</a>
        <a href="/acara17/raw">10. Raw</a>
    </div>
    <div class="baris">
        <span class="grup">ACARA 18</span>
        <a href="/acara18/create">1. Create</a>
        <a href="/acara18/retrieve">2. Retrieve</a>
        <a href="/acara18/update">3. Update</a>
        <a href="/acara18/delete">4. Delete</a>
    </div>
    <div class="baris">
        <span class="grup">ACARA 19</span>
        <a href="/acara19/conditional">1. Conditional</a>
        <a href="/acara19/relationships">2. Relationships</a>
        <a href="/acara19/mutator">3. Mutator</a>
        <a href="/acara19/softdelete">4. Soft Delete</a>
        <a href="/acara19/massassignment">5. Mass Assignment</a>
        <a href="/acara19/scope">6. Query Scope</a>
    </div>
    <div class="baris">
        <span class="grup">ACARA 20</span>
        <a href="/acara20">Form and Validation</a>
    </div>
</nav>
<div class="wrap">
    <h1>@yield('title')</h1>
    @yield('content')
</div>
</body>
</html>
