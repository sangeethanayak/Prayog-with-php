# Prayog-with-php
This repository serves as an experimental project to demonstrate PHP and MySQL database usage.

### Description

This repository showcases the usage of PHP and MySQL for creating a basic authentication system and interacting with a database.

### Running the Project Locally

To run this project on your local system, follow the steps below:

1. Download XAMPP from the official website: [https://www.apachefriends.org](https://www.apachefriends.org).

2. Install XAMPP on your local system.

3. Start the XAMPP server and ensure that Apache and MySQL are running.

4. Open your preferred web browser and navigate to `http://localhost/`.

5. Create a new database called `auth_db`.

6. Inside the `auth_db` database, create two tables named `auth` and `customer`.

7. Run the following SQL command to create the `auth` table:

   ```sql
   CREATE TABLE auth (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50),
       password VARCHAR(50)
   );

8. Insert sample data into the `auth` table by running the following SQL command:

   ```sql
   INSERT INTO auth (username, password) VALUES
    ('admin', 'admin'),
    ('customer1', 'customer1'),
    ('customer2', 'customer2');

9. Inside the `customer` table, run the following SQL command:

    ```sql
   CREATE TABLE customer (
   id INT AUTO_INCREMENT PRIMARY KEY,
   order_date DATE,
   company VARCHAR(50),
   owner VARCHAR(50),
   item VARCHAR(50),
   quantity INT,
   weight FLOAT,
   shipment_request VARCHAR(50),
   tracking_id VARCHAR(50),
   shipment_size VARCHAR(50),
   box_count INT,
   specification VARCHAR(50),
   checklist_quantity VARCHAR(50)
   );

### Usage

The project demonstrates various PHP functionalities and how to interact with a MySQL database. Feel free to explore the code and customize it as per your requirements.
