# Finance Workflow Assistance System (FWAS)

FWAS is a web-based application designed to assist finance officers in preparing and organizing supplier payment data before manual entry into an external IFMS (Integrated Financial Management System). It streamlines workflows by reducing repetitive data entry (e.g., TIN numbers), tracking payment lifecycles, preventing duplicate invoices, and producing structured export batch summaries.

Built by Group 9, MUST Finance System Architecture Project.

## Key Features
*   **Supplier Management:** Record securely and store Supplier TINs and bank information for quick auto-fill.
*   **Payment Lifecycle Tracking:** Trace individual payments through a defined state flow: `Draft` → `Ready` → `Batched` → `Processed`.
*   **Intelligent Batching:** Group `Ready` payments into identifiable batches for collective submission and track their state (`Open` vs `Finalized`).
*   **Immutable Audit Logging:** Keeps append-only transaction logs for batch lifecycle events.
*   **Automated Exporting:** Generates unified CSV/Excel document outputs for simple replication directly into IFMS.
*   **Role-Based Security:** Fully enforces offline boundaries matching roles via local Session states (`Officer`, `Supervisor`, `Admin`). 

## Tech Stack
*   **Frontend:** HTML5, vanilla CSS, JavaScript
*   **Backend:** PHP (8.0+) (pure MVP structure, completely zero-dependency)
*   **Database:** SQLite 3 (handled via PHP PDO)

---

## 💻 Local Setup & Installation

FWAS was originally built for strict offline compliance, making deployment completely frictionless.

### Prerequisites
*   A local web server (e.g., XAMPP, WAMP, or plain Apache+PHP installation)
*   PHP 8.0+ equipped with the `php-sqlite3` and `pdo` extensions

### Steps
1.  **Clone the Repository:**
    ```bash
    git clone https://github.com/yourusername/FWAS.git
    cd FWAS
    ```
2.  **Initialize the Database:**
    You must populate your SQLite database the first time.
    ```bash
    # using sqlite3 terminal client
    sqlite3 database/fwas.db < database/schema.sql
    ```
    *Ensure the `database/` directory has proper read/write permissions for your web server user (`www-data` on Linux, etc.).*
3.  **Run Locally:**
    Serve the project directly using the native PHP built-in server from the root directory:
    ```bash
    php -S localhost:8000
    ```
4.  **Log In:**
    Visit `http://localhost:8000` via your browser. Use the default initial credentials:
    *   **Admin User:** username: `admin` | pass: `admin123`
    *   **Officer User:** username: `officer` | pass: `admin123`

---

## ☁️ AWS Hosting Guide

While intentionally designed for local offline usage, FWAS can easily scale to the Cloud. The easiest way to host this native PHP application on AWS is via **AWS Elastic Beanstalk** or a foundational **Amazon EC2 (Ubuntu)** Instance.

### Option 1: Deploying to an EC2 instance
1. Launch an **Ubuntu Server 22.04 LTS** EC2 instance. Ensure HTTP (port 80) and HTTPS (port 443) traffic are enabled in the Security Group.
2. Install Apache, PHP, and SQLite.
   ```bash
   sudo apt update
   sudo apt install apache2 php libapache2-mod-php php-sqlite3 sqlite3 git -y
   ```
3. Clone the application into `/var/www/html`:
   ```bash
   cd /var/www/html
   sudo git clone https://github.com/yourusername/FWAS.git .
   ```
4. Set permissions for SQLite (SQLite requires the webserver to write to both the `.db` file and the parent directory file):
   ```bash
   sudo chown -R www-data:www-data /var/www/html/database
   sudo chmod -R 775 /var/www/html/database
   ```
5. Ensure `AllowOverride All` is set for Apache so directory routing matches correctly. Restart apache:
   ```bash
   sudo systemctl restart apache2
   ```

### Option 2: AWS Elastic Beanstalk
1. Zip the repository (exclude the database to start fresh, or include `database/fwas.db` to carry over predefined records).
2. Go to **AWS Elastic Beanstalk** > Create Application.
3. Select **PHP** as your platform.
4. Upload your zipped repository source code.
5. Provide your environment `.ebextensions` file to enforce directory permissions over the `database/` path for the `webapp` user so the SQLite PDO can write effectively.

---

## 🔒 Security Practices

*   **Database Exclusions:** The `fwas.db` lives directly in the codebase for portability but shouldn't be pushed freely. This repository's `.gitignore` avoids pushing `fwas.db` live so local financial data stays detached.
*   **Hashing:** Passwords run natively through `password_hash()` utilizing the bcrypt algorithm.

## License
MIT (or as assigned by Mbarara University of Science and Technology framework requirements).
# FWAS_SYSTEMnew
