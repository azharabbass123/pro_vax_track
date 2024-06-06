<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'vax_management_system';

$dsn = "mysql:host=localhost;dbname=$database";
$connection = new PDO($dsn, $username, $password);

// SQL queries to create tables
$tables_sql = "
CREATE TABLE IF NOT EXISTS roles (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS provinces (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS cities (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    province_id INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (province_id) REFERENCES provinces(id)
);

CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    DOB DATE NOT NULL,
    role_id INT(11) NOT NULL,
    city_id INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id),
    FOREIGN KEY (city_id) REFERENCES cities(id)
);

CREATE TABLE IF NOT EXISTS health_workers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    userId INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (userId) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS patients (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    userId INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (userId) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    patient_id INT(11) NOT NULL,
    hw_id INT(11) NOT NULL,
    apt_Date DATE NOT NULL,
    apt_Status VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (hw_id) REFERENCES health_workers(id)
);

CREATE TABLE IF NOT EXISTS vaccinations (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    patient_id INT(11) NOT NULL,
    vax_Date DATE NOT NULL,
    vax_Status VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (patient_id) REFERENCES patients(id)
);
";
$connection->query($tables_sql);
if ($connection->errorCode() == 00000) {
    echo "Tables created successfully\n";

} else {
    echo "Error creating tables: " . $connection->errorCode();
     // Exit script if tables creation fails
}

// Initialize roles table
$roles = array('admin', 'health_worker', 'patient');
foreach ($roles as $role) {
    $insert_role_sql = "INSERT INTO roles (name) VALUES ('$role')";
    if (! $connection->query($insert_role_sql)) {
        echo "Error initializing roles table: " . $connection->errorCode();
         // Exit script if role initialization fails
    }
}

// Initialize provinces table
$provinces = array('Punjab', 'Sindh', 'KPK', 'Balochistan');
foreach ($provinces as $province) {
    $insert_province_sql = "INSERT INTO provinces (name) VALUES ('$province')";
    if ($connection->query($insert_province_sql) !== TRUE) {
        echo "Error initializing provinces table: " . $connection->errorCode();
         // Exit script if province initialization fails
    }
}

// Initialize cities table
$cities = array(
    // Punjab
    'Lahore', 'Faisalabad', 'Rawalpindi', 'Multan', 'Gujranwala', 'Bahawalpur', 'Sialkot', 'Gujrat', 'Sheikhupura', 'Jhang',
    // Sindh
    'Karachi', 'Hyderabad', 'Sukkur', 'Larkana', 'Mirpur Khas', 'Nawabshah', 'Jacobabad', 'Shikarpur', 'Khairpur', 'Dadu',
    // KPK
    'Peshawar', 'Abbottabad', 'Mardan', 'Swat', 'Nowshera', 'Kohat', 'Dera Ismail Khan', 'Charsadda', 'Mansehra', 'Haripur',
    // Balochistan
    'Quetta', 'Gwadar', 'Khuzdar', 'Chaman', 'Turbat', 'Sibi', 'Zhob', 'Hub', 'Loralai', 'Kharan'
);

$province_ids = array(1, 2, 3, 4); 

foreach ($cities as $index => $city) {
    $province_id = $province_ids[floor($index / 10)]; 
    $insert_city_sql = "INSERT INTO cities (name, province_id) VALUES ('$city', '$province_id')";
    $connection->query($insert_city_sql);
    if ($connection->errorCode() != 00000) {
        echo "Error initializing cities table: " . $connection->errorCode();
         // Exit script if city initialization fails
    }
}

// Create super admin user
$super_admin_username = 'admin';
$super_admin_email = 'admin@example.com';
$super_admin_password = 'admin123'; 
$super_admin_role_id = 1; 
$super_admin_city_id = 1; 

$insert_user_sql = "
INSERT INTO users (name, email, password, role_id, city_id) 
VALUES ('$super_admin_username', '$super_admin_email', '$super_admin_password', '$super_admin_role_id', '$super_admin_city_id');
";

// Execute insert user query
$connection->query($insert_user_sql);
if ($connection->errorCode() != 00000) {
    echo "Super admin user created successfully\n";
} else {
    echo "Error creating super admin user: " . $connection->errorCode();
}

