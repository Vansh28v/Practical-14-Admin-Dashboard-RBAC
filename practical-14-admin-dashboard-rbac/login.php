<?php
session_start(); require_once __DIR__.'/db.php'; require_once __DIR__.'/includes/audit.php';
if (!empty($_SESSION['user_id'])) { header('Location: dashboard.php'); exit; }
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $email=trim((string)($_POST['email']??'')); $password=(string)($_POST['password']??'');
 $stmt=$conn->prepare('SELECT id,full_name,email,password_hash,role,status FROM users WHERE email=? LIMIT 1'); $stmt->bind_param('s',$email); $stmt->execute(); $u=$stmt->get_result()->fetch_assoc();
 if($u && password_verify($password,$u['password_hash']) && $u['status']==='active') {
  session_regenerate_id(true); $_SESSION['user_id']=(int)$u['id']; $_SESSION['name']=$u['full_name']; $_SESSION['email']=$u['email']; $_SESSION['role']=$u['role'];
  logAudit($conn,(int)$u['id'],'LOGIN','user',(string)$u['id'],'Successful login'); header('Location: dashboard.php'); exit;
 } $error='Invalid credentials or inactive account.';
}
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Sign in · AdminOS</title><link rel="stylesheet" href="assets/style.css"></head><body class="login-body"><div class="login-shell"><div class="login-brand"><span class="brand-icon">A</span><div><strong>AdminOS</strong><small>CONTROL CENTER</small></div></div><div class="login-card"><div class="login-symbol">✦</div><p class="eyebrow">WELCOME BACK</p><h1>Sign in to your workspace</h1><p class="muted">Use your account to continue.</p><?php if($error):?><div class="alert error"><?=e($error)?></div><?php endif;?><form method="post"><label>Email address</label><input name="email" type="email" placeholder="admin@example.com" required autocomplete="username"><label>Password</label><input name="password" type="password" placeholder="Enter password" required autocomplete="current-password"><button class="btn primary full">Sign in ↗</button></form><div class="demo-box"><strong>Demo admin account</strong><span>Email: admin@example.com</span><span>Password: password</span></div></div><p class="login-foot">Role-based access · Secure session · Audit trail</p></div></body></html>
