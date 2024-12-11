-- MySQL script to create the 'hypertension' database and 'users' table.

CREATE DATABASE IF NOT EXISTS hypertension;

USE hypertension;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT NOT NULL,
    systolic INT NOT NULL,
    diastolic INT NOT NULL,
    conditions TEXT,
    bmi FLOAT,
    diagnosis TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
