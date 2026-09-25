<?php
/**
 * KOZI Coffee Bekasi — Contact form handler
 * Validates and stores a submission in the `messages` table, returns JSON.
 */

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/settings.php';

header('Content-Type: application/json');

function respond($success, $message) {
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Invalid request method.');
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    respond(false, 'Please fill in your name, email, and message.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Please enter a valid email address.');
}

try {
    $stmt = $pdo->prepare(
        'INSERT INTO messages (name, email, phone, subject, message) VALUES (:name, :email, :phone, :subject, :message)'
    );
    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':phone'   => $phone,
        ':subject' => $subject !== '' ? $subject : 'General inquiry',
        ':message' => $message,
    ]);

    respond(true, 'Thanks for reaching out! We\'ll get back to you soon. For anything urgent, call us at ' . SITE_PHONE . '.');
} catch (PDOException $e) {
    respond(false, 'Something went wrong on our end. Please try again or call us directly.');
}
