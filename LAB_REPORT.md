# Lab 9 Report — PHP Fundamentals: Employee Management System

## Objective
Understand server-side execution, process GET/POST requests, reuse PHP files, manage sessions and validate user input on the server.

## Tools
PHP 8+, XAMPP/Apache, VS Code, Bootstrap 5 and browser DevTools.

## Implementation
Created employee list, create and detail pages. The create form uses POST and validates name, email and department on the server. Shared navigation/footer are loaded with `require`. A session-based login gate protects the employee pages, and logout destroys the session.

## Result
The user can sign in with the classroom demo account, view sample employees, add a validated employee and open an employee detail page.

## Problems and solutions
- PHP code not executing: run the project through Apache using `http://localhost/`, not by double-clicking the PHP file.
- Undefined POST values: use null coalescing (`??`) and check the request method.
- Session not persisting: call `session_start()` before output on every protected page.

## Evidence to add
Add screenshots of the login page, employee list and add-employee form, plus Git commit history.
