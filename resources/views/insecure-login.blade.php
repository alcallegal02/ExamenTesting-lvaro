<!DOCTYPE html>
<html>
<head>
    <!-- Minified version -->
<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Insecure Login</title>
</head>
<body>
    <h1>(In)Secure Login 🥷🏼</h1>
    <p>Please, enter your credentials here.</p>

    <form method="POST" action="/insecure-login">
        @csrf
        <label>Email: <input type="text" name="email"></label><br>
        <label>Password: <input type="text" name="password"></label><br>
        <button type="submit">Login</button>
        <a class="button" href="/">Back home</a>
    </form>

    @if($errors->any())
        <div>
            <strong>{{ $errors->first('login') }}</strong>
        </div>
    @endif
</body>
</html>
