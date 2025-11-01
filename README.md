# Kelvin Lamptey - Portfolio Website

A modern, responsive portfolio website showcasing the work and experience of Kelvin Lamptey, a Computer Science student and Chief Technology Officer.

## 🎯 Overview

This single-page portfolio website highlights:
- Academic achievements and ongoing Computer Science studies
- Professional experience as a CTO and fullstack developer
- Technical skills across multiple platforms (web, mobile, desktop)
- Featured projects including MasterBank and SaucyChat
- Contact form for collaboration opportunities

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Libraries**: jQuery, Bootstrap 4
- **Icons**: Font Awesome 5
- **Backend**: PHP 7+
- **Database**: MySQL/MariaDB
- **Fonts**: Google Fonts (Open Sans, Poppins)

## 📁 Project Structure

```
Portfolio/
├── index.php           # Main portfolio page with integrated form handler
├── db.sql              # Database schema
├── css/
│   ├── bootstrap.css
│   ├── fontawesome-all.css
│   └── styles.css      # Custom styles
├── js/
│   ├── jquery.min.js
│   ├── bootstrap.min.js
│   ├── jquery.easing.min.js
│   └── scripts.js      # Custom interactions
├── images/             # Project images and assets
└── webfonts/           # Font Awesome fonts
```

## 🚀 Setup Instructions

### 1. Database Setup

Create a MySQL database and import the schema:

```bash
mysql -u your_username -p
CREATE DATABASE portfolio_db;
USE portfolio_db;
SOURCE db.sql;
```

### 2. Configure Database Connection

Edit `index.php` and update the database credentials:

```php
$host = 'localhost';
$dbname = 'portfolio_db';
$username = 'your_db_username';
$password = 'your_db_password';
```

### 3. Upload Files

Upload all files to your web server's public directory (e.g., `public_html`, `www`, or `htdocs`).

### 4. Set Permissions

Ensure the web server has proper permissions:

```bash
chmod 755 index.php
chmod 644 index.php.html
```

### 5. Test

Visit your domain in a browser and test the contact form to ensure database connectivity.

## 📧 Contact Form

The contact form in `index.php` processes submissions with:
1. Input validation and sanitization
2. SQL injection protection using prepared statements
3. Data storage in the `contacts` table
4. User-friendly success/error notifications

**Database Fields:**
- `id` - Auto-increment primary key
- `name` - Visitor's name
- `email` - Visitor's email
- `project_details` - Message content
- `submitted_at` - Timestamp

## 🎨 Customization

### Colors

Primary colors are defined in `css/styles.css`:
- **Primary Blue**: `#0b36a8` (buttons, accents)
- **Dark Background**: `#24262a` (navbar, footer)
- **Light Background**: `#f7f9fb` (sections)
- **Text**: `#4d5055` (body text)

### Content

Edit `index.php` to update:
- Hero section text
- About/bio information
- Skills and expertise
- Project descriptions
- FAQ questions and answers
- Social media links

### Social Links

Update social media URLs in the navbar and footer:
- GitHub: https://github.com/kelvin-lamptey
- LinkedIn: https://linkedin.com/in/kelvin-lamptey
- Twitter/X: https://x.com/kelvinolamptey
- Instagram: https://instagram.com/kelvinlamptey7

## 🔧 Features

- ✅ Fully responsive design (mobile, tablet, desktop)
- ✅ Smooth scrolling navigation
- ✅ Animated navbar on scroll
- ✅ Offcanvas mobile menu
- ✅ Interactive form with floating labels
- ✅ FAQ accordion
- ✅ Project showcase with hover effects
- ✅ Social media integration
- ✅ SEO optimized meta tags
- ✅ Contact form with database storage

## 📱 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🔐 Security Considerations

- Input validation and sanitization
- Prepared statements to prevent SQL injection
- HTTPS recommended for production
- Regular security updates for dependencies

## 📝 License

This is a personal portfolio project. Feel free to use as inspiration, but please don't copy directly.

## 👤 Author

**Kelvin Lamptey**
- Email: kelvinlamptey@duck.com
- GitHub: [@kelvin-lamptey](https://github.com/kelvin-lamptey)
- LinkedIn: [kelvin-lamptey](https://linkedin.com/in/kelvin-lamptey)
- Twitter: [@kelvinolamptey](https://x.com/kelvinolamptey)

## 🤝 Contributing

This is a personal portfolio, but suggestions and bug reports are welcome! Feel free to open an issue or reach out directly.

---

**Built with ❤️ by Kelvin Lamptey**
