# Practical 14 — Admin Dashboard with RBAC and Audit Log

PHP/MySQL admin dashboard with server-side role checks, live counts, latest users, monthly registration chart, user active/inactive toggle, and audit logging.

## Setup (XAMPP)
1. Extract this folder to `C:\xampp\htdocs\practical-14-admin-dashboard-rbac`.
2. Start Apache and MySQL.
3. Import `database.sql` through phpMyAdmin.
4. Check `db.php` (default XAMPP: root with blank password).
5. Open `http://localhost/practical-14-admin-dashboard-rbac/login.php`.

## Demo accounts
- Admin: `admin@example.com` / `password`
- Student: `aarav@example.com` / `password`
- Staff: `rohan@example.com` / `password` (inactive; login blocked)

If the seeded PHP password hash does not validate in your environment, create a local hash with `password_hash('password', PASSWORD_DEFAULT)` and update the demo rows. Change demo credentials before any non-local use.

## Features
- Admin-only protected pages; unauthenticated visitors are redirected and non-admins receive HTTP 403.
- Dynamic user/student/event/registration totals from MySQL.
- Latest user accounts and recent audit entries.
- Monthly registrations chart using Chart.js CDN.
- Admin can activate/deactivate non-admin accounts.
- Audit log records successful login/logout, dashboard views, and status changes.
- MySQLi, prepared statements for writes, escaped HTML output.

## Evidence screenshots
Capture login, dashboard cards/chart, user status toggle, audit log, signed-out dashboard redirect, and non-admin 403 response.

Educational local practical only. Before public deployment, add CSRF protection to state-changing forms, rate limiting, HTTPS, secure session cookie settings, and stronger account-management controls.
