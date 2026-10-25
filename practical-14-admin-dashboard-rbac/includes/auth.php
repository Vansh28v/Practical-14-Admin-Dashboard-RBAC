<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
function requireLogin(): void {
    if (empty($_SESSION['user_id'])) { header('Location: login.php'); exit; }
}
function requireAdmin(): void {
    requireLogin();
    if (($_SESSION['role'] ?? '') !== 'admin') { http_response_code(403); exit('403 Forbidden — Admin access required.'); }
}
function e(mixed $value): string { return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
