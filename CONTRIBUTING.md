# Contributing to Emergency Ambulance Service

Thank you for your interest in contributing to the Emergency Ambulance Service project! We welcome contributions from the community to help improve this critical emergency response platform.

## How to Contribute

### 1. Fork the Repository
Click the "Fork" button on GitHub to create your own copy of the project.

### 2. Create a Feature Branch
```bash
git checkout -b feature/your-feature-name
```

### 3. Make Your Changes
- Write clean, readable code
- Follow the existing code style
- Add comments for complex logic
- Test your changes thoroughly

### 4. Commit Your Changes
```bash
git commit -m "Add brief description of your changes"
```

Use clear, descriptive commit messages that explain what and why, not just what.

### 5. Push to Your Fork
```bash
git push origin feature/your-feature-name
```

### 6. Create a Pull Request
- Go to the original repository
- Click "New Pull Request"
- Select your branch and describe your changes
- Submit for review

## Guidelines

### Code Standards
- Use PHP 7.0+ syntax
- Follow PSR-2 coding style
- Use prepared statements for all database queries
- Sanitize user input with htmlentities()
- Include error handling

### Security
- Never commit sensitive information (passwords, API keys)
- Use parameterized queries to prevent SQL injection
- Validate and sanitize all user inputs
- Report security issues privately to maintainers

### Documentation
- Update README.md if adding new features
- Add inline code comments for complex logic
- Document new database tables in schema comments

### Testing
- Test all new features in both user and admin panels
- Verify responsiveness on mobile devices
- Test with different browsers

## Development Setup

1. Clone the repository:
```bash
git clone https://github.com/EricHOfla/E-Emergency.git
cd E-Emergency
```

2. Set up database:
```bash
- Import ambulance_booking.sql
- Update includes/config.php with your DB credentials
```

3. Start development:
```bash
cd c:\xampp\htdocs\online_ambulance_booking_service
php -S localhost:8000
```

## Reporting Issues

- Check existing issues before creating new ones
- Provide detailed descriptions
- Include steps to reproduce bugs
- Attach screenshots if relevant

## Community Standards

- Be respectful and inclusive
- Focus on constructive feedback
- Help others learn and grow
- Report violations to maintainers

Thank you for helping make Emergency Ambulance Service better!
