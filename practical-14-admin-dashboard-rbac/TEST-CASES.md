# Practical 14 — Test Cases

| No. | Test | Expected result |
|---:|---|---|
| 1 | Import `database.sql` | Tables and sample data created |
| 2 | Sign in as admin@example.com / password | Admin dashboard opens |
| 3 | Open dashboard | Counts, latest accounts and audit activity load from DB |
| 4 | Open Students, Events, Registrations | Rows load from MySQL |
| 5 | Open User management | Accounts and status controls appear |
| 6 | Deactivate an active non-admin | Status changes and audit entry is created |
| 7 | Try to deactivate admin | No status toggle is shown |
| 8 | Sign out and open dashboard.php | Redirect to login |
| 9 | Sign in as active student, then open dashboard.php | HTTP 403 Forbidden |
| 10 | Sign in as inactive staff | Login rejected |
| 11 | Open Audit log after actions | Login, dashboard and status changes are listed |
| 12 | Inspect monthly chart | Registration totals grouped by month |

## Screenshot checklist
- [ ] Login page
- [ ] Dashboard with four statistic cards
- [ ] Registration chart and latest accounts
- [ ] User status toggle before/after
- [ ] Audit log showing action records
- [ ] Student direct-access attempt showing 403
- [ ] Signed-out dashboard redirecting to login
