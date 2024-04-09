# PHP-based Contact Management System

## Introduction

This project is a simple web-based Contact Management System developed using PHP, MySQL, and HTML/CSS. It's designed to manage contact information such as names, addresses, and phone numbers, supporting basic CRUD (Create, Read, Update, Delete) operations.

## Installation

### Requirements
- A local server environment (XAMPP or WAMP)
- PHP and MySQL

### Setup
1. **Start your local server environment and create a MySQL database** named `contact_manager`.
2. **Create a table named `contacts`** with the following fields: (also provided the database file)
   - `id` (INT, Primary Key)
   - `name` (VARCHAR)
   - `email` (VARCHAR)
   - `phone` (INT)
   - `address` (VARCHAR)
3. **Clone the repository** to your local server's web directory (e.g., `www` for WAMP):
4. **Configure your database connection** by editing the `dbconnection.php` file with your database credentials.

## Features

- **Create Contact:** Allows adding new contact information to the database via a form.
- **Display Contacts:** Shows all contacts in a table format, with a search feature to filter by name.
- **Update Contact:** Provides the option to edit a contact's information.
- **Delete Contact:** Allows removing a contact from the database.

## How to Use

1. **Access the project** through your local server by visiting `http://localhost/Web-based-Contact-Management-System` in your web browser.
2. **Create a new contact** by filling out the form on the homepage and clicking the 'Save' button.
3. **View all contacts** on the homepage. Use the search bar to filter contacts by name.
4. **Update or delete a contact** by clicking on the corresponding to each contact in the list.

## Front-end Design

The application features a simple yet intuitive interface, designed with HTML/CSS. Form validations are implemented to ensure data integrity, such as email format validation.


---

