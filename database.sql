-- Create database
CREATE DATABASE IF NOT EXISTS AR;
USE AR;

-- Create flights table
CREATE TABLE flights (
    id INT(11) NOT NULL AUTO_INCREMENT,
    flight_number VARCHAR(20) NOT NULL,
    origin VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    departure_date DATE NOT NULL,
    departure_time TIME NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    seats_available INT(11) DEFAULT 100,
    PRIMARY KEY (id)
);

-- Create bookings table
CREATE TABLE bookings (
    id INT(11) NOT NULL AUTO_INCREMENT,
    booking_ref VARCHAR(20) NOT NULL,
    flight_id INT(11) NOT NULL,
    passenger_name VARCHAR(100) NOT NULL,
    passenger_email VARCHAR(100) NOT NULL,
    passenger_phone VARCHAR(20) NOT NULL,
    seats_booked INT(11) DEFAULT 1,
    total_price DECIMAL(10,2) NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY booking_ref (booking_ref)
);

-- Insert sample flights
INSERT INTO flights (flight_number, origin, destination, departure_date, departure_time, price, seats_available) VALUES
('AR101', 'New York', 'London', '2025-06-15', '08:00:00', 499, 100),
('AR102', 'London', 'Paris', '2025-06-16', '10:30:00', 199, 100),
('AR103', 'Tokyo', 'Seoul', '2025-06-17', '14:00:00', 299, 100),
('AR104', 'Dubai', 'Singapore', '2025-06-18', '22:00:00', 599, 100),
('AR105', 'New York', 'Tokyo', '2025-06-19', '20:00:00', 899, 100);