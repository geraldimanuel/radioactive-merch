# UMN RadioActive 2023 Merch Website

![UMN RadioActive Logo](https://umnradioactive.com/images/logo.gif)

Welcome to the official GitHub repository for the UMN RadioActive 2023 Merch Website! This website is built using the Laravel framework and Tailwind CSS and serves as an online platform for the annual event held by UMN Radio, called RadioActive 2023, at the University of Minnesota.

## Table of Contents

-   [Introduction](#introduction)
-   [Features](#features)
-   [Demo](#demo)
-   [Installation](#installation)
-   [Usage](#usage)
-   [Technologies](#technologies)
-   [Database](#database)
-   [Contributing](#contributing)
-   [License](#license)

## Introduction

UMN RadioActive is an annual event organized by UMN Radio, and this website serves as the official merchandise platform for RadioActive 2023. The website allows event attendees and enthusiasts to browse and purchase a wide range of merchandise related to the event. Users can explore various merchandise categories, view product details, and add items to their shopping carts for a seamless shopping experience.

## Features

-   Browse and search for merchandise items by categories.
-   View detailed information about each product, including images, descriptions, and prices.
-   Add items to the shopping cart and proceed to checkout for a streamlined purchasing process.
-   Calculate shipping costs and estimated delivery dates based on the user's location.
-   Secure and easy-to-use payment gateway integration for smooth transactions.
-   User authentication and profiles to manage orders and track order history.
-   Mobile-responsive design for optimal viewing across different devices.

## Demo

A live demo of the UMN RadioActive 2023 Merch Website is available at [https://merch.umnradioactive.com/](https://merch.umnradioactive.com/).

## Installation

To set up the project locally, follow these steps:

1. Clone the repository: `git clone https://github.com/yourusername/radioactive-merch.git`
2. Navigate to the project directory: `cd radioactive-merch`
3. Install the required dependencies: `composer install`
4. Set up the database configuration in the `.env` file.
5. Run the database migrations: `php artisan migrate`
6. Seed the database with initial data (optional): `php artisan db:seed`
7. Build the frontend assets: `npm install && npm run dev`

## Usage

1. Run the development server: `php artisan serve`
2. Open your web browser and go to `http://localhost:8000` to access the website.

## Technologies

The UMN RadioActive 2023 Merch Website is built using the following technologies:

-   Front-end: Laravel (Blade templates) with Tailwind CSS
-   Back-end: PHP (Laravel framework)
-   Database: MySQL
-   Payment Integration: Midtrans

## Database

The website uses MySQL as the database to store merchandise, user information, orders, and other relevant data. The database schema is managed through Laravel's migrations.

## Contributing

We welcome contributions to enhance the website and make it even better for the RadioActive 2023 event. To contribute, follow these steps:

1. Fork the repository.
2. Create a new branch for your feature: `git checkout -b features/your-feature`
3. Commit your changes: `git commit -m "Add feature"`
4. Push the branch to your forked repository: `git push origin features/your-feature`
5. Open a pull request to the main repository.

Please ensure your code follows the project's coding standards and practices.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

---

Thank you for your interest in the UMN RadioActive 2023 Merch Website. If you encounter any issues or have any questions, please feel free to open an issue on this repository. Happy contributing and happy shopping at RadioActive 2023!
