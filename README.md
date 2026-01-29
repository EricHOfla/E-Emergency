# Emergency Ambulance Service Platform

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-7.0%2B-777BB4.svg?logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.6%2B-00758F.svg?logo=mysql)](https://www.mysql.com/)
[![Status](https://img.shields.io/badge/Status-Active-success.svg)](https://github.com/EricHOfla/E-Emergency)
[![Version](https://img.shields.io/badge/Version-1.0-blue.svg)](https://github.com/EricHOfla/E-Emergency/releases)

A professional emergency ambulance booking and management system built with PHP, MySQL, and Bootstrap. This platform enables users to quickly book ambulances for emergency medical transport with real-time tracking and status updates.

## 🚑 Features

### User Features
- **Quick Ambulance Booking** - One-click booking with location selection
- **Real-time Tracking** - Monitor ambulance location and ETA
- **Booking History** - View past and current bookings
- **Multiple Ambulance Types** - Basic Life Support (BLS) and Advanced Life Support (ALS)
- **User Dashboard** - Personalized booking management
- **Testimonials** - Share experiences with the service
- **Responsive Design** - Works on desktop, tablet, and mobile devices

### Admin Features
- **Ambulance Fleet Management** - Add, edit, and manage ambulances
- **Booking Management** - Track and manage all bookings
- **User Management** - View and manage registered users
- **Contact Queries** - Respond to user inquiries
- **Testimonial Moderation** - Approve/manage testimonials
- **Analytics Dashboard** - View system statistics
- **Content Management** - Manage dynamic pages (About, FAQs, Terms, Privacy)

### Technical Features
- **Secure Authentication** - Password hashing and session management
- **SQL Injection Prevention** - PDO prepared statements
- **Responsive UI** - Bootstrap 3.x grid system
- **Real-time Updates** - AJAX-based operations
- **Professional Styling** - Ambulance red theme with modern design
- **Database Backup** - SQL schema included

## 📋 Requirements

- PHP 7.0 or higher
- MySQL 5.6 or higher
- Apache 2.4+ (or compatible web server)
- Modern web browser (Chrome, Firefox, Safari, Edge)

## 🚀 Installation

### Step 1: Clone Repository
```bash
git clone https://github.com/EricHOfla/E-Emergency.git
cd E-Emergency
```

### Step 2: Database Setup
1. Create a new MySQL database:
```sql
CREATE DATABASE ambulance_booking;
```

2. Import the schema:
```bash
mysql -u root -p ambulance_booking < ambulance_booking.sql
```

## 🔐 Security

- **Password Hashing**: All passwords stored with PHP password_hash()
- **SQL Injection Prevention**: PDO prepared statements used throughout
- **XSS Protection**: Output sanitized with htmlentities()
- **Session Security**: Secure session handling with timeout
- **HTTPS Ready**: Compatible with SSL/TLS encryption
- **.gitignore**: Sensitive files excluded from version control

## 🗄️ Database Schema

### Core Tables
- **tbluser** - User accounts and profiles
- **tblambulance** - Ambulance fleet details
- **tblbooking** - Booking records
- **tblpages** - Dynamic page content
- **tblcontactusinfo** - Contact information
- **tbltestimonials** - User testimonials
- **tblsubscribers** - Newsletter subscribers

## 📱 User Workflows

### Booking Process
1. User navigates to ambulance listing
2. Selects desired ambulance type (BLS/ALS)
3. Provides emergency location
4. Confirms booking
5. Receives confirmation and tracking details
6. Monitors ambulance in real-time

### Admin Workflow
1. Admin logs into dashboard
2. Views pending bookings
3. Authorizes and dispatches ambulances
4. Marks as completed
5. Manages fleet and users

## 🎨 Design & Theme

- **Color Scheme**: Professional ambulance red (#d32f2f)
- **Typography**: Clean, readable sans-serif fonts
- **Layout**: Responsive Bootstrap 3.x grid
- **Icons**: Font Awesome icon library
- **Animations**: Smooth transitions and hover effects

## 🤝 Contributing

We welcome contributions! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines.

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📧 Support

For support, please:
1. Check the FAQ section in the application
2. Review existing issues on GitHub
3. Create a new issue with detailed description

## 🙏 Acknowledgments

- Bootstrap framework for responsive design
- jQuery for enhanced interactivity
- Font Awesome for icons
- All contributors and community members

## 📊 Project Status

- **Status**: Active Development
- **Latest Version**: 1.0
- **Last Updated**: January 2026
- **Maintenance**: Regular updates and bug fixes

---

**Emergency Ambulance Service** - Rapid Response. Professional Care. Always Ready. 🚑
