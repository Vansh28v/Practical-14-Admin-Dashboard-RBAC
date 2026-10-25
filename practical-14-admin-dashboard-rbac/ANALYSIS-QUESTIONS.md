# Practical 14 — Key Questions / Analysis

**1. Are dashboard values loaded dynamically from the database?**  
Yes. User, student, event, and registration totals are retrieved through SQL queries. Latest user accounts and recent audit entries are fetched from MySQL, and registration totals are grouped by month for the chart.

**2. Is access restricted to admin users?**  
Yes. Protected pages call `requireAdmin()`, which verifies the authenticated session and checks that the role is `admin`. Unauthenticated users are redirected to login, while other roles receive HTTP 403.

**3. Are role-based menus working?**  
The admin workspace displays links for user, student, event, registration, and audit pages. Each protected page independently checks the role, so directly entering a URL cannot bypass access control. This practical's dashboard is admin-only.

**4. Are important admin actions recorded in `audit_logs`?**  
Yes. Successful login, logout, dashboard views, and user status changes are logged with actor, action, entity, details, IP address, and timestamp.
