# About This Project

This is a single-page portfolio website for Kelvin Lamptey, a Computer Science student and CTO. The site showcases his technical skills, leadership experience, and projects, balancing academic achievements with professional accomplishments. Built with HTML, CSS, and JavaScript, it uses a PHP backend for contact form submissions.

## Tech Stack

- **Frontend**: HTML, CSS, JavaScript (with jQuery and Bootstrap)
- **Backend**: PHP (for the contact form)
- **Database**: MySQL/MariaDB (for storing contact form submissions)
- **Styling**: Bootstrap 4 and custom CSS in `css/styles.css`
- **Icons**: Font Awesome 5

## Key Files

- `index.php`: The main portfolio page with integrated PHP form processing. Contains both the HTML structure and backend logic for handling contact form submissions.
- `js/scripts.js`: Custom JavaScript for UI interactions (smooth scrolling, navbar animations, form label effects)
- `css/styles.css`: Custom styles that override or supplement Bootstrap
- `db.sql`: SQL schema for the `contacts` table that stores contact form submissions

## Content Sections

The portfolio is organized into these main sections:
1. **Header/Hero**: Introduction highlighting student and CTO roles
2. **About**: Biography with timeline showing academic and professional experience
3. **Skills & Expertise**: Three main areas - Fullstack Development, Technical Leadership, Cross-Platform Apps
4. **Why I Stand Out**: Technical stack details and leadership qualities
5. **Featured Projects**: MasterBank (banking platform) and SaucyChat (messaging platform)
6. **FAQ**: Student/CTO-specific questions about balancing roles, tech stack, collaboration
7. **Contact**: Form for inquiries and collaboration opportunities

## Development Patterns

### Frontend
- Bootstrap 4 grid system for responsive layout
- jQuery for DOM manipulation and animations
- Custom navbar that changes on scroll (`.top-nav-collapse` class)
- Form labels animate on input focus/fill (`.notEmpty` class)
- Page-scroll smooth scrolling with easing
- Offcanvas mobile menu

### Backend (Contact Form)
- Form submits POST to `index.php` (same file)
- PHP processing happens at the top of `index.php` before HTML output
- Expected fields: `name`, `email`, `project_details`
- Database table: `contacts` with auto-increment ID and timestamp
- Redirects back to `index.php` with success/error query parameter

### Styling Conventions
- Primary color: Blue (`#0b36a8`) for buttons and accents
- Dark navbar: `#24262a`
- Light backgrounds: `#f7f9fb`
- Font stack: "Open Sans" for body, "Poppins" for headings
- Consistent spacing using Bootstrap utilities

## Tone & Voice

- **Professional yet approachable**: Balances academic credibility with real-world experience
- **Technical but accessible**: Shows expertise without being overly complex
- **Leadership-focused**: Emphasizes CTO role and team collaboration
- **Achievement-oriented**: Highlights projects and skills rather than "selling services"

## Social Links

- GitHub: https://github.com/kelvin-lamptey
- LinkedIn: https://linkedin.com/in/kelvin-lamptey
- Twitter/X: https://x.com/kelvinolamptey
- Instagram: https://instagram.com/kelvinlamptey7
- Email: kelvinlamptey@duck.com

## Deployment

- Manual deployment to web server with PHP and MySQL support
- No build process required
- Upload all files to web root
- Configure database connection in `index.php`
- Ensure `contacts` table exists using `db.sql` schema
