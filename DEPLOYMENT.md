# Deployment Guide

## Quick Deployment Checklist

### 1. Pre-Deployment

- [ ] Update database credentials in `index.php`
- [ ] Test contact form locally
- [ ] Verify all images are in the `images/` folder
- [ ] Check all social media links are correct
- [ ] Review content for any typos or errors

### 2. Server Requirements

- PHP 7.0 or higher
- MySQL 5.7 or higher (or MariaDB 10.2+)
- Apache with mod_rewrite (or Nginx with proper configuration)
- HTTPS certificate (recommended)

### 3. Database Setup

```sql
-- Create database
CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Import schema
USE portfolio_db;
SOURCE db.sql;

-- Create database user (optional but recommended)
CREATE USER 'portfolio_user'@'localhost' IDENTIFIED BY 'strong_password_here';
GRANT SELECT, INSERT ON portfolio_db.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
```

### 4. File Upload

Upload these files to your web server:

```
/public_html/ (or your web root)
├── index.php
├── css/
├── js/
├── images/
└── webfonts/
```

**Do NOT upload:**
- `README.md`
- `.github/` folder
- `db.sql` (after importing)
- Any `.git` files

### 5. Configure index.php

```php
// Update these lines in index.php
$host = 'localhost';           // Usually 'localhost'
$dbname = 'portfolio_db';      // Your database name
$username = 'portfolio_user';  // Your database username
$password = 'your_password';   // Your database password
```

### 6. Set File Permissions

```bash
# Connect via SSH to your server
cd /path/to/web/root

# Set directory permissions
find . -type d -exec chmod 755 {} \;

# Set file permissions
find . -type f -exec chmod 644 {} \;

# Make PHP files executable by web server
chmod 644 index.php
```

### 7. Test Deployment

- [ ] Visit your website URL
- [ ] Test navigation links
- [ ] Test contact form submission
- [ ] Check form data appears in database
- [ ] Test on mobile device
- [ ] Check all images load correctly
- [ ] Verify social media links work

### 8. Optional: Set Up Email Notifications

To receive email notifications when someone submits the contact form, add this to `index.php` after the database insert:

```php
// Send email notification
$to = 'kelvinlamptey@duck.com';
$subject = 'New Portfolio Contact: ' . $name;
$message = "Name: $name\nEmail: $email\n\nMessage:\n$project_details";
$headers = "From: noreply@yourdomain.com\r\n";
$headers .= "Reply-To: $email\r\n";

mail($to, $subject, $message, $headers);
```

### 9. Security Hardening

**Protect index.php from direct access (if needed):**

Create/edit `.htaccess`:

```apache
# Prevent access to PHP files directly (except index.php)
<Files "*.php">
    Order Allow,Deny
    Deny from all
</Files>

<Files "index.php">
    Order Allow,Deny
    Allow from all
</Files>
```

**Enable HTTPS:**
- Obtain SSL certificate (Let's Encrypt is free)
- Update all URLs to use `https://`
- Add redirect in `.htaccess`:

```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### 10. Monitoring

Set up monitoring for:
- Website uptime
- Form submissions in database
- Error logs (`/var/log/apache2/error.log` or similar)

### Troubleshooting

**Contact form not working:**
1. Check PHP error logs
2. Verify database credentials
3. Ensure `contacts` table exists
4. Check file permissions

**Database connection errors:**
```bash
# Test database connection
mysql -u portfolio_user -p portfolio_db
```

**Images not loading:**
- Verify file paths are correct
- Check file permissions (should be 644)
- Ensure files were uploaded correctly

## Common Hosting Providers

### cPanel
1. Upload files via File Manager or FTP
2. Create database in MySQL Databases
3. Import `db.sql` via phpMyAdmin
4. Update `index.php` with credentials

### Shared Hosting (Bluehost, HostGator, etc.)
1. Use FTP/SFTP client (FileZilla)
2. Upload to `public_html`
3. Use hosting control panel for database
4. Follow standard setup steps

### VPS/Cloud (DigitalOcean, AWS, etc.)
1. Set up LAMP stack
2. Clone/upload files to `/var/www/html`
3. Configure database
4. Set up firewall and SSL

## Post-Deployment

- Update DNS if needed
- Submit sitemap to search engines
- Set up Google Analytics (optional)
- Monitor initial traffic and test all features

---

**Need help?** Contact me at kelvinlamptey@duck.com
