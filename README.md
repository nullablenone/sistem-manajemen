# Product Management Website

This website is a project for managing products, designed using Laravel and several supporting technologies.

## 🎯 Project Objective

Provide a platform to simplify the management of products, product models, and product sizes.

## ✨ Main Features

- **Login**: Admin and super admin accounts using Laravel Breeze.  
- **Dashboard**: Main interface for management.  
- **Product Management**: Manage products.  
- **Product Model Management**: Manage product model data.  
- **Product Size Management**: Manage product sizes.  
- **Seeder**: Provides initial data for admin, super admin, product models, and product sizes.

## 🛠️ Technologies Used

- **Backend**: Laravel with Laravel Breeze for authentication.  
- **Frontend**: Bootstrap, Javascript, Sweet Alert.  
- **Database**: MySQL.  

## 🚀 How to Run the Project

1. Clone this repository:  
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. Install dependencies:  
   ```bash
   composer install
   npm install
   ```

3. Create a `.env` file and configure the database. Then run:  
   ```bash
   php artisan migrate --seed
   ```

4. Run the server:  
   ```bash
   npm run dev
   php artisan serve
   ```

5. Access the application at `http://localhost:8000`.


