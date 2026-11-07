<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/ChatServer.php';

use Ratchet\App;

// Ghi log vào terminal, không xuất HTTP headers
fwrite(STDERR, "Starting WebSocket Server...\n");

// WebSocket chạy trên IPv4 localhost, cổng 8080
$app = new App('127.0.0.1', 8080, '127.0.0.1');

// Chấp nhận kết nối từ localhost
$app->route('/chat', new ChatServer(), [
    'localhost',
    '127.0.0.1'
]);

fwrite(
    STDERR,
    "WebSocket running at ws://127.0.0.1:8080/chat\n"
);

$app->run();
