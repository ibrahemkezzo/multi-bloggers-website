# Blog Management System

Welcome to the Blog Management System, a robust and responsive web application built with the Laravel framework and styled using the Start Bootstrap Agency theme. This project provides a comprehensive platform for managing blog content, user profiles, and contact inquiries, tailored for both users and administrators.

## Features

- **Dynamic Category Display**: Showcases the top 3 categories with the highest number of blogs on the homepage, with clickable links to detailed category pages.
- **Latest Blog Posts**: Displays the 6 most recent published blog posts on the homepage, with a "Show More" option linking to the full blog list.
- **Responsive Contact Form**: Allows users to submit contact messages, which are securely stored in the database for admin review instead of email delivery.
- **Admin-Only Contact Management**: Provides an admin panel to view and delete contact messages, accessible only to users with `admin = true` status, protected by authentication middleware.
- **User Profile Management**: Offers a gold-themed profile page where users can update their information, password, or delete their account, designed to match the Agency theme's aesthetic.
- **Alternating Blog Timeline**: Presents user blogs in a timeline format, alternating between left and right alignment, with hover effects to scale text and images.
- **Social Media Integration**: Includes links to personal social media profiles (Twitter/X, Facebook, LinkedIn) for enhanced user engagement.
- **Responsive Design**: Fully optimized for desktop and mobile devices using Bootstrap, with smooth transitions and hover effects.
- **Secure Authentication**: Utilizes Laravel's built-in authentication system with role-based access control for admin features.

## Project Structure

### Technologies Used
- **Laravel**: PHP framework for backend logic and routing.
- **Bootstrap Agency Theme**: Customizable frontend template for a professional look.
- **Font Awesome**: Icons for enhanced UI.
- **MySQL**: Database for storing categories, blogs, contacts, and user data.

### Directory Structure
project-root/
├── app/
│   ├── Http/
│   │   ├── Controllers/Front/     # Controllers for frontend logic
│   │   ├── Models/                # Eloquent models (e.g., Category, Blog, Contact)
│   ├── Mail/                      # Email templates (currently unused, replaced by DB storage)
├── database/
│   ├── migrations/                # Database migration files (e.g., create_contacts_table)
│   ├── seeders/                   # Optional seed data
├── resources/
│   ├── views/
│   │   ├── auth/                  # authentication pages
│   │   ├── frontend/              # Homepage and public pages
│   │   ├── layouts/               # the stracture pages
│   │   ├── profile/               # User profile pages
├── routes/
│   ├── web.php                    # Route definitions
├── public/
│   ├── frontend/assets/           # Static assets (images, CSS, JS)
├── .env                           # Environment variables (e.g., database credentials)
├── README.md                      # This file


## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ibrahemkezzo/multi-bloggers-website.git
   cd multi-blogger-website

2. **Install Dependencies**

    composer install
    npm install && npm run dev

3. **Configure Environment**

    Copy .env.example to .env and update the following:

    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
4. **Generate an application key:**

    php artisan key:generate

5. **Run Migrations**

    php artisan migrate

6. **Set Up Authentication with Laravel Breeze**

    Breeze is already integrated; no additional scaffolding needed.
    Run the seeder to create an admin user:
        php artisan db:seed
    This will create an admin user with:

        Name: admin
        Email: admin@gmail.com
        Password: password

7. **Serve the Application**
    php artisan serve
    Visit http://localhost:8000 in your browser and log in with the admin credentials.

    Usage

        Homepage: View top categories and latest blogs.
        Admin Panel: Log in as an admin (admin = true) and navigate to /admin/contacts to manage contact messages.
        Profile: Log in and access /profile to manage your account.
        Blogs: Explore user blogs via the timeline or full list at /blogs.

**Contributing**

    Feel free to fork this repository, submit issues, or create pull requests. Ensure you follow the coding standards and test your changes thoroughly.

**License**

    This project is open-source under the MIT License. See the LICENSE file for details.

**Contact**

    For support or inquiries, reach out via:

    Email: ibrahemkezzo@gmail.com
    Twitter/X: https://x.com/IbrahemKezzo
    Facebook: https://www.facebook.com/share/15tcksMggo/
    LinkedIn: https://www.linkedin.com/in/ibrahem-kezzo-393556282
