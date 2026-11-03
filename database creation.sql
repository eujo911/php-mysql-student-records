-- CREATING database, table and adding sample data
CREATE DATABASE IF NOT EXISTS student_records;
USE student_records;

CREATE TABLE IF NOT EXISTS students (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(100),
    age   INT,
    email VARCHAR(100)
);

INSERT INTO students (name, age, email) VALUES
    ('Eugine Odhiambo', 25, 'eodhiambo@gmail.com'),
    ('Brian Opiyo',  22, 'brian@gmail.com'),
    ('Betty Makena',   21, 'bmakena@gmail.com');
