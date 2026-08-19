CREATE DATABASE IF NOT EXISTS brainmindbehaviour;
USE brainmindbehaviour;

CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    patient_phone VARCHAR(20) NOT NULL,
    patient_email VARCHAR(100),
    appointment_type ENUM('online', 'onsite') NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time VARCHAR(20) NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending',
    payment_status ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
    razorpay_order_id VARCHAR(100),
    razorpay_payment_id VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a default admin user with password 'admin123' (hashed using BCRYPT)
INSERT INTO admin_users (username, password_hash) 
VALUES ('admin', '$2y$10$wYQj0yS.Wk5J0c/.zD4xO.5I4n5Q3m4s0Q.Zp5z1h9e0s9Kz5m1Z.')
ON DUPLICATE KEY UPDATE id=id;
