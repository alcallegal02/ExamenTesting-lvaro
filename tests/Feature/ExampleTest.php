<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('No es vulnerable a SQL Injection', function () {
    $response = $this->post('/insecure-login', [
        'email' => "' OR 1 -- -",
        'password' => "12345",
    ]);

    $response->assertStatus(302);
});

it('No es vulnerable a XSS', function () {
    Session::put('user', ['name' => '<script>alert("XSS")</script>']);

    $this->get('/insecure-welcome')
         ->assertSee(htmlspecialchars('<script>alert("XSS")</script>'), false);
});