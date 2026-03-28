CREATE DATABASE tracker;

USE tracker;

CREATE TABLE student(
    id INT UNSIGNED PRIMARY KEY,
    class INT UNSIGNED,
    email VARCHAR(200) UNIQUE,
    password_hash VARCHAR(200),
    full_name VARCHAR(200),
    parent_full_name VARCHAR(200),
    phone VARCHAR(200) UNIQUE
);