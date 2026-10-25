<?php require_once __DIR__ . "/db.php";
require_once __DIR__ . "/includes/auth.php";
requireAdmin();
$rows = $conn
    ->query(
        "SELECT a.*,u.full_name FROM audit_logs a LEFT JOIN users u ON u.id=a.actor_user_id ORDER BY a.id DESC LIMIT 200",
    )
    ->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Audit log</title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <main class="standalone"><a href="dashboard.php">← Dashboard</a>
    <h1>Audit log</h1>
    <p class="muted">Latest 200 recorded actions.</p>
    <section class="panel">
      <div class="user-table-wrap">
        <table>
          <thead>
            <tr>
              <th>TIME</th>
              <th>ACTOR</th>
              <th>ACTION</th>
              <th>ENTITY</th>
              <th>DETAILS</th>
              <th>IP</th>
            </tr>
          </thead>
          <tbody><?php foreach (
    $rows
    as $r
): ?><tr>
              <td><?= e($r["created_at"]) ?></td>
              <td><?= e(
    $r["full_name"] ?? "Deleted user",
) ?></td>
              <td><?= e($r["action"]) ?></td>
              <td><?= e($r["entity_type"]) ?> <?= e(
     $r["entity_id"] ?? "",
 ) ?></td>
              <td><?= e($r["details"] ?? "") ?></td>
              <td><?= e(
    $r["ip_address"] ?? "",
) ?></td>
            </tr><?php endforeach; ?></tbody>
        </table>
      </div>
    </section>
  </main>
</body>

</html>