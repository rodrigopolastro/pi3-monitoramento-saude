DROP DATABASE IF EXISTS health_monitoring;
CREATE DATABASE health_monitoring;
USE health_monitoring;

-- ---------------------------------------------

CREATE TABLE Medicine_Types (
    medicine_type_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    medicine_type_name VARCHAR(50) NOT NULL UNIQUE,
    portuguese_name VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO Medicine_Types (medicine_type_name, portuguese_name) VALUES
('liquid', 'líquido'),
('pill', 'comprimido'),
('ointment', 'pomada');

-- ---------------------------------------------

CREATE TABLE Frequency_Types (
    frequency_type_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    frequency_type_name VARCHAR(50) NOT NULL UNIQUE,
    portuguese_name VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO Frequency_Types (frequency_type_name, portuguese_name) VALUES
('daily', 'diário'),
('weekly', 'semanal'),
('monthly', 'mensal'),
('days_interval', 'intervalo de dias');

-- ---------------------------------------------

CREATE TABLE Measurement_Units (
    measurement_unit_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    measurement_unit_name VARCHAR(50) NOT NULL UNIQUE,
    portuguese_name VARCHAR(50) NOT NULL UNIQUE
);

-- Create singular and plural portuguese names
INSERT INTO Measurement_Units (measurement_unit_name, portuguese_name) VALUES
('mL', 'mL'),
('drops', 'gotas'),
('pills', 'comprimidos');

-- ---------------------------------------------

CREATE TABLE Users (
    user_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_email VARCHAR(50) UNIQUE NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP
);

-- ---------------------------------------------

CREATE TABLE Companion_Users (
    companion_user_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    monitored_user_id INTEGER NOT NULL,
    user_email VARCHAR(50) UNIQUE NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP,

    FOREIGN KEY (monitored_user_id)
    REFERENCES Users (user_id)
    ON DELETE RESTRICT
);

-- ---------------------------------------------

CREATE TABLE Medicines (
    medicine_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id INTEGER NOT NULL,
    medicine_type_id INTEGER NOT NULL,
    frequency_type_id INTEGER NOT NULL,
    measurement_unit_id INTEGER NOT NULL,
    medicine_name VARCHAR(100) NOT NULL,
    medicine_description VARCHAR(300),
    doses_per_day INTEGER NOT NULL,
    quantity_per_dose INTEGER NOT NULL,
    treatment_start_date DATE NOT NULL,
    total_usage_days INTEGER NOT NULL,

    FOREIGN KEY (user_id)
    REFERENCES Users (user_id)
    ON DELETE CASCADE,

    FOREIGN KEY (medicine_type_id)
    REFERENCES Medicine_Types (medicine_type_id)
    ON DELETE RESTRICT,
 
    FOREIGN KEY (frequency_type_id)
    REFERENCES Frequency_Types (frequency_type_id)
    ON DELETE RESTRICT,
 
    FOREIGN KEY (measurement_unit_id)
    REFERENCES Measurement_Units (measurement_unit_id)
    ON DELETE RESTRICT
);

-- ---------------------------------------------

CREATE TABLE Doses (
    dose_id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    medicine_id INTEGER NOT NULL,
    due_date DATE NOT NULL,
    due_time TIME NOT NULL,
    taken_date DATE,
    taken_time TIME,
    was_taken BOOLEAN NOT NULL,
    
    FOREIGN KEY (medicine_id)
    REFERENCES Medicines (medicine_id)
    ON DELETE CASCADE
);
