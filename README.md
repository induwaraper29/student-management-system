# Student Management System

A modern, user-friendly Student Management System built with PHP, MySQL, and JavaScript. This system provides educational institutions with tools to efficiently manage student records including registration, viewing, editing, and deletion of student information.

## 🎯 Features

- ✅ **Add Students** - Register new students with complete details (name, email, course, batch)
- ✅ **View Students** - Browse all student records in an organized, searchable table
- ✅ **Edit Students** - Update student information seamlessly
- ✅ **Delete Students** - Remove student records from the system
- ✅ **Search & Filter** - Quickly find students by name, email, course, or batch
- ✅ **Form Validation** - Client-side and server-side validation for data integrity
- ✅ **Responsive Design** - Works seamlessly on desktop and mobile devices
- ✅ **Email Uniqueness** - Prevents duplicate email entries at database level
- ✅ **Statistics Dashboard** - View total students, active courses, and batches

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP 7.x+
- **Database**: MySQL 5.7+
- **Server**: Apache/Nginx with PHP support
- **Validation**: Client-side (JavaScript) + Server-side (PHP)

## 📋 Prerequisites

Before you begin, ensure you have:
- PHP 7.x or higher installed
- MySQL Server installed and running
- Apache or Nginx web server
- Basic knowledge of PHP and MySQL
- A code editor (VS Code, PHPStorm, etc.)

## 🚀 Installation & Setup

### 1. Clone or Download the Repository
```bash
git clone <repository-url>
cd STUDENT_MANAGEMENT_SYSTEM
```

### 2. Database Setup
- Open phpMyAdmin or your MySQL client
- Execute the SQL script: [database/database_schema.sql](database/database_schema.sql)
  ```sql
  CREATE DATABASE IF NOT EXISTS student_management_system;
  USE student_management_system;
  -- Run the rest of the schema file
  ```
- This creates the `students` table with sample data

### 3. Configure Database Connection
Edit [php/db_connect.php](php/db_connect.php) with your database credentials:
```php
define('DB_HOST', 'localhost');    // Your database host
define('DB_USER', 'root');         // Your database username
define('DB_PASSWORD', '');         // Your database password
define('DB_NAME', 'student_management_system');
```

### 4. Run the Application
- Place the project folder in your web server's root directory (e.g., `htdocs/` for XAMPP)
- Access the application: `http://localhost/STUDENT_MANAGEMENT_SYSTEM/`

## 📁 Project Structure

```
STUDENT_MANAGEMENT_SYSTEM/
├── index.php                  # Home page
├── add_student.php           # Add student form page
├── view_students.php         # View/manage students page
├── edit_student.php          # Edit student form page
├── about.php                 # About page
├── contact.php               # Contact page
├── css/
│   └── style.css            # Application styling
├── js/
│   └── validation.js        # Form validation & AJAX logic
├── php/                     # Backend API handlers
│   ├── db_connect.php      # Database connection (centralized)
│   ├── add_student.php     # Add student POST handler
│   ├── view_students.php   # Fetch students data
│   ├── update_student.php  # Update student record
│   └── delete_student.php  # Delete student record
├── database/
│   └── database_schema.sql # Database structure & sample data
└── .github/
    └── copilot-instructions.md  # AI agent coding guidelines
```

## 🔄 Data Flow Architecture

The application follows a **traditional LAMP architecture** with clear separation of concerns:

```
Frontend Form (add_student.php)
    ↓ JavaScript Validation (validation.js)
    ↓ AJAX POST Request
Backend Handler (php/add_student.php)
    ↓ Server Validation + Database Query
    ↓ JSON Response {success: bool, message: string}
Frontend Alert Display (alert-container)
```

## 💾 Database Schema

### Students Table
```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    course VARCHAR(100) NOT NULL,
    batch VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

**Key Constraints**:
- Email uniqueness enforced at database level (UNIQUE constraint)
- Timestamps auto-managed for record tracking

## 🔐 Security Features

- **Input Sanitization**: All user inputs escaped using `escape_input()` function
- **Email Validation**: Multi-layer validation (client regex + server filter_var + DB constraint)
- **Request Method Verification**: Backend checks for POST/GET methods
- **Unique Email Enforcement**: Prevents duplicate student email registrations
- **Prepared Statements**: Recommended for future versions to prevent SQL injection

## 📝 Key Naming Conventions

### Frontend Pages
- `{action}_{entity}.php` (e.g., `add_student.php`, `edit_student.php`)

### Form Elements
- Form IDs: `#{action}-{entity}-form` (e.g., `add-student-form`)
- Input IDs: `#{entity}-{field}` (e.g., `student-name`, `student-email`)

### Backend Handlers
- Located in `php/` folder
- Named to match frontend operations: `php/{action}_{entity}.php`
- All return JSON responses with standardized structure

## 🎨 UI/UX Features

- **Alert System**: Toast-like notifications for user feedback
- **Responsive Layout**: Mobile-friendly container system
- **Utility Classes**: CSS classes for spacing, text alignment, etc.
- **Consistent Navigation**: Same nav bar across all pages
- **Statistics Dashboard**: Real-time student metrics on view page

## ✨ Common Tasks

### Adding a New Student Field
1. Add column to `students` table in [database/database_schema.sql](database/database_schema.sql)
2. Add form input in [add_student.php](add_student.php)
3. Add validation rule in [js/validation.js](js/validation.js)
4. Add extraction & validation in [php/add_student.php](php/add_student.php)
5. Update edit and view flows accordingly

### Testing a New Feature
1. Add form field to frontend page
2. Add validation to `js/validation.js`
3. Add PHP handler in `php/` folder with JSON response
4. Test via browser and check response in Network tab

## 🐛 Troubleshooting

### Database Connection Failed
- Verify MySQL server is running
- Check DB_HOST, DB_USER, DB_PASSWORD in [php/db_connect.php](php/db_connect.php)
- Ensure database `student_management_system` exists

### Form Submissions Not Working
- Check browser console (F12) for errors
- Verify `js/validation.js` is loading
- Check AJAX requests in Network tab
- Ensure backend files exist in `php/` folder

### Email Already Exists Error
- Email uniqueness is enforced at database level
- Check existing records in database for duplicate emails
- Use edit functionality to update existing student emails

## 🔜 Future Enhancements

- [ ] User authentication (admin login)
- [ ] Role-based access control
- [ ] Data export to CSV/PDF
- [ ] Advanced filtering and sorting
- [ ] Student attendance tracking
- [ ] Grade management system
- [ ] Email notifications
- [ ] API documentation (Swagger/OpenAPI)
- [ ] Unit tests and integration tests
- [ ] Docker containerization

## 📄 License

This project is open source and available for educational purposes.

## 👥 Contributing

Contributions are welcome! Please follow these guidelines:
1. Maintain the existing code structure and naming conventions
2. Add validation for all new form fields
3. Include both client-side and server-side validation
4. Test across different devices and browsers
5. Update documentation for significant changes

## 📞 Support

For issues, questions, or suggestions, please check the [.github/copilot-instructions.md](.github/copilot-instructions.md) for AI development guidelines or contact the development team.

---

**Built for efficient student record management | Version 1.0**
