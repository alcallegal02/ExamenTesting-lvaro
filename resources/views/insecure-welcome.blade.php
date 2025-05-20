<!DOCTYPE html>
<html>
<head>
<!-- Minified version -->
<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, {!! session('user')->name !!}</h1>
    <p>This page is intentionally vulnerable to <strong>Cross-Site Scripting (XSS)</strong>. 
        If the user's name contains HTML or JavaScript code, it will be rendered and executed in the browser.</p>
    
        <p><strong>Your tasks:</strong></p>
        <ul>
            <li>Detect this vulnerability using appropriate tests or manual exploration.</li>
            <li>Fix the vulnerability in the code.</li>
            <li>Create automated tests to ensure the vulnerability has been correctly patched and cannot reappear.</li>
        </ul>
    
        <p>Good luck!</p>
        <form method="post" action="/custom-logout">
            @csrf
            <button name="submit" type="submit">Logout</button>
        </form>
</body>
</html>