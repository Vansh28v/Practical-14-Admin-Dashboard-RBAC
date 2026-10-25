# Practical 14: Admin Dashboard with RBAC, Dynamic Menu, and Audit Log

## Aim
To create a PHP/MySQL admin dashboard that displays live system statistics, restricts access by role, and records important administrative actions.

## Theory
Role-Based Access Control (RBAC) limits features according to the authenticated user's role. PHP sessions maintain identity and role. SQL aggregation retrieves counts and monthly registration totals. Audit logging records the actor, action, entity, timestamp, and related details for traceability.

## Logic
1. Connect PHP to MySQL using MySQLi.
2. Authenticate users using email and password verification.
3. Store user ID, name, email, and role in a PHP session.
4. Regenerate the session ID after login.
5. Check the role on each protected page; only admins may access admin pages.
6. Query totals for users, students, events, and registrations.
7. Retrieve latest users and recent audit entries.
8. Display role-aware navigation for the admin workspace.
9. Record login, logout, dashboard views, and user status changes in `audit_logs`.
10. Allow admins to activate/deactivate non-admin accounts.
11. Group registrations by month and render a Chart.js bar chart.
12. Use prepared statements and HTML escaping.

## Result
An admin dashboard was developed with dynamic statistics, server-side admin authorization, user status management, monthly registration chart, and audit logging.

## Conclusion
The practical demonstrates RBAC, SQL aggregation, dynamic navigation, and audit trails in an administrative monitoring system. Protected routes enforce authorization server-side and important actions are recorded for traceability.
