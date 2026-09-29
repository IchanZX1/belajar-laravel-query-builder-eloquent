<nav>
    <a href="/">Form</a>
    <a href="/insert-data">Insert Data</a>
    <a href="/get-data">Get Data</a>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/submit" method="POST">
@csrf
<label for="name">Nama:
    <input type="text" name="name" id="name">
</label><br>

<label for="email">Email:
    <input type="email" name="email" id="email">
</label><br>

<label for="password">Password:
    <input type="password" name="password" id="password">
</label><br>

<label for="password_confirmation">Konfirmasi Password:
    <input type="password" name="password_confirmation" id="password_confirmation">
</label><br>

<button type="submit">Kirim</button>
</form>
