# Student Management System - AI Coding Agent Instructions

## Architecture Overview

This is a traditional PHP LAMP stack application with **strict separation between frontend UI and backend operations**:

- **Frontend Pages** (root `.php` files): HTML/PHP for user interface - add_student.php, view_students.php, edit_student.php, index.php, about.php, contact.php
- **Backend API Handlers** (php/ folder): Process requests, return JSON - php/add_student.php, php/update_student.php, php/delete_student.php, php/view_students.php
- **Database Layer**: MySQL (php/db_connect.php centralizes connection + helper functions)
- **Client Validation** (js/validation.js): Pre-submission checks before AJAX calls
- **Server Validation**: Backend always validates again before database operations

**Critical Data Flow**: User fills form → JS validates → AJAX POST to php/{operation}.php → JSON response with success flag → Frontend displays alert

## Database Schema

**Single Table**: `students`
- `id` (INT, auto-increment, primary key)
- `name` (VARCHAR 100, NOT NULL)
- `email` (VARCHAR 100, NOT NULL, UNIQUE)
- `course` (VARCHAR 100, NOT NULL)
- `batch` (VARCHAR 50, NOT NULL)
- `created_at` / `updated_at` (TIMESTAMP auto-managed)

Email uniqueness is enforced at DB level. See [database/database_schema.sql](database/database_schema.sql) for schema + sample data.

## File Organization & Conventions

### Frontend Pages Pattern
All frontend files follow this structure:
1. HTML5 boilerplate with CSS link to css/style.css
2. Navigation bar (identical across all pages)
3. Hero section with page title
4. Alert container div (id="alert-container") for feedback
5. Main content wrapped in .container and .section classes

Example: [add_student.php](add_student.php#L35) shows form with id="add-student-form"

### Naming Conventions
- **Form IDs**: `#{action}-{entity}-form` (e.g., add-student-form, edit-student-form)
- **Input IDs**: `#{entity}-{field}` (e.g., student-name, student-email)
- **File mapping**: add_student.php (UI) ↔ php/add_student.php (backend)

### Backend API Handlers
All php/{operation}.php files:
1. Set `Content-Type: application/json` header
2. Require php/db_connect.php
3. Check REQUEST_METHOD
4. Extract + escape input using `escape_input()` helper
5. Run both client-side and server-side validation
6. Return JSON: `{success: bool, message: string, ...data}`

Example structure: [php/add_student.php](php/add_student.php#L1-L25)

## Integration Points & Helper Functions

### Database Connection (php/db_connect.php)
- **Constants**: DB_HOST, DB_USER, DB_PASSWORD, DB_NAME
- **Helper Functions**:
  - `escape_input($data, $conn)` - Escapes user input, trims whitespace
  - `email_exists($email, $conn, $exclude_id)` - Checks email uniqueness (used during add/edit)

### JavaScript Validation (js/validation.js)
Client-side validation functions before AJAX submission:
- `validateEmail(email)` - Regex check for email format
- `validateName(name)` - Minimum 3 characters
- `validateRequired(value)` - Non-empty check
- `validateStudentForm(formData)` - Returns {isValid: bool, errors: array}

## Common Development Tasks

### Adding a New Student Field
1. Add column to `students` table in [database/database_schema.sql](database/database_schema.sql)
2. Add form input in [add_student.php](add_student.php#L45-L60)
3. Add JS validation in [js/validation.js](js/validation.js#L40)
4. Add extraction + validation in [php/add_student.php](php/add_student.php#L15-L18)
5. Update same in edit and view flows

### Adding a New Operation (CRUD)
1. Create backend handler: `php/{operation}.php` with JSON response pattern
2. Create frontend page if needed: `{operation}.php`
3. Add JS function for AJAX call: `submit{Operation}Form()` (follows naming pattern in validation.js)
4. Add navigation link to nav bar if frontend page

### Error Handling Pattern
- Backend validation errors returned as: `{success: false, message: "error text", errors: [array of messages]}`
- Frontend JS catches, displays in alert-container using showAlert() function
- Always validate on BOTH client (JS) and server (PHP)

## Security Notes

- Input sanitization: Use `escape_input()` for all user input before queries
- Email validation: Client-side regex + server-side filter_var() + DB UNIQUE constraint
- All POST handlers check REQUEST_METHOD
- No SQL prepared statements currently - modernize using prepared statements for new code
- Database credentials in db_connect.php (should use environment variables in production)

## UI/UX Patterns

- **Alert System**: Display feedback via showAlert() function (messages displayed in #alert-container)
- **Forms**: Use .form-group class wrapper, .container for layout
- **Styling**: CSS utility classes (mb-4 for margin-bottom, text-center, etc.) in [css/style.css](css/style.css)
- **Navigation**: Same nav bar across all pages - update if adding routes
