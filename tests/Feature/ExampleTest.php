<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

// Test creación usuario
it('creates a user', function () {
    $response = $this->post('/users', [
        'name' => '<script>alert("XSS")</script>',
        'email' => 'test@example.com',
        'password' => 'password',
    ]);
    $response->assertStatus(201);
});

// Test login usuario - Prueba de SQLi
it('logs in a user', function () {
    $response = $this->post('/login', [
        'email' => "' OR '1'='1' -- ",
        'password' => 'password',
    ]);
    $response->assertStatus(200);
});