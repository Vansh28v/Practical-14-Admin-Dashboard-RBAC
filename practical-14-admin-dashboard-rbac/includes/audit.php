<?php
declare(strict_types=1);
function logAudit(mysqli $conn, ?int $actorId, string $action, string $entityType, ?string $entityId, string $details=''): void {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $stmt = $conn->prepare('INSERT INTO audit_logs(actor_user_id,action,entity_type,entity_id,details,ip_address) VALUES(?,?,?,?,?,?)');
    $stmt->bind_param('isssss',$actorId,$action,$entityType,$entityId,$details,$ip);
    $stmt->execute();
}
