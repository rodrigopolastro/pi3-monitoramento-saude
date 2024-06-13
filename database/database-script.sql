DROP DATABASE IF EXISTS monitoramento_saude;
CREATE DATABASE monitoramento_saude;
USE monitoramento_saude;

-- ---------------------------------------------

CREATE TABLE Medicine_Types (
    medicine_type_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    medicine_type_name VARCHAR(50) NOT NULL UNIQUE,
    portuguese_name VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO Medicine_Types (medicine_type_name, portuguese_name) VALUES
('liquid', 'líquido'),
('pill', 'comprimido'),
('ointment', 'pomada');

-- ---------------------------------------------

CREATE TABLE Frequency_Types (
    frequency_type_id INTEGER PRIMARY KEY AUTO_INCREMENT,
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
    measurement_unit_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    measurement_unit_name VARCHAR(50) NOT NULL UNIQUE,
    portuguese_name VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO Measurement_Units (measurement_unit_name, portuguese_name) VALUES
('mL', 'mL'),
('drops', 'gotas'),
('pills', 'comprimidos');

-- ---------------------------------------------

CREATE TABLE Medicines (
    medicine_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    medicine_type_id INTEGER,
    frequency_type_id INTEGER,
    measurement_unit_id INTEGER,
    medicine_name VARCHAR(100) NOT NULL,
    medicine_description VARCHAR(300),
    doses_per_day INTEGER NOT NULL,
    quantity_per_dose INTEGER NOT NULL,
    treatment_start_date DATE NOT NULL,
    total_usage_days INTEGER NOT NULL,

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
    dose_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    medicine_id INTEGER,
    due_date DATE NOT NULL,
    due_time TIME NOT NULL,
    taken_date DATE NOT NULL,
    taken_time TIME NOT NULL,
    was_taken BOOLEAN NOT NULL,
    
    FOREIGN KEY (medicine_id)
    REFERENCES Medicines (medicine_id)
    ON DELETE CASCADE
);