<?php
header('Content-Type: application/json');
require __DIR__ . '/../autoload.php';
use Firebase\JWT\JWT;

// In real apps, derive these from your authenticated session:
$userId    = $_GET['uid']   ?? '5068687910815';
$userEmail = $_GET['email'] ?? 'jd@zendeskdemo.com';

$apiSecret = getenv('INTERCOM_MESSENGER_API_SECRET') ?: '<YOUR_API_SECRET>';

$payload = [
  'user_id' => $userId,
  'email'   => $userEmail
];

$token = JWT::encode($payload, $apiSecret, 'HS256');
echo json_encode(['token' => $token]);
