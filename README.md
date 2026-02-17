# BETIn Research Management System

**Transforming Ideas into Impacts!**

A comprehensive research project management and evaluation system developed for the **Bio and Emerging Technology Institute (BETIn)** under the Federal Democratic Republic of Ethiopia, Ministry of Innovation and Technology.

---

## 📋 Table of Contents

- [About](#about)
- [Key Features](#key-features)
- [Technology Stack](#technology-stack)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [User Roles](#user-roles)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)

---

## 🎯 About

The BETIn Research Management System is a secure, institutional-grade web application designed to streamline the management of research projects, facilitate expert evaluations, and maintain institutional oversight of scientific initiatives. The system provides a complete workflow from project registration through expert evaluation to final decision-making.

### Mission
To provide a robust, transparent, and efficient platform for managing research projects and evaluations, supporting BETIn's mission of advancing bio and emerging technologies in Ethiopia.

---

## ✨ Key Features

### 🔐 Secure Authentication & Authorization
- **Invitation-based registration** with secure token validation
- **Role-based access control** (Admin, Director, Evaluator, Employee)
- **Email verification** for enhanced security
- **Session management** with "remember me" functionality

### 📊 Project Management
- **Comprehensive project registration** with detailed metadata
- **Multi-stage project tracking** (Pending, Under Review, Approved, Rejected)
- **Document management** for research proposals and supporting materials
- **Project code generation** and tracking
- **Export functionality** for project data

### 🎓 Expert Evaluation System
- **Evaluator assignment** with secure, tokenized access links
- **Structured evaluation forms** with scoring criteria:
  - Innovation & Originality
  - Scientific Merit
  - Feasibility & Methodology
  - Impact & Relevance
  - Team Competence
- **Public evaluation access** via secure tokens (no login required)
- **Evaluation tracking** and status monitoring
- **Email notifications** for evaluation assignments
- **Expiration management** for evaluation links

### 👥 Employee & Directorate Management
- **Directorate organization** structure
- **Employee profiles** with role assignments
- **Invitation system** for new users
- **User management** dashboard

### 📈 Dashboard & Reporting
- **Role-specific dashboards** with relevant metrics
- **Real-time statistics** on projects and evaluations
- **Visual data representation**
- **Quick access** to pending tasks

### 📧 Email System
- **Professional email templates** with institutional branding
- **Automated notifications** for:
  - Evaluation assignments
  - Project status updates
  - User invitations
- **Secure evaluation links** with expiration dates

---

## 🛠 Technology Stack

### Backend
- **Framework:** Laravel 12.x
- **Language:** PHP 8.2+
- **Database:** MySQL/PostgreSQL/SQLite
- **Authentication:** Laravel Breeze

### Frontend
- **Templating:** Blade
- **Styling:** Custom CSS with modern design patterns
- **JavaScript:** Vanilla JS with modern ES6+ features
- **Build Tool:** Vite

### Additional Packages
- **maatwebsite/excel** - Excel import/export functionality
- **Laravel Tinker** - Interactive REPL
- **Laravel Pail** - Log viewing

### Development Tools
- **Laravel Sail** - Docker development environment
- **Laravel Pint** - Code style fixer
- **PHPUnit** - Testing framework
- **Faker** - Test data generation

---

## 💻 System Requirements

- **PHP:** 8.2 or higher
- **Composer:** 2.x
- **Node.js:** 18.x or higher
- **NPM:** 9.x or higher
- **Database:** MySQL 8.0+ / PostgreSQL 13+ / SQLite 3.35+
- **Web Server:** Apache/Nginx

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/GetachewAbebe/Project_Management.git
cd Project_Management
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Configuration

```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

Edit your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=betin_research
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run migrations:

```bash
php artisan migrate
```

### 5. Build Assets

```bash
npm run build
```

### 6. Start Development Server

```bash
# Option 1: Using Artisan
php artisan serve

# Option 2: Using the dev script (runs all services)
composer dev
```

Visit `http://localhost:8000` in your browser.

---

## ⚙️ Configuration

### Mail Configuration

Configure your mail settings in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@betin.gov.et
MAIL_FROM_NAME="BETIn Research System"
```

### Application Settings

```env
APP_NAME="BETIn Research Management"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

---

## 📖 Usage

### For Administrators

1. **Invite Users:** Create invitations for new employees/evaluators
2. **Manage Directorates:** Organize institutional structure
3. **Assign Evaluators:** Match experts with research projects
4. **Monitor Progress:** Track project and evaluation status
5. **Generate Reports:** Export data for institutional reporting

### For Directors

1. **Review Projects:** Access projects within your directorate
2. **Monitor Evaluations:** Track evaluation progress
3. **Manage Team:** Oversee directorate employees

### For Evaluators

1. **Access via Email:** Click secure link from evaluation assignment email
2. **Review Project:** Read research proposal and materials
3. **Complete Evaluation:** Score project across criteria
4. **Submit Feedback:** Provide detailed comments and recommendations

### For Employees

1. **Register Projects:** Submit new research proposals
2. **Track Status:** Monitor project evaluation progress
3. **Update Information:** Maintain project documentation

---

## 👤 User Roles

| Role | Permissions |
|------|-------------|
| **Admin** | Full system access, user management, evaluation assignments |
| **Director** | Directorate oversight, project review, team management |
| **Evaluator** | Project evaluation, scoring, feedback submission |
| **Employee** | Project registration, status tracking |

---

## 📁 Project Structure

```
Project_Management/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Application controllers
│   │   └── Requests/         # Form request validation
│   ├── Models/               # Eloquent models
│   └── Policies/             # Authorization policies
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/                # Blade templates
│   │   ├── auth/            # Authentication views
│   │   ├── evaluations/     # Evaluation views
│   │   ├── projects/        # Project views
│   │   └── emails/          # Email templates
│   └── css/                  # Stylesheets
├── routes/
│   ├── web.php              # Web routes
│   └── auth.php             # Authentication routes
└── public/                   # Public assets
```

---

## 🤝 Contributing

We welcome contributions to improve the BETIn Research Management System. Please follow these guidelines:

1. **Fork the repository**
2. **Create a feature branch** (`git checkout -b feature/AmazingFeature`)
3. **Commit your changes** (`git commit -m 'Add some AmazingFeature'`)
4. **Push to the branch** (`git push origin feature/AmazingFeature`)
5. **Open a Pull Request**

### Code Style

This project uses Laravel Pint for code formatting:

```bash
./vendor/bin/pint
```

### Testing

Run the test suite:

```bash
php artisan test
```

---

## 📄 License

This project is proprietary software developed for the Bio and Emerging Technology Institute (BETIn). All rights reserved.

**© 2026 Bio and Emerging Technology Institute. All Rights Reserved.**

*Transforming Ideas into Impacts!*
